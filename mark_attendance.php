<?php
include "db.php";

if(isset($_POST['submit'])){
    $roll = $_POST['roll'];
    $total = $_POST['total'];
    $attended = $_POST['attended'];

    $percentage = ($attended/$total)*100;
    $conn->query("UPDATE students SET attendance='$percentage' WHERE roll_no='$roll'");

    echo "<script>alert('Attendance Updated');</script>";
}
?>

<link rel="stylesheet" href="style.css">
<script src="script.js"></script>

<div class="container">
<h2>Mark Attendance</h2>
<form method="post" onsubmit="return validateAttendance(total.value, attended.value)">
<input type="number" name="roll" placeholder="Roll No" required>
<input type="number" name="total" placeholder="Total Lectures" required>
<input type="number" name="attended" placeholder="Attended Lectures" required>
<a href="attendance.php">
    <button type="button" name="save">Save Marks</button>
</a>
</form>
<a href="index.php">Back</a>
</div>
