<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/global-main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/calendar.css">

    <script src="https://kit.fontawesome.com/32e003c632.js" crossorigin="anonymous"></script>
    <title>CALENDAR</title>
</head>
<body>
    <div class="base-container">
        <?php include('navigation.php');?>
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
                        <option value="2023">2023</option>
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
                <?php if (isset($days)) foreach ($days as $day): ?>
                    <div <?= ' '.$day['class']?>>
                        <ul class="events web-events">
                            <?php if (array_key_exists('events', $day)) foreach ($day['events'] as $event): ?>
                                <li>
                                    <a href="event?id=<?= $event->getId() ?>">
                                        <?= $event->getEventName()?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <p class="day-number">
                            <?= $day['dayNumber']?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mobile-events">
                <ul class="events">
                    <?php if (isset($days)) foreach ($days as $day): ?>
                        <?php if (array_key_exists('events', $day)) { ?>
                            <li>
                                <label class="day-number">
                                    <?= $day['dayNumber']?>
                                </label>
                                <?php if (array_key_exists('events', $day)) foreach ($day['events'] as $event): ?>
                                    <a href="event?id=<?= $event->getId() ?>">
                                        <?= $event->getEventName()?>
                                    </a>
                                <?php endforeach; ?>
                            </li>
                        <?php } else {continue;} ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </main>
    </div>
</body>
