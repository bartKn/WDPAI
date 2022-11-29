<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/global-main.css">
    <link rel="stylesheet" type="text/css" href="public/css/calendar.css">

    <script src="https://kit.fontawesome.com/32e003c632.js" crossorigin="anonymous"></script>
    <title>CALENDAR</title>
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
            </ul>
        </nav>
        <main id="cal-main">
            <div class="cal-header">
                <form class="header-form">
                    <select id="month" name="month">
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
                    <select id="region" name="region">
                        <option value="Greater Poland">Greater Poland</option>
                        <option value="Kuyavia-Pomerania">Kuyavia-Pomerania</option>
                        <option value="Lesser Poland">Lesser Poland</option>
                        <option value="Lodz">Lodz</option>
                        <option value="Lower Silesia">Lower Silesia</option>
                        <option value="Lublin">Lublin</option>
                        <option value="Lubusz">Lubusz</option>
                        <option value="Masovia">Masovia</option>
                        <option value="Opole">Opole</option>
                        <option value="Podlasie">Podlasie</option>
                        <option value="Pomerania">Pomerania</option>
                        <option value="Silesia">Silesia</option>
                        <option value="Subcarpathia">Subcarpathia</option>
                        <option value="Swietokrzyskie Voivodeship">Swietokrzyskie Voivodeship</option>
                        <option value="Warmia-Masuria">Warmia-Masuria</option>
                        <option value="West Pomerania">West Pomerania</option>
                    </select>
                </form>
            </div>
            <table>
                <thead>
                  <tr id="col-header">
                    <td>Mon.</td>
                    <td>Tue.</td>
                    <td>Wen.</td>
                    <td>Thu.</td>
                    <td>Fri.</td>
                    <td>Sat.</td>
                    <td>Sun.</td>
                  </tr>
                </thead>
                <tbody id="cal-content">
                  <tr>
                    <td>
                        <div class="day other-month-day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                31
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day event-day">
                            <ul class="events">
                                <li>
                                    <a href="event.php">
                                        Event1 name
                                    </a>
                                </li>
                            </ul>
                            <p class="day-number">
                                1
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day event-day">
                            <ul class="events">
                                <li>
                                    <a href="event.php">
                                        Event1 name
                                    </a>
                                </li>
                            </ul>
                            <p class="day-number">
                                2
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                3
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                4
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day event-day">
                            <ul class="events">
                                <li>
                                    <a href="event.php">
                                        Event1 name
                                    </a>
                                </li>
                                <li>
                                    <a href="event.php">
                                        Event2 name
                                    </a>
                                </li>
                                <li>
                                    <a href="event.php">
                                        Event1 name
                                    </a>
                                </li>
                                <li>
                                    <a href="event.php">
                                        Event2 name
                                    </a>
                                </li>
                                <li>
                                    <a href="event.php">
                                        Event1 name
                                    </a>
                                </li>
                                <li>
                                    <a href="event.php">
                                        Event2 name
                                    </a>
                                </li>
                                <li>
                                    <a href="event.php">
                                        Event1 name
                                    </a>
                                </li>
                                <li>
                                    <a href="event.php">
                                        Event2 name
                                    </a>
                                </li>
                                <li>
                                    <a href="event.php">
                                        Event1 name
                                    </a>
                                </li>
                                <li>
                                    <a href="event.php">
                                        Event2 name
                                    </a>
                                </li>
                            </ul>
                            <p class="day-number">
                                5
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                6
                            </p>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                7
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                8
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                9
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                10
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                11
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                12
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day event-day">
                            <ul class="events">
                                <li>
                                    <a href="event.php">
                                        Event4 name
                                    </a>
                                </li>
                            </ul>
                            <p class="day-number">
                                13
                            </p>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                14
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                15
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                16
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                17
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                18
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                19
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                20
                            </p>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                21
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                22
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                23
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day event-day">
                            <ul class="events">
                                <li>
                                    <a href="event.php">
                                        Event5 name
                                    </a>
                                </li>
                            </ul>
                            <p class="day-number">
                                24
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                25
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                26
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                27
                            </p>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                28
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                29
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                30
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day other-month-day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                1
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day other-month-day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                2
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day other-month-day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                3
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="day other-month-day">
                            <ul class="events">

                            </ul>
                            <p class="day-number">
                                4
                            </p>
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
        </main>
    </div>
</body>
</html>