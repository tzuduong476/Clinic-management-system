<?php
require_once 'db.php';

$_SESSION = [];
session_unset();
session_destroy();

redirect('../frontend/signin.php');
