<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }
        .header {
            text-align: center;
            padding: 10px 0;
            background-color: #007BFF;
            color: #ffffff;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #999999;
        }
        @media screen and (max-width: 600px) {
            .email-container {
                padding: 10px;
            }
            .content {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1><?= $email_data['subject']; ?></h1>
        </div>
        <div class="content">
            <p>Hello Dear,</p>
            <p><?= $email_data['message']; ?></p>
            <p>Best regards,<br><?= $email_data['name']; ?></p>
        </div>
        <div class="footer">
            <p>&copy; <?= date('Y'); ?> Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
