<?php
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
}
?>
