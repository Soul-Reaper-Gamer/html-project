<?php

$Username = $_POST['username'];
$email = $_POST['email'];
$upassword = $_POST['password'];

$conn=mysqli_connect("localhost","root","","vishal1");
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}


$checkStmt = $conn->prepare("SELECT * FROM user1 WHERE Username = ? OR email = ?");
$checkStmt->bind_param("ss", $Username, $email);
$checkStmt->execute();
$result = $checkStmt->get_result();
if($result->num_rows >0){
    echo "<script>
        alert('User already exists');
        setTimeout(function() {
        window.location.href = '/Vishal/Website/registration.html';
    }, 2000);
    </script>
    Directing to Sign Up Page...";
    exit();
}else{
    $stm = $conn->prepare("INSERT INTO user1 (Username, email, upassword) VALUES (?, ?, ?)");
    $stm->bind_param("sss", $Username, $email, $upassword);
    $stm->execute();

if($stm->execute()){
    echo "<script>
    alert('Registration successfull');
    setTimeout(function(){
    window.location.href='/Vishal/Website/login.html';
    },2000);
    </script>
    Directing to Sign In Page....";

    exit();
}else{
    echo"error".$stm->error;
}
$stm->close();
}






$checkStmt->close();

$conn->close();
?>
