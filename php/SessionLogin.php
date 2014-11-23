<?php
session_start();
define("HOST", "localhost");
define("USER", "root"); // The database username.
define("PASSWORD", "root"); // The database password.
define("DATABASE", "p3_scheduler");
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE)
or die("Failed to connect");
