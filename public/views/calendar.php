<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/global-main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/calendar.css">

    <script src="https://kit.fontawesome.com/32e003c632.js" crossorigin="anonymous"></script>
    <title>CALENDAR</title>
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
        <main id="cal-main">
            <div class="cal-header">
                <?php
                    if (isset($date))
                    {
                        echo '<p>' .$date .'</p>';
                    }
                ?>
                <form class="header-form" action="calendar" method="POST">
                    <select id="month" name="month">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select id="year" name="year">
                        <option value="2022">2022</option>
                    </select>
                    <button class="load-button" type="submit">Load</button>
                </form>
            </div>
            <div class="calendar-grid">
                <div class="cell">Mon.</div>
                <div class="cell">Tue.</div>
                <div class="cell">Wed.</div>
                <div class="cell">Thu.</div>
                <div class="cell">Fri.</div>
                <div class="cell">Sat.</div>
                <div class="cell">Sun.</div>
                <?php
                if (isset($days))
                {
                    foreach ($days as $day)
                    {
                        echo '<div ' .$day['class'] .'>';
                        echo '<ul class="events web-events">';
//                        <li>
//                            <a href="event">
//                        Event1 name
//                    </a>
//                        </li>
                        echo '</ul>';
                        echo '<p class="day-number">';
                        echo $day['dayNumber'];
                        echo '</p>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="mobile-events">
                <ul class="events">
                    <li>
                        <label class="day-number">1</label>
                        <a href="event">
                            Event5 name
                        </a>
                        <a href="event">
                            Event5 name
                        </a>
                        <a href="event">
                            Event5 name
                        </a>
                    </li>
                    <li>
                        <label class="day-number">2</label>
                        <a href="event">
                            Event5 name
                        </a>
                        <a href="event">
                            Event5 name
                        </a>
                    </li>
                    <li>
                        <label class="day-number">5</label>
                        <a href="event">
                            Event5 name
                        </a>
                        <a href="event">
                            Event5 name
                        </a>
                    </li>
                    <li>
                        <label class="day-number">13</label>
                        <a href="event">
                            Event5 name
                        </a>
                        <a href="event">
                            Event5 name
                        </a>
                    </li>
                    <li>
                        <label class="day-number">24</label>
                        <a href="event">
                            Event5 name
                        </a>
                        <a href="event">
                            Event5 name
                        </a>
                    </li>
                </ul>
            </div>
        </main>
    </div>
</body>
