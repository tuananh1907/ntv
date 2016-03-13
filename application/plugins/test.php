<?php
//include(APPPATH . "libraries/Pluggable.php");
$pluggable = new Pluggable;

$pluggable->register_action('test_event', 'test_function');

function test_function($t, $c) {
  print_r($c);
}
