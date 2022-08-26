<?php
// START SESSION
session_start();

// PATH FOLDER APP
define('PATHDEFAULT', dirname(__FILE__));

// APPLOAD FILE
require PATHDEFAULT . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'appload.php';