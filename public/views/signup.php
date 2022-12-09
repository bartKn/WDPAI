<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <title>SIGNUP PAGE</title>
</head>
<body>
    <div class="container">
        <div class="signup-container">
            <form class="signup" action="signup" method="POST">
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
                <button type="submit">Sign Up</button>
            </form>
            <p id="signup-text">Already a Member?&nbsp;<a href="login">Log In!</a></p>
        </div>    
    </div>
</body>