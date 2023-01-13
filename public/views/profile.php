<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/global-main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">

    <script type="text/javascript" src="/public/js/stats.js" defer></script>
    <script src="https://kit.fontawesome.com/32e003c632.js" crossorigin="anonymous"></script>
    <title>PROFILE</title>
</head>
<body>
    <div class="base-container">
        <?php include('navigation.php');?>
        <main>
            <section class="stats">
                <h1>statistics</h1>
                <form class="stats-param">
                    <select id="period" name="period">
                        <option value="all">All time</option>
                        <option value="month">Last month</option>
                    </select>
                    <div hidden id="spinner"></div>
                </form>
                <p>events</p>
                <div class="stats-container">
                    <div class="labels">
                        Total:<br>
                        Distance:<br>
                        Average position:
                    </div>
                    <div class="values" id="event-stats">
                    <?php if (isset($stats)) { ?>
                        <label id="events-num"> <?= $stats->getEvents() ?> </label><br>
                        <label id="events-distance"> <?= $stats->getEventsDistance() ?> Km</label><br>
                        <label id="events-position"> <?= $stats->getEventsPosition() ?> </label>
                    <?php } ?>
                    </div>
                </div>
                <p>daily runs</p>
                <div class="stats-container">
                    <div class="labels">
                        Total:<br>
                        Distance:<br>
                    </div>
                    <div class="values" id="daily-stats">
                        <?php if (isset($stats)) { ?>
                            <label id="daily-num"> <?= $stats->getDailyRuns() ?> </label><br>
                            <label id="daily-distance"> <?= $stats->getDailyRunsDistance() ?> Km</label>
                        <?php } ?>
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
                            <?= $user_details['location'] ?>
                        </label>
                    </div>
                <?php }?>
                <?php if ($_COOKIE['user'] === $user_details['email']) { ?>
                    <form class="pic-change" action="updateProfilePic" method="POST" ENCTYPE="multipart/form-data">
                        <div class="input-container">
                            <label for="file">Profile pic:</label>
                            <input class="event-input" type="file" id="myfile" name="file">
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

<script>
    let idValue = <?php echo $user_details['id']?>
</script>

<template id="event-stats-template">
    <label id="events-num"></label><br>
    <label id="events-distance"></label><br>
    <label id="events-position"></label>
</template>

<template id="daily-stats-template">
    <label id="daily-num"></label><br>
    <label id="daily-distance"></label>
</template>