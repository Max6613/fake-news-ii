<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
    session_destroy();
}

header('Location: ' . $_SERVER['HTTP_REFERER']);