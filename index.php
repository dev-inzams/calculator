<?php
    require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Calculator</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="calculator">
        <div class="container">
            <div id="res" class="cal-form">
                <h3 style="text-align: center; margin-bottom:10px">My PHP Calculator</h3>
                    <input class="input-box" type="text" name="operand1" id="operand1">
                    <input class="input-box" type="text" name="operand2" id="operand2">
                    <select class="input-box" name="operator" id="operator">
                        <option value="+">Addition</option>
                        <option value="-">Subtraction</option>
                        <option value="*">Multiplication</option>
                        <option value="/">Division</option>
                    </select>
                    <div class="btn">
                        <input type="submit" value="Calculate" name="calculate" id="calculate">
                    </div>

            </div>

            <div id="res" class="result">
                <h2>Output:</h2>
                <h3 id="output"></h3>
            </div>

            <div id="res" class="details">
                <h2>Details</h2>
                <ul id="details"></ul>
            </div>

            <div id="res" class="history">
                <h2>History</h2>
                <ul id="New"></ul>

                <h6>Old</h6>
                <ul id="history"></ul>
                <button id="clear">Clear</button>
            </div>
        </div>
        
        <div class="likeCount">
            <div class="likeCountBtn">
                <p id="like">
                    <i onclick="likeCount()" class="fa-regular fa-heart"></i> 
                </p>
               <div id="count"></div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#calculate').click(function(){
            $.ajax({
                type: 'POST',
                url: 'calculator.php',
                data:{
                    operator: $('#operator').val(),
                    operand1: $('#operand1').val(),
                    operand2: $('#operand2').val(),
                },
                success:function(data){
                    $('#output').html(data);
                }
            });
        });

        // details
        $('#calculate').click(function(){
            $.ajax({
                type: 'POST',
                url: 'details.php',
                data:{
                    operator: $('#operator').val(),
                    operand1: $('#operand1').val(),
                    operand2: $('#operand2').val(),
                },
                success:function(data){
                    $('#details').html(data);
                    $('#New').html(data);
                }
            });
        });


            $.ajax({
                type: 'POST',
                url: 'history.php',
                dataType: 'html',
                success:function(data){
                    $('#history').html(data);
                }
            });
        
        $('#clear').click(function(){
            $.ajax({
                type: 'POST',
                url: 'clear.php',
                dataType: 'html',
                success:function(data){
                    $('#history').html(data);
                    alert('History Clear Done');
                }

            });
        });
  

    });
    
    
      
    
</script>

<?php
    $query = "SELECT * FROM `likeCount` order by id desc";
    $run = mysqli_query($db, $query);
    $likeData = mysqli_fetch_array($run);
    $ip = $_SERVER['REMOTE_ADDR'];
    $storeIp = $likeData['likeIp'];
    if($ip == $storeIp){
    ?>
    <script type="text/javascript">
     document.getElementById('like').innerHTML = '<i id="unlike" class="fa-solid fa-heart"></i></br><?php echo $likeData['count']; ?>';
    </script>
    <?php
    }else{
        
?>
<script type="text/javascript">
    function likeCount(){
document.getElementById('like').innerHTML = '<i id="unlike" class="fa-solid fa-heart"></i></br> <?php echo $likeData['count']+1; $likeDataa = $likeData['count']+1;$ips = $_SERVER['REMOTE_ADDR']; $queryLike = "INSERT INTO `likeCount`(`count`,`likeIp`) VALUES ('$likeDataa','$ips')";mysqli_query($db, $queryLike); ?>';
    };
</script>

<?php } ?>
</body>
</html>