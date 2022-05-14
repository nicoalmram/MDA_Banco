<?php
session_start();

include 'db_connect.php';

session_destroy();
session_unset();

header('location:./index.php');

