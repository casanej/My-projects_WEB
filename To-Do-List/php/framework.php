<?php
spl_autoload_register(function($class_name){
    $filename = sprintf("php/@system/%s.php", $class_name);
    if(file_exists($filename)){
        require_once($filename);
    }
});

$actualPath = "";

for($i="";$i!="../../../../../";$i.="../"){
    if(file_exists($i."php/@system/session_manager.php")){
        require_once($i."php/@system/session_manager.php");
        break;
    }
}


class Framework{
/* --- CSS FUNCTION -- */
    function headInit($type=null, $path=''){
        $head = "";

        $head .= '<meta charset="windows-1252" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
        $head .= sprintf('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">', $path);
        $head .= sprintf("<link rel='stylesheet' type='text/css' href='%scss/bootstrap-material-design.min.css'>", $path);
        $head .= sprintf("<link rel='stylesheet' type='text/css' href='%scss/todolist.css'>", $path);

        switch($type){}

        return $head;
    }
/* - END CSS FUNCTION -*/
/* - JAVASCRIPT FUNCTION - */
    function scriptsLoad($type=null, $path=''){
        $scripts = "";

        $scripts .= sprintf("<script src='%sjs/jquery-3.3.1.min.js'></script>", $path);
        $scripts .= sprintf("<script src='%sjs/popper.js'></script>", $path);
        $scripts .= sprintf("<script src='%sjs/bootstrap-material-design.js'></script>", $path);
        $scripts .= sprintf("<script src='%sjs/bigSlide.min.js'></script>", $path);
        $scripts .= sprintf("<script src='%sjs/todolist.js'></script>", $path);
        $scripts .= '<script>$(document).ready(function() { $("body").bootstrapMaterialDesign(); }); $(document).ready(function() { $(".menu-link").bigSlide({state: "open", saveState: true }); });</script>';

        switch($type){}

        return $scripts;
    }
    function debug_to_console($data, $context = 'Debug in Console') {
        ob_start();

        $output = 'console.info(\'' . $context . ':\');';
        $output .= 'console.log('.json_encode( $data ).');';
        $output = sprintf('<script>%s</script>', $output);

        echo $output;
    }
/* END JAVASCRIPT FUNCTION */

/* --- PHP FUNCTION ---*/
public function verifyError(string $error){
    switch($error){
        case 1:
            //SQL ERROR -> true: query succefull
            $msg = "Query executed with succefull.";
            break;
        case 23000;
            //SQL ERROR -> 1062: duplicated row
            $msg = "Have a duplicate row on the query";
            break;
        case "42S01":
            $msg = "The table already exist.";
            break;
        default:
            $msg = "Have no error on the system";
            break;
    }

    return $msg;
}
/* --- END PHP FUNCTION */
}
?>
