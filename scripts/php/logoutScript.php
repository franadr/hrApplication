<?php
/*
 * this file is simply the logout operation destroying the current session and redirecting to login page
 */
session_start();
session_unset();
session_destroy();
header("Location: /../../main.php?p=login");
exit();
