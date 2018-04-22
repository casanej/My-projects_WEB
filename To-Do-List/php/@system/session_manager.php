<?php
if(!isset($_SESSION)){
    session_start();
    debug_to_console("Session started with sucefull");
} else{
    debug_to_console("Something wrong happen with session manager");
}

function debug_to_console($data) {
    ob_start();

    $output = 'console.log('.json_encode( $data ).');';
    $output .= sprintf( '<script>%s</script>', $output );

    echo $output;
}
?>
