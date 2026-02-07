<?php
include "db.php";

if(isset($_POST['submit'])){
    $roll = $_POST['roll'];
    $marks = $_POST['marks'];

    if($marks >= 75){
        $remark = "Good";
    } elseif($marks >= 50){
        $remark = "Average";
    } else {
        $remark = "Needs Improvement";
    }

    $conn->query("UPDATE students SET marks='$marks', remark='$remark' WHERE roll_no='$roll'");
    echo "<script>alert('Marks Updated');</script>";
}
?>

<link rel="stylesheet" href="style.css">
<div class="container">
<h2>Enter Marks</h2>
<form method="post">
<input type="number" name="roll" placeholder="Roll No" required>
<input type="number" name="marks" placeholder="Marks (Out of 100)" required>
<a href="attendance.php">
    <button type="button" name="save">Save Marks</button>
</a>
</form>
<a href="index.php">Back</a>
</div>
