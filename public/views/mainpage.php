<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/team.css">
    <link rel="stylesheet" type="text/css" href="/public/css/global-main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">

    <script src="https://kit.fontawesome.com/32e003c632.js" crossorigin="anonymous"></script>
    <title>MAIN PAGE</title>
</head>
<body>
    <div class="base-container">
        <nav>
            <a href="mainpage">
                <img src="/public/img/logo.svg" alt="">
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
            <section class="items">
                <div class="items-container">
                    <h1>Today's<br>runs</h1>
                    <a href="#">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                            <p>Time</p>
                            <p>Distance</p>
                            <p>Pace</p> 
                        </div>
                    </a>
                    <a href="#">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                            <p>Time</p>
                            <p>Distance</p>
                            <p>Pace</p> 
                        </div>
                    </a>
                    <a href="#">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                            <p>Time</p>
                            <p>Distance</p>
                            <p>Pace</p> 
                        </div>
                    </a>
                    <a href="#">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                            <p>Time</p>
                            <p>Distance</p>
                            <p>Pace</p> 
                        </div>
                    </a>
                    <a href="#">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                            <p>Time</p>
                            <p>Distance</p>
                            <p>Pace</p> 
                        </div>
                    </a>
                    <a href="#">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                            <p>Time</p>
                            <p>Distance</p>
                            <p>Pace</p> 
                        </div>
                    </a>
                    
                </div>
            </section>
            <div class="separator"></div>
            <div class="add-event">
                <h1>Add new run!</h1>
                <form>
                    <div class="input-container">
                        <label for="start-point">Start point:</label>
                        <input type="text" placeholder="...">
                    </div>
                    <div class="input-container">
                        <label for="time">Time:</label>
                        <input type="time" id="time">
                    </div>
                    <div class="input-container">
                        <label for="distance">Distance:</label>
                        <select id="distance" name="distance">
                            <option value="1">1 km</option>
                            <option value="2">2 km</option>
                            <option value="3">3 km</option>
                            <option value="4">4 km</option>
                            <option value="5">5 km</option>
                            <option value="6">6 /km</option>
                            <option value="7">7 km</option>
                            <option value="8">8 km</option>
                            <option value="9">9 km</option>
                            <option value="10">10 km</option>
                            <option value="12">12 km</option>
                            <option value="15">15 km</option>
                            <option value="20">20 km</option>
                            <option value="30">Over 20 km</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="pace">Pace:</label>
                        <select id="pace" name="pace">
                            <option value="300">Under 4:00 min/km</option>
                            <option value="400">4:00 min/km</option>
                            <option value="415">4:15 min/km</option>
                            <option value="430">4:30 min/km</option>
                            <option value="445">4:45 min/km</option>
                            <option value="500">5:00 min/km</option>
                            <option value="515">5:15 min/km</option>
                            <option value="530">5:30 min/km</option>
                            <option value="545">5:45 min/km</option>
                            <option value="600">6:00 min/km</option>
                            <option value="700">Over 6:00 min/km</option>
                        </select>
                    </div>
                    <button class="add-button">
                        <i class="fa-solid fa-plus"></i>
                        Add run!
                    </button>
                </form>
            </div>
        </main>
    </div>
</body>
