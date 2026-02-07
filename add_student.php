<?php
$conn = new mysqli("localhost","root","","attendance_db");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){

    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $semester = $_POST['semester'];

    $check = $conn->query("SELECT * FROM students WHERE roll_no='$roll'");

    if($check->num_rows > 0){
        echo "<script>alert('Roll Number Already Exists!');</script>";
    } else {

        $sql = "INSERT INTO students (roll_no, name, semester) 
                VALUES ('$roll', '$name', '$semester')";

        if($conn->query($sql)){
            echo "<script>
                    alert('Student Added Successfully!');
                    window.location='report.php';
                  </script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<style>

body,html{
    margin:0;
    padding:0;
    font-family: 'Segoe UI', sans-serif;
    height:100%;
    overflow:hidden;
}

/* Video Background */
video{
    position:fixed;
    right:0;
    bottom:0;
    min-width:100%;
    min-height:100%;
    z-index:-1;
    object-fit:cover;
}

/* Glass Form */
.form-container{
    width:350px;
    padding:30px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    background:rgba(255,255,255,0.1);
    backdrop-filter:blur(10px);
    border-radius:20px;
    box-shadow:0 0 25px rgba(0,0,0,0.5);
    text-align:center;
    color:white;
    animation:fadeIn 1.5s ease-in-out;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:25px;
    outline:none;
    background:rgba(255,255,255,0.2);
    color:white;
    font-size:15px;
    text-align:center;
}

input::placeholder{
    color:white;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:25px;
    background:linear-gradient(45deg,#ff512f,#dd2476);
    color:white;
    font-weight:bold;
    font-size:16px;
    cursor:pointer;
    transition:0.4s;
}

button:hover{
    transform:scale(1.05);
    box-shadow:0 0 15px #ff4b2b;
}

h2{
    margin-bottom:20px;
    letter-spacing:2px;
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

<div class="form-container">
<h2>ADD STUDENT</h2>

<form method="post">
<input type="number" name="roll" placeholder="Enter Roll No" required>
<input type="text" name="name" placeholder="Enter Name" required>
<input type="number" name="semester" placeholder="Enter Semester" required>
<button type="submit" name="submit">Add Student 
</button>
</form>
<br><br>
<a href="attendance.php">
    <button type="button">Go to Attendance Management / Next</button>
</a>

</div>

</body>
</html>
