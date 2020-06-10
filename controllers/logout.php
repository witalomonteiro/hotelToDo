<?php

session_start();
session_destroy();
header('Location: http://localhost/Lab/hotelToDo/views/login.php');

?>