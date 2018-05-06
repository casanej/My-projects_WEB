<?php
require_once("php/framework.php");
require_once("php/@system/session_manager.php");

$fwFramework = new Framework();
$fwSessionManager = new SessionManager();

$startSession = $fwSessionManager->startSession();
$headInit = $fwFramework->headInit();
$scriptsLoad = $fwFramework->scriptsLoad();
?>
<!doctype html>
<html lang="en">
<head>
    <?=$headInit;?>
</head>
<body>
    <?php require_once("php/menu-bar-top.php"); ?>
    <div id="content">
        TESTE DE CONTEUDO
    </div>
    <?php require_once("php/footer.php"); ?>
</body>
<?=$scriptsLoad;?>
</html>
