<?php

/**
 * Configuration for database connection
 *
 */
$user_name= "root";
$host       = "localhost";
$password   = "";
$dbname     = "dbtrack"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
              ?>