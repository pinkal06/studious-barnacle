<?php
include "db.php";

if(isset($_POST['save'])){

    $roll = $_POST['roll'];
    $sub1 = $_POST['subject1'];
    $sub2 = $_POST['subject2'];

    $average = ($sub1 + $sub2) / 2;

    if($average >= 75){
        $remark = "Good";
    } elseif($average >= 50){
        $remark = "Average";
    } else {
        $remark = "Needs Improvement";
    }

    $conn->query("UPDATE students 
                  SET subject1='$sub1',
                      subject2='$sub2',
                      average='$average',
                      remark='$remark'
                  WHERE roll_no='$roll'");

    echo "<script>
            alert('Marks Saved Successfully');
            window.location='report.php';
          </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Performance Management</title>

<style>
body,html{
    margin:0;
    padding:0;
    height:100%;
    font-family:'Segoe UI',sans-serif;
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

/* Glass Container */
.container{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:400px;
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

input{
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
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:0.4s;
}

button:hover{
    transform:scale(1.05);
    box-shadow:0 0 15px #ff4b2b;
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
<h2>PERFORMANCE MANAGEMENT</h2>

<form method="post">
<input type="number" name="roll" placeholder="Enter Roll No" required>
<input type="number" name="subject1" placeholder="Subject 1 Marks" required>
<input type="number" name="subject2" placeholder="Subject 2 Marks" required>
<a href="report.php"> <button type="button" name="save">Save Marks</button> </a>

</form>

<a href="index.php">⬅ Back to Dashboard</a>

</div>

</body>
</html>
