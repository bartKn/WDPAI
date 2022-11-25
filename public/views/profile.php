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
                <img class="profile-pic" src="/public/img/profile-pic.jpg">
                <div class="details">
                    <label id="name">Name Surname</label>
                    <label id="team">Team Name</label>
                    <label id="email">email@email.com</label>
                    <label id="location">
                        <i class="fa-solid fa-location-dot"></i>
                        Location
                    </label>
                </div>
            </section>
        </main>
    </div>
</body>