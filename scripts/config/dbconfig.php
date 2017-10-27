<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 23/10/2017
 * Time: 11:08
 */

   define('DB_HOST', 'mysql');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'secret');
   define('DB_DATABASE', 'hr_app');
   $db = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
