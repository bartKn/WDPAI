<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/global-main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/public/css/event.css">

    <script src="https://kit.fontawesome.com/32e003c632.js" crossorigin="anonymous"></script>
    <title>EVENT</title>
</head>
<body>
    <div class="base-container">
        <nav>
            <a href="mainpage">
                <img src="public/img/logo.svg">
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
            <section class="event">
                <h1>Event name</h1>
                <div class="stats-container">
                    <div class="labels">
                        Date:<br>
                        Start location:<br>
                        Distance:<br>
                        Type:<br>
                        Participants<br>
                        Organized by:
                    </div>
                    <div class="values">
                        13.11.2022 08:00<br>
                        Wolski forest<br>
                        10 Km<br>
                        Trail run<br>
                        72/100<br>
                        Team name
                    </div>
                </div>
                <img class="map-img" src="/public/img/gpsTrack.png">
                <button>Download GPS track</button>
                <button>Sign up for event!</button>
            </section>
            <div class="separator"></div>
            <div class="participants">
                <h1>Participants</h1>
                <form class="stats-param">
                    <select id="participants" name="participants">
                        <option value="all">All</option>
                        <option value="team">My team</option>
                    </select>
                </form>
                <div class="participants-container">
                    <a href="profile">
                        <div class="participant">
                            <p>Name Surname</p>
                            <p>Team Name</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="participant">
                            <p>Name Surname</p>
                            <p>Team Name</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="participant">
                            <p>Name Surname</p>
                            <p>Team Name</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="participant">
                            <p>Name Surname</p>
                            <p>Team Name</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="participant">
                            <p>Name Surname</p>
                            <p>Team Name</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="participant">
                            <p>Name Surname</p>
                            <p>Team Name</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="participant">
                            <p>Name Surname</p>
                            <p>Team Name</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="participant">
                            <p>Name Surname</p>
                            <p>Team Name</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="participant">
                            <p>Name Surname</p>
                            <p>Team Name</p>
                        </div>
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>