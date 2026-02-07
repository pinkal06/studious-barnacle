<?php
$conn = new mysqli("localhost","root","","attendance_db");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    $roll = $_POST['roll'];
    $status = $_POST['status'];

    $result = $conn->query("SELECT attendance FROM students WHERE roll_no='$roll'");
    $row = $result->fetch_assoc();

    if($row){
        $current = $row['attendance'];

        if($status == "Present"){
            $current += 1;
        }

        $conn->query("UPDATE students SET attendance='$current' WHERE roll_no='$roll'");
        echo "<script>alert('Attendance Updated Successfully');</script>";
    } else {
        echo "<script>alert('Student Not Found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Attendance Management</title>

<style>
body,html{
    margin:0;
    padding:0;
    font-family: 'Segoe UI', sans-serif;
    height:100%;
    overflow:hidden;
}

/* Background Video */
video{
    position:fixed;
    right:0;
    bottom:0;
    min-width:100%;
    min-height:100%;
    object-fit:cover;
    z-index:-1;
}

/* Glass Card */
.container{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:380px;
    padding:35px;
    background:rgba(255,255,255,0.1);
    backdrop-filter:blur(15px);
    border-radius:25px;
    box-shadow:0 0 30px rgba(0,0,0,0.6);
    text-align:center;
    color:white;
    animation:fadeIn 1.5s ease-in-out;
}

h2{
    margin-bottom:20px;
    letter-spacing:2px;
}

input, select{
    width:100%;
    padding:12px;
    margin:12px 0;
    border:none;
    border-radius:25px;
    background:rgba(255,255,255,0.2);
    color:white;
    text-align:center;
    font-size:15px;
}

select option{
    color:black;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:25px;
    background:linear-gradient(45deg,#00c6ff,#0072ff);
    color:white;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:0.4s;
}

button:hover{
    transform:scale(1.05);
    box-shadow:0 0 15px #00c6ff;
}

a{
    color:white;
    text-decoration:none;
    display:inline-block;
    margin-top:15px;
}

@keyframes fadeIn{
    from{opacity:0; transform:translate(-50%,-60%);}
    to{opacity:1; transform:translate(-50%,-50%);}
}
</style>

</head>
<body>

<!-- Background Video -->
<video autoplay muted loop>
    <source src="5091624-hd_1920_1080_24fps.mp4" type="video/mp4">
</video>

<div class="container">
<h2>ATTENDANCE MANAGEMENT</h2>

<form method="post">
<input type="number" name="roll" placeholder="Enter Roll No" required>

<select name="status">
    <option value="Present">Present</option>
    <option value="Absent">Absent</option>
</select>
<a href="index.php">
    <button type="button" name="submit">Mark Attendance</button>
</a>

</form>

<a href="attendance.php">⬅ Back to Dashboard</a>
</div>

</body>
</html>
