<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page -->
    <title>Reset Password</title>

    <!-- Main CSS (Use the same CSS file from your registration page) -->
    <link href="css/signup.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Reset Password</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="process_reset_password.php">
                        <!-- Set the action to the PHP script for processing password reset -->
                        <div class="form-row m-b-55">
                            <div class="name">New Password</div>
                            <div class="value">
                                <div class="input-group-desc">
                                    <input class="input--style-5" type="password" name="new_password" required>

                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Confirm New Password</div>
                            <div class="value">
                                <div class="input-group-desc">
                                    <input class="input--style-5" type="password" name="confirm_password" required>

                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div style="text-align: center;">
                            <button class="btn btn--radius-2 btn--red" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>