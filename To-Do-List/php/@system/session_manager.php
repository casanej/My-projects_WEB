<?php
class SessionManager extends Framework{
    function startSession(){
        $return;
        if(!isset($_SESSION)){
            session_start();
            $message = "Session started with success!";
            $return = true;
        } else{
            $message = "Something wrong happen with session manager";
            $return = false;
        }
        //$this->framework = $this->debug_to_console($message);
        return $return;
    }

    function sessionUserLogin(){
        $return = false;
        if(isset($_SESSION['User'])){
            if(isset($_SESSION['User']['isLogged'])){
                $return = $_SESSION['User']['isLogged'];
            }
        }

        return $return;
    }

    function sessionGetVariable($index1, $index2='', $typeDebug=0){
        /* Types of DEBUG:
            00. Return the session;
            01. Return the session by print_r;
            02. Return the session by console (F12);
        */

        $return = "";
        $sessionString;

        if($index2 == ''){
            $sessionString = $_SESSION[$index1];
        } else{
            $sessionString = $_SESSION[$index1][$index2];
        }

        if(!empty($sessionString)){
            switch($typeDebug){
                case 0;
                    $return = $sessionString;
                    break;
                case 1;
                    printf_r($sessionString);
                    break;
                case 2;
                    $this->framework = $this->debug_to_console($sessionString);
                    break;
            }
        }

        return $return;
    }
}

$isUserLogged = SessionManager::sessionUserLogin();

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_page = explode('/', $actual_link);

if($isUserLogged){
    if($actual_page[4] == "access.php") header("Location: perfil.php");
}
?>
