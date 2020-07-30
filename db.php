<?php
$db = 'news';
$link = mysqli_connect('localhost', 'root', '', 'news')
        or die(mysqli_connect_error($link));
mysqli_query($link, "SET NAMES utf8");
?>
