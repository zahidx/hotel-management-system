<!doctype html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>CodePen - Animated Login Form using Html &amp; CSS Only</title>

    <link rel="stylesheet" href="./css/style.css">
    <style>
    /* Style for the main container */
    .signin {
        position: absolute;
        width: 400px;
        background: #222;
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
        border-radius: 4px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 9);
    }

    .signin .content {
        position: relative;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 40px;
    }


    /* Style for the heading */
    .content h2 {
        font-size: 2em;
        color: #0f0;
        text-transform: uppercase;
    }


    /* Styling for the Sign In form and its elements */
    .signin .content .form {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .signin .content .form .inputBox {
        position: relative;
        width: 100%;
        margin-bottom: 10px;
    }


    .signin .content .form .inputBox input {
        position: relative;
        width: 100%;
        background: #333;
        border: none;
        outline: none;
        padding: 25px 10px 7.5px;
        border-radius: 4px;
        color: #fff;
        font-weight: 500;
        font-size: 1em;
        margin-bottom: 10px;
    }


    .inputBox input[type="text"],
    .inputBox input[type="password"] {
        position: relative;
        width: 100%;
        background: #333;
        border: none;
        outline: none;
        padding: 25px 10px 7.5px;
        border-radius: 4px;
        color: #fff;
        font-weight: 500;
        font-size: 1em;
    }

    .signin .content .form .inputBox input:focus~i,
    .signin .content .form .inputBox input:valid~i {
        transform: translateY(-7.5px);
        font-size: 0.8em;
        color: #fff;
    }

    /* Style for the links container */
    .links {
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    .links a {
        color: #fff;
        text-decoration: none;
    }

    /* Style for the submit button */
    .inputBox input[type="submit"] {
        padding: 10px;
        background: #0f0;
        color: #000;
        font-weight: 600;
        font-size: 1.35em;
        letter-spacing: 0.05em;
        cursor: pointer;
        margin-top: 20px;
        border-radius: 6px;
    }


    .links a:nth-child(2) {
        color: #0f0;
        font-weight: 600;
    }



    input[type="submit"]:active {
        opacity: 0.6;
    }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->

    <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
        <span></span> <span></span> <span></span> <span></span> <span></span>

        <div class="signin">

            <div class="content">

                <h2>Sign In</h2>

                <form method="POST" action="check_login.php">

                    <div class="inputBox">

                        <label for="email" style="color: white; padding-bottom: 8px; font-weight: 600;">Email:</label>


                        <input type="text" id="email" name="email" required
                            style="margin-top: 5px; margin-bottom: 19px; ">


                    </div>

                    <div class="inputBox">

                        <label for="password" style="color: white; font-weight: 600;">Password:</label>

                        <input type="password" id="password" name="password" required
                            style="margin-top: 5px; margin-bottom: 25px; ">
                    </div>

                    <div class="links"> <a href="forgot_password.php"
                            style="font-weight: 600; color: rgba(255, 256, 250, 0.8);">Forgot
                            Password?</a> <a href="
                            signup.php">Signup</a>

                    </div>

                    <div class="inputBox">

                        <input type="submit" value="Login">

                    </div>
                </form>
            </div>

        </div>

    </section> <!-- partial -->

</body>

</html>