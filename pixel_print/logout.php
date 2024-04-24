<?php

session_start();
session_unset();
session_destroy();

header("Location: SignUp.php");
exit();
?>
