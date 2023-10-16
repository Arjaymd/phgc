<?php
require_once("db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION["user_id"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    $sql = "INSERT INTO appointments (user_id, appointment_date, appointment_time) VALUES ('$user_id', '$date', '$time')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Database error: " . mysqli_error($conn));
    }

    mysqli_close($conn);
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: set_appointment.php");
    exit();
}
?>
