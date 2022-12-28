<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">

    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
            <div class="logo-container">
                <img src="/public/img/logo.svg">
            </div>
            <div class="login-container">
                <form class="login" action="login" method="POST">
                    <p class="input-text">Log In</p>
                    <input name="email" type="text" placeholder="Your email">
                    <input name="password" type="password" placeholder="Password">
                    <div class="messages">
                        <?php
                            if (isset($messages))
                            {
                                foreach ($messages as $message)
                                {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <button type="submit">Log In</button>
                </form>
                <p id="signup-text">Not a member yet?&nbsp;<a href="signup">Sign Up!</a></p>
            </div>    
    </div>
</body>