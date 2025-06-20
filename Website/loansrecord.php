<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "vishal1";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['delete'])) {
  $application_id = $_GET['delete'];
  $delete_sql = "DELETE FROM loan_application WHERE application_id = $application_id";
  mysqli_query($conn, $delete_sql);
  header("Location:/Vishal/Website/loansrecord.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Loans - Bank of Vijaymalya</title>
  <link rel="stylesheet" href="Backend/loanrec.css">
</head>
<body>

  <header>
    <h1>All Loan Records</h1>
    <nav>
        <ul>
            <li><a href="Home.html">Homes</a></li>
        </ul>
    </nav>
  </header>

  <div class="content">
    <?php
      $sql = "SELECT * FROM loan_application";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                  <th>Loan ID</th>
                  <th>Customer Name</th>
                  <th>Loan Type</th>
                  <th>Amount</th>
                  <th>Interest Rate (%)</th>
                  <th>Duration (Year)</th>
                  <th>Action</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>
          <td>{$row['application_id']}</td>
          <td>{$row['customer_name']}</td>
          <td>{$row['loan_type']}</td>
          <td>{$row['loan_amount']}</td>
          <td>{$row['interest_rate']}</td>
          <td>{$row['duration']}</td>
          <td>" .
            "<a class='btn-delete' href='loansrecord.php?delete=" . $row['application_id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>" .
          "</td>
        </tr>";
}
        echo "</table>";
      } else {
        echo "<p>No loan records found.</p>";
      }

      mysqli_close($conn);
    ?>
  </div>

</body>
</html>
