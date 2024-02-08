<?php
error_reporting(0);

include './db.php';
include './function.php';
session_destroy();
header('location: index.php');

