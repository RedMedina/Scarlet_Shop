<?php

session_start();
unset ($_SESSION['loggedin']);
unset ($_SESSION['fullname']);
unset ($_SESSION['mail']);
unset ($_SESSION['uuid']);
unset ($_SESSION['id']);
unset ($_SESSION['active']);
unset ($_SESSION['photo']);
session_destroy();

header('Location: ./');

?>