<?php
session_start();
define("HOST", "localhost"); // The host you want to connect to.
define("USER", "root"); // The database username.
define("PASSWORD", "root"); // The database password.
define("DATABASE", "scheduler");

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE)
or die("Failed to connect");
