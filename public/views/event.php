<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/global-main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/team.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/public/css/event.css">

    <script type="text/javascript" src="/public/js/eventSignup.js" defer></script>
    <script src="https://kit.fontawesome.com/32e003c632.js" crossorigin="anonymous"></script>
    <title>EVENT</title>
</head>
<body>
    <div class="base-container">
        <?php include('navigation.php');?>
        <main>
            <section class="event">
                <?php if (isset($event)) {?>
                    <h1><?= $event->getEventName()?></h1>
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
                            <?= $event->getDate() ?><br>
                            <?= $event->getLocation() ?><br>
                            <?= $event->getDistance() ?> Km<br>
                            <?= $event->getType() ?><br>
                            <b id="signed"><?= $event->getSignedParticipants() ?></b>/<?= $event->getTotalParticipants() ?><br>
                            <a href="team?n=<?= $event->getTeamName() ?>"><?= $event->getTeamName() ?></a>
                        </div>
                    </div>
                <?php } ?>
                <img class="map-img" src="/public/img/gpsTrack.png">
                <button>Download GPS track</button>
                <?php
                    $disabled = '';
                    if ($event->getSignedParticipants() == $event->getTotalParticipants()) {
                        $disabled = 'disabled';
                    } else if (isset($participants)) {
                        foreach ($participants as $participant) {
                            if ($_COOKIE['user'] === $participant->getEmail()) {
                                $disabled = 'disabled';
                                break;
                            }
                        }
                    }
                ?>
                <button id="signup" <?php echo $disabled ?>>Sign up for event!</button>
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
                    <?php if (isset($participants)) foreach ($participants as $participant): ?>
                        <a href="profile?id=<?= $participant->getId()?>">
                            <div class="participant">
                                <p id="participant-name"> <?= $participant->getName() .' ' .$participant->getSurname()?> </p>
                                <p id="participant-team"> <?= $participant->getTeam()?> </p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>
</body>

<template id="participant-template">
    <a>
        <div class="participant">
            <p id="participant-name">name</p>
            <p id="participant-team">team</p>
        </div>
    </a>
</template>