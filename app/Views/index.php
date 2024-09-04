<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Responsive HTML Email Using PHPMailer Library in CodeIgniter 4</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>

<body>


    <div class="container">

        <h3 class="mt-4">Send Responsive HTML Email Using PHPMailer Library in CodeIgniter 4</h3>
        <hr>
        <div class="row">
            <form action="<?= base_url('/contact') ?>" method="post" class="col-md-6">

                <?= csrf_field() ?>

                <?php $validation = \Config\Services::validation(); ?>

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('fail') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="form-group mb-2">
                    <label><b>Full name:</b></label>
                    <input class="form-control" type="text" name="name" placeholder="Enter your name" value="<?= set_value('name') ?>">
                    <?php if ($validation->getError('name')): ?>
                        <div class="d-block text-danger">
                            <?= $validation->getError('name') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-2">
                    <label><b>Email:</b></label>
                    <input class="form-control" type="text" name="email" placeholder="Enter your email" value="<?= set_value('email') ?>">
                    <?php if ($validation->getError('email')): ?>
                        <div class="d-block text-danger">
                            <?= $validation->getError('email') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-2">
                    <label><b>Subject:</b></label>
                    <input class="form-control" type="text" name="subject" placeholder="Enter subject" value="<?= set_value('subject') ?>">
                    <?php if ($validation->getError('subject')): ?>
                        <div class="d-block text-danger">
                            <?= $validation->getError('subject') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-2">
                    <label><b>Message:</b></label>
                    <textarea class="form-control" rows="4" name="message" placeholder="Enter message..."><?= set_value('message') ?></textarea>
                    <?php if ($validation->getError('message')): ?>
                        <div class="d-block text-danger">
                            <?= $validation->getError('message') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-md btn-primary" type="submit">Send</button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>