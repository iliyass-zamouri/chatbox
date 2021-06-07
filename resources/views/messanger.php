<?php


use 
// require('vendor/pusher/pusher-php-server/src/Pusher.php');

$options = array('cluster'=>'eu',
'encrypted'=>true);
$pusher = new pusher('550840a0cf66b01e59e6','e74019881420b6d465f9','1213058',$options);

$data['id'] = 1;
$data['from'] = 1;
$data['to'] = 2;
$data['text'] = "Hello, Please work";
$from = 1;

$pusher->trigger('messages.$from','NewMessage',$data);
?>

