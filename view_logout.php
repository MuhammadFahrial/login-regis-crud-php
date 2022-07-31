<?php

session_start();
$_SESSION = [];
session_unset();
session_destroy();

// mengahpus cookie
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: view_login.php");
exit;
