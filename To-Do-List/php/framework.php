<?php
class framework{
/* - JAVASCRIPT FUNCTION -*/
function debug_to_console( $data, $context = 'Default Debug -> PHP' ) {
ob_start();

$output  = 'console.info( \'' . $context . ':\' );';
$output .= 'console.info(' . json_encode( $data ) . ');';
$output  = sprintf( '<script>%s</script>', $output );

echo $output;
}
/* END JAVASCRIPT FUNCTION*/
}
?>
