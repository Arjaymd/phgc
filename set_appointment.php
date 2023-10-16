<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="appointment.css">

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

<body>
    <div class="container">
    <div class="form-container">
        <h2>Set Appointment</h2>
        <form method="post" action="process_appointment.php">
            <label for="date">Date:</label>
            <input type="date" name="date" required><br>
            
            <label for="time">Time Slot:</label>
            <select name="time" required>
                <option value="09:00">09:00 AM</option>
                <option value="10:00">10:00 AM</option>
                <!-- Add more time options as needed -->
            </select><br>
            
            <button type="submit">Book Appointment</button>
        </form>
    </div>
    <footer>
            &copy; 2023 Bruno's Dental Office. All rights reserved.
        </footer>
</body>
</html>

