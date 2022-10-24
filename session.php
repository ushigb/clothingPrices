<?php

if (!$_SESSION) {
    echo "somethings wrong";
    header('location: login.php');
}