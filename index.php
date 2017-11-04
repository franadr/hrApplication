<?php
session_start();
require 'scripts/php/sessionScript.php';

if(isAdmin())
header("location: main.php?p=admin");
elseif(isHR())
    header("location: main.php?p=home2");
else
    header("location: main.php?p=home1");