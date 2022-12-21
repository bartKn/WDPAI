<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/global-main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">

    <script src="https://kit.fontawesome.com/32e003c632.js" crossorigin="anonymous"></script>
    <title>PROFILE</title>
</head>
<body>
    <div class="base-container">
        <nav>
            <a href="mainpage">
                <img src="/public/img/logo.svg">
            </a>
            <ul class="nav-list">
                <li>
                    <a href="team">
                        <i class="fa-solid fa-users"></i>
                    </a>
                </li>
                <li>
                    <a href="calendar">
                        <i class="fa-solid fa-calendar-days"></i>
                    </a>
                </li>
                <li>
                    <a href="profile">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </li>
                <li>
                    <a href="logout">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <main>
            <section class="stats">
                <h1>statistics</h1>
                <form class="stats-param">
                    <select id="period" name="period">
                        <option value="year">Year summary</option>
                        <option value="month">Month summary</option>
                    </select>
                    <select id="period-value" name="period-value">
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </form>
                <p>events</p>
                <div class="stats-container">
                    <div class="labels">
                        Total:<br>
                        Distance:<br>
                        Average position:
                    </div>
                    <div class="values">
                        7<br>
                        123 Km<br>
                        24
                    </div>
                </div>
                <p>daily runs</p>
                <div class="stats-container">
                    <div class="labels">
                        Total:<br>
                        Distance:<br>
                    </div>
                    <div class="values">
                        7<br>
                        123 Km<br>
                    </div>
                </div>
            </section>
            <div class="separator"></div>
            <section class="account">
                <h1>account<br>details</h1>
                <?php if (isset($user_details)) { ?>
                    <img class="profile-pic" src=" <?= $user_details['photo'] ?>">
                    <div class="details">
                        <label id="name"> <?= $user_details['name'] .' ' .$user_details['surname']?> </label>
                        <label id="team"> <?= $user_details['teamName'] ?> </label>
                        <label id="email"> <?= $user_details['email'] ?> </label>
                        <label id="location">
                            <i class="fa-solid fa-location-dot"></i>
                            Location
                        </label>
                    </div>
                <?php }?>
                <?php if ($_COOKIE['user'] === $user_details['email']) { ?>
                    <form class="pic-change" action="updateProfilePic" method="POST" ENCTYPE="multipart/form-data">
                        <div class="input-container">
                            <label for="file">Profile pic:</label>
                            <input class="event-input" type="file" id="file" name="file">
                        </div>
                        <button class="add-button" type="submit">
                            Update picture!
                        </button>
                    </form>
                <?php } ?>
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
            </section>
        </main>
    </div>
</body>