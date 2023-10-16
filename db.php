<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "clinic";


$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// db.php
function isTimeSlotAvailable($date, $time) {
    global $conn;

    $sql = "SELECT id FROM appointments WHERE appointment_date = '$date' AND appointment_time = '$time'";
    $result = mysqli_query($conn, $sql);

    return mysqli_num_rows($result) === 0; // Returns true if no conflicting appointments
}

?>
