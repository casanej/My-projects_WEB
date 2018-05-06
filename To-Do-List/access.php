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
    <div class="container" id="content">
        <div class="row">
            <div class="col-sm-12 col-md-6 border-right">
                <h4 align="center">Login</h4>
                <form method="post" action="php/@validation/user-login.php">
                    <div class="form-group">
                        <label for="inputEmailLogin" class="bmd-label-floating">Email address</label>
                        <input type="email" class="form-control" id="inputEmailLogin" name="loginEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPassLogin" class="bmd-label-floating">Password</label>
                        <input type="password" class="form-control" id="inputPassLogin" name="loginPassword" required>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="loginKeepLogged" disabled> Keep logged ?</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-raised">Log in</button>
                </form>
            </div>
            <div class="col-sm-12 col-md-6">
                <h4 align="center">Register</h4>
                <form method="post" action="php/@validation/user-register.php">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="registerFName" class="bmd-label-floating">First Name</label>
                                <input type="text" class="form-control" id="registerFName" name="registerFName" min="6" required>
                                <span class="bmd-help">Name must have atleast 6 characters</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="registerLName" class="bmd-label-floating">Last Name</label>
                                <input type="text" class="form-control" id="registerLName" name="registerLName" min="3" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registerEmailLogin" class="bmd-label-floating">Email address</label>
                        <input type="email" class="form-control" id="registerEmailLogin" name="registerEmail" required>
                        <span class="bmd-help">We'll never share your email with anyone else.</span>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="registerPassword" class="bmd-label-floating">Password</label>
                                <input type="password" class="form-control" id="registerPassword" name="registerPassword" min="6" required>
                                <span class="bmd-help">Password must have atleast 6 characters</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="registerPassConfirm" class="bmd-label-floating">Confirm Password</label>
                                <input type="password" class="form-control" id="registerPassConfirm" name="registerPasswordConfirm" min="6" required>
                                <span class="bmd-help">Confirm password must have atleast 6 characters and match</span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-raised">Register</button>
                </form>
            </div>
        </div>
    </div>
    <?php require_once("php/footer.php"); ?>
</body>
<?=$scriptsLoad;?>
</html>
