<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/global-main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <!-- <link rel="stylesheet" type="text/css" href="public/css/login.css"> -->
    <link rel="stylesheet" type="text/css" href="/public/css/team.css">

    <script src="https://kit.fontawesome.com/32e003c632.js" crossorigin="anonymous"></script>
    <title>TEAM</title>
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
            <section class="items">
                <div class="items-container">
                    <h1>members</h1>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p> 
                        </div>
                    </a>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                        </div>
                    </a>
                    <a href="profile">
                        <div class="item">
                            <p>Name Surname</p>
                            <p>Start Point Address</p>
                        </div>
                    </a>
                    
                </div>
                <section class="buttons">
                    <button class="add-button member-button disabled-button">
                        <i class="fa-solid fa-plus"></i>
                        Join team!
                    </button>
                    <button class="add-button member-button">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        Leave team
                    </button>
                </section>
            </section>
            
            <div class="separator"></div>
            <div class="add-event">
                <form>
                    <div class="input-container">
                        <label for="name">Event name:</label>
                        <input class="event-input" type="text" placeholder="public.">
                    </div>
                    <div class="input-container">
                        <label for="date">Date:</label>
                        <input class="event-input" type="date">
                        <input class="event-input" type="time">
                    </div>
                    <div class="input-container">
                        <label for="location">Start location:</label>
                        <input class="event-input" type="text" placeholder="public.">
                    </div>
                    <div class="input-container">
                        <label for="type">Type of surface:</label>
                        <select id="type" name="type">
                            <option value="trail">Trail</option>
                            <option value="asphalt">Asphalt</option>
                            <option value="mixed">Mixed</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="distance">Distance:</label>
                        <input class="event-input" type="range" value="1" min="1" max="300" step="1" oninput="this.nextElementSibling.value = this.value">
                        <output>1</output>
                    </div>
                    <div class="input-container">
                        <label for="partcicipants">Participants:</label>
                        <input class="event-input" type="range" value="24" min="1" max="100" step="1" oninput="this.nextElementSibling.value = this.value">
                        <output>24</output>
                    </div>
                    <div class="input-container">
                        <label for="myfile">GPS track:</label>
                        <input class="event-input" type="file" id="myfile" name="myfile">
                    </div>
                </form>
                <button class="add-button">
                    <i class="fa-solid fa-plus"></i>
                    Add event!
                </button>
            </div>
        </main>
    </div>
</body>