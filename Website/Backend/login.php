<?php
$Username = $_POST['username'];
$upassword = $_POST['password'];


$conn=mysqli_connect("localhost","root","","vishal1");
if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

$checkstm=$conn->prepare("SELECT * FROM user1 WHERE Username = ? AND upassword = ?");
$checkstm->bind_param("ss",$Username,$upassword);
$checkstm->execute();
$result=$checkstm->get_result();
if($result->num_rows >0){
    header("Location:/Vishal/Website/Home.html");
}else{
    echo"<script>
        alert('Wrong Username or Password');
        setTimeout(function() {
        window.location.href = '/Vishal/Website/login.html';
    }, 2000);
    </script>
    Directing to Login Page...";
}


?>
