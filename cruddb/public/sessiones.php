<?php
// echo "<pre>Post: ";
// print_r($_POST);
// echo "</pre>";

// echo "<pre>Get: ";
// print_r($_GET);
// echo "</pre>";

// echo "<pre>Files: ";
// print_r($_FILES);
// echo "</pre>";


echo "<pre>Session: ";
print_r($_SESSION);
echo "</pre>";

session_start();
// session_destroy();
// session_start();
session_regenerate_id();

echo "<pre>Session ID: ";
print_r(session_id());
echo "</pre>";


// unset($_SESSION['Application']['username']);

echo "<pre>Session 2: ";
print_r($_SESSION);
echo "</pre>";

$_SESSION['Application']['username'] = 'Agustin';
$_SESSION['Core']['logs'] = __DIR__.'/../logs';

echo "<pre>Session 3: ";
print_r($_SESSION);
echo "</pre>";

die;