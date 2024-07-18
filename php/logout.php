<?php
session_start();
session_unset();
session°destroy();
header('Location: index.php');
exit();
?>