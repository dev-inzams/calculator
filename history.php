<?php
    require ('db.php');

    $ip = $_SERVER['REMOTE_ADDR'];

    $query = "SELECT * FROM `cal_data` WHERE '$ip' = user_ip";
    $run = mysqli_query( $db, $query );
    while ( $cal_data = mysqli_fetch_array( $run ) ) {
        ?>
            <li><?=$cal_data['operand1'];?> <?=$cal_data['operator'];?> <?=$cal_data['operand2'];?> <span style="font-size: 10px; color:beige;"><?=$cal_data['cal_time'];?></span> </li>
        <?php }?>