<?php
    require ('db.php');
    $ip = $_SERVER['REMOTE_ADDR'];

    $query = "DELETE FROM `cal_data` WHERE '$ip' = user_ip" ;
    mysqli_query($db,$query);