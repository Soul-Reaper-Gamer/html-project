<?php

$customer_name = $_POST['customer_name'];
$loan_type = $_POST['loan-types'];
$loan_amount = $_POST['loan_amount'];
$duration = $_POST['duration'];
$interest_rate = $_POST['interest_rate'];


$conn = new mysqli("localhost", "root", "", "vishal1");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO loan_application (customer_name, loan_type, loan_amount, duration, interest_rate)
        VALUES ('$customer_name', '$loan_type', '$loan_amount', '$duration', '$interest_rate')";

if ($conn->query($sql) === TRUE) {
    echo "Loan application submitted successfully.<br>  <a href='/Vishal/Website/Home.html'> Home Page</a>";
     
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
