<?php
       require('db.php');
    
        $query = "SELECT * FROM `likeCount` WHERE 1";
        $run = mysqli_query($db, $query);
        $likeData = mysqli_fetch_array($run);


echo $likeData['count']; ?>