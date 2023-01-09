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
    </main>
</div>
</body>