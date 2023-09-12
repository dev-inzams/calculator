<?php
    $operator = $_POST['operator'];
    $operand1 = $_POST['operand1'];
    $operand2 = $_POST['operand2'];

    $data1 = sprintf("%08s", $operand1);
    $dataO = sprintf("% 4s", $operator);
    $data2 = sprintf("%08s", $operand2);

echo "<li>$data1 </br> $dataO </br> $data2</li>";