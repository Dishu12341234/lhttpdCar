<?php

session_start();

session_unset();
session_destroy();

header('Location: /'); // Corrected header syntax
exit(); // Make sure to exit to avoid further script execution

?>
