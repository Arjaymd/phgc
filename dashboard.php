<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
session_start();



if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

require_once("db.php"); // Include your database connection

$user_id = $_SESSION["user_id"];

// Retrieve user's appointments from the database
$sql = "SELECT * FROM appointments WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

$appointments = array();

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">

</head>
<body>
<div class="container">
        <header>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="set_appointment.php">Set Appointment</a></li>
                    <li><a href="appointment_details.php">Appointment Details</a></li>
                    <li><a href="dentists.php">Dentists</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                </ul>
            </nav>
        </header>
        <h2>Welcome to Bruno's Dental Office, <?php echo $_SESSION["user_id"]; ?>!</h2>
        <h3>Your Appointments</h3>
        <?php if (count($appointments) > 0) { ?>
            <ul>
                <?php foreach ($appointments as $appointment) { ?>
                    <div class="content">
                    <li>
                        <strong>Appointment Date:</strong> <?php echo $appointment["appointment_date"]; ?><br>
                        <strong>Description:</strong> <?php echo $appointment["description"]; ?>
                    </li>
                </div>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>You have no appointments.</p>
        <?php } ?>
        <a href="logout.php">Logout</a>
    </div>

    <footer>
            &copy; 2023 Bruno's Dental Office. All rights reserved.
        </footer>
</body>


</html>

