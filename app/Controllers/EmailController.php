<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends BaseController
{
    protected $helpers = ['form']; // Remember to add this helper

    public function index()
    {
        return view('index');
    }

    public function sendEmail()
    {
        
        $request = \Config\Services::request();

        /** Validate the form */
        $isValid = $this->validate([

            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email is required',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Please check email field. It does not appears to be valid.'
                ],
            ],

            'subject' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Subject field is required'
                ]
            ],

            'message' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have atleast 10 characters in length.'
                ]
            ]

        ]);

        if (!$isValid) {
            /** If validation errors founded, display errors under each input field */
            return view('index', ['validation' => $this->validator]);
        } else {

            

            /** Prepare HTML email  */
            $email_data = [
                'name'=>$request->getVar('name'),
                'email'=>$request->getVar('email'),
                'subject'=>$request->getVar('subject'),
                'message'=>$request->getVar('message'),
            ];
            $view = \Config\Services::renderer();
            $mail_body = $view->setVar('email_data', $email_data)->render('email-template');

            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Username = 'YourMailtrapUsername';
                $mail->Password = 'YourMailtrapPassword';
                $mail->SMTPSecure = 'TLS';
                $mail->Port = 587;
                $mail->setFrom($request->getVar('email'), $request->getVar('name'));
                $mail->addAddress('sendto@gmail.com', 'SendToName');
                $mail->isHTML(true);
                $mail->Subject = $request->getVar('subject');
                $mail->Body = $mail_body;

                if( $mail->send() ){

                    return redirect()->route('index')->with('success','Email sent successfully!');

                }else{
                    return redirect()->route('index')->with('fail','Email not sent, Something went wrong.!');
                }


            } catch (Exception $e) {
                return redirect()->route('index')->with('fail','Message could not be sent. Mailer Error: '.$mail->ErrorInfo);
            }
        }
    }
}
