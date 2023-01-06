<?php
session_start();
session_destroy();
header('location:../allpages/pages.html');
?>