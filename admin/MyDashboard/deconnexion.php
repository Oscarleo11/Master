<?php

session_start();

if (isset($_SESSION['xhTohTuzPbbsTtr71'])) {
    $_SESSION['xhTohTuzPbbsTtr71'] = array();
    session_destroy();
    header("Location: ../../");
} else {
    header("Location: ../../login.php");
}
