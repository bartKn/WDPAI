<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/global-main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/team.css">

    <script src="https://kit.fontawesome.com/32e003c632.js" crossorigin="anonymous"></script>
    <title>TEAM</title>
</head>
<body>
<div class="base-container">
    <?php include('navigation.php');?>
    <main>
        <div class="teams-container">
            <h1>teams</h1>
            <?php if (isset($teams)) foreach ($teams as $team): ?>
                <div class="item">
                    <a class="team-name" href="team?n=<?= $team->getName()?>"><?= $team->getName()?></a>
                    <form class="join-form" action="joinTeam" method="POST">
                        <input type="hidden" name="teamId" value="<?php echo $team->getId()?>" />
                        <button id="join-button" class="add-button member-button" type="submit">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            Join team
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="separator"></div>
        <div class="add-event" id="add-team-mobile">
            <h1>create team</h1>
            <form action="addTeam" method="POST" ENCTYPE="multipart/form-data">
                <div class="input-container" id="input-container-mobile">
                    <label for="name">Team name:</label>
                    <input class="event-input" type="text" placeholder="..." name="teamName">
                </div>
                <button class="add-button" type="submit" id="add-button-mobile">
                    <i class="fa-solid fa-plus"></i>
                    Add team!
                </button>
            </form>
        </div>
    </main>
</div>
</body>