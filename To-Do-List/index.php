<?php
require_once("php/framework.php");

$startSession = SessionManager::startSession();
$headInit = Framework::headInit();
$scriptsLoad = Framework::scriptsLoad();

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
