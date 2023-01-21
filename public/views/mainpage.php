<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/team.css">
    <link rel="stylesheet" type="text/css" href="/public/css/global-main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <script type="text/javascript" src="/public/js/runSignup.js" defer></script>

    <script src="https://kit.fontawesome.com/32e003c632.js" crossorigin="anonymous"></script>
    <title>MAIN PAGE</title>
</head>
<body>
    <div class="base-container">
        <?php include('navigation.php');?>
        <main>
            <section class="items">
                <h1>today's runs</h1>
                <div class="items-container">
                    <?php if (isset($runs)) foreach ($runs as $run): ?>
                        <a>
                            <div class="item">
                                <p> <?= $run['name'] .' ' .$run['surname']?></p>
                                <p> <?= $run['start_point'] ?></p>
                                <p> <?= $run['time'] ?></p>
                                <p> <?= $run['distance'] ?></p>
                                <p> <?= $run['pace'] ?></p>
                               <?php
                                $disabled = '';
                                if (isset($user) && in_array($user, $participants[$run['id']])) {
                                    $disabled = 'disabled';
                                }
                                ?>
                                <button <?= $disabled ?> name="<?php echo $run['id']?>" id="join-button" class="add-button member-button" type="submit">
                                    <i class="fa-solid fa-plus"></i>
                                    Take part!
                                </button>
                            </div>
                        </a>

                    <?php endforeach; ?>
                </div>
            </section>
            <div class="separator"></div>
            <div class="add-event">
                <h1>add new run!</h1>
                <form action="addRun" method="POST">
                    <div class="input-container">
                        <label for="start-point">Start point:</label>
                        <input type="text" placeholder="..." name="start_point">
                    </div>
                    <div class="input-container">
                        <label for="time">Time:</label>
                        <input type="time" id="time" name="time">
                    </div>
                    <div class="input-container">
                        <label for="distance">Distance:</label>
                        <select id="distance" name="distance">
                            <option value="1 km">1 km</option>
                            <option value="2 km">2 km</option>
                            <option value="3 km">3 km</option>
                            <option value="4 km">4 km</option>
                            <option value="5 km">5 km</option>
                            <option value="6 km">6 km</option>
                            <option value="7 km">7 km</option>
                            <option value="8 km">8 km</option>
                            <option value="9 km">9 km</option>
                            <option value="10 km">10 km</option>
                            <option value="12 km">12 km</option>
                            <option value="15 km">15 km</option>
                            <option value="20 km">20 km</option>
                            <option value="30 km">Over 20 km</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="pace">Pace:</label>
                        <select id="pace" name="pace">
                            <option value="Under 4:00 min/km">Under 4:00 min/km</option>
                            <option value="4:00 min/km">4:00 min/km</option>
                            <option value="4:15 min/km">4:15 min/km</option>
                            <option value="4:30 min/km">4:30 min/km</option>
                            <option value="4:45 min/km">4:45 min/km</option>
                            <option value="5:00 min/km">5:00 min/km</option>
                            <option value="5:15 min/km">5:15 min/km</option>
                            <option value="5:30 min/km">5:30 min/km</option>
                            <option value="5:45 min/km">5:45 min/km</option>
                            <option value="6:00 min/km">6:00 min/km</option>
                            <option value="Over 6:00 min/km">Over 6:00 min/km</option>
                        </select>
                    </div>
                    <button class="add-button"  type="submit">
                        <i class="fa-solid fa-plus"></i>
                        Add run!
                    </button>
                </form>
            </div>
        </main>
    </div>
</body>
