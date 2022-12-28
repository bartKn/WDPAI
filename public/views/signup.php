<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">

    <script type="text/javascript" src="/public/js/signupValidation.js" defer></script>
    <title>SIGNUP PAGE</title>
</head>
<body>
    <div class="container">
        <div class="signup-container">
            <form class="signup" name="signupForm" action="signup" method="POST">
                <p class="input-text">Sign Up</p>
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
                <input name="name" type="text" placeholder="Name">
                <input name="surname" type="text" placeholder="Surname">
                <input name="email" type="text" placeholder="Your email">
                <input name="password" type="password" placeholder="Password">
                <input name="confirmedPassword" type="password" placeholder="Confirm password">
                <input name="location" type="text" placeholder="Location">
                <button id="submit-button" type="submit">Sign Up</button>
            </form>
            <p id="signup-text">Already a Member?&nbsp;<a href="login">Log In!</a></p>
        </div>    
    </div>
</body>