<?php
    require ('db.php');

    $operator = $_POST['operator'];
    $operand1 = $_POST['operand1'];
    $operand2 = $_POST['operand2'];
    $ip = $_SERVER['REMOTE_ADDR'];

    if($operand1>0){
        $query = "INSERT INTO `cal_data`(`operand1`, `operator`, `operand2`, `user_ip`) VALUES ('$operand1','$operator','$operand2','$ip')";
        mysqli_query($db, $query);
    }

    switch ( $operator ) {
    case '+':
        $result = $operand1 + $operand2;
        break;
    case '-':
        $result = $operand1 - $operand2;
        break;
    case '*':
        $result = $operand1 * $operand2;
        break;
    case '/':
        if ( $operand2 != 0 ) {
            $result = $operand1 / $operand2;
        } else {
            $result = 'Error: Division by zero';
        }
        break;
    default:
        $result = 'Error: Invalid operator';
        break;
    }

    echo $result;
    exit;
