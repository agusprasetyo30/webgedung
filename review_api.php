<?php
require('./Api/Notification.php');

$notification = new Notification();

$method = isset($_GET['m']) ? $_GET['m'] : '';
$request = isset($_GET['q']) ? $_GET['q'] : '';


if ($method == 'getNotification') {
    $result = json_encode($notification->getNotification((isset($_GET['username']) ? $_GET['username'] : null) , "review"));
    echo $result;
}else if($method == 'readNotification') {
    $notifications =  isset($_POST['notifications']) ? $_POST['notifications'] : [];
    $notification->readNotification($notifications, 'review');
}
