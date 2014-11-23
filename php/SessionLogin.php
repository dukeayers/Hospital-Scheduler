<?php
session_start();
define("HOST", "localhost"); // The host you want to connect to.
define("USER", "findfuut_nau"); // The database username.
define("PASSWORD", "=naugroup"); // The database password.
define("DATABASE", "findfuut_scheduler");

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE)
or die("Failed to connect");
