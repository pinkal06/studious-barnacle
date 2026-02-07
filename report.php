<?php
include "db.php";
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Reports</title>

<style>
body,html{
    margin:0;
    padding:0;
    height:100%;
    font-family:'Segoe UI',sans-serif;
    overflow-x:hidden;
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
.button-container{
    text-align:center;
    margin-top:20px;
}


/* Main Container */
.container{
    width:80%;
    margin:40px auto;
    padding:30px;
    background:rgba(255,255,255,0.1);
    backdrop-filter:blur(15px);
    border-radius:20px;
    box-shadow:0 0 30px rgba(0,0,0,0.6);
    color:white;
    animation:fadeIn 1.5s ease-in-out;
}

.student-card{
    background:rgba(255,255,255,0.08);
    padding:20px;
    margin:20px 0;
    border-radius:15px;
    transition:0.4s;
}

.student-card:hover{
    transform:scale(1.02);
    box-shadow:0 0 15px #00f2fe;
}

/* Progress Bar */
.progress{
    width:100%;
    background:#ddd;
    border-radius:20px;
    overflow:hidden;
    margin:10px 0;
}

.progress-bar{
    height:20px;
    text-align:center;
    color:black;
    font-weight:bold;
    line-height:20px;
    transition:1s;
}

.warning{
    color:#ff4b2b;
    font-weight:bold;
}

.good{ color:lightgreen; }
.avg{ color:yellow; }
.bad{ color:#ff4b2b; }

button{
    padding:10px 20px;
    border:none;
    border-radius:25px;
    background:linear-gradient(45deg,#00c6ff,#0072ff);
    color:white;
    cursor:pointer;
    margin-top:15px;
    transition:0.4s;
}
.button-container{
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:15px;
    margin-top:20px;
}

button:hover{
    transform:scale(1.05);
    box-shadow:0 0 10px #00c6ff;
}

a{
    text-decoration:none;
}

@keyframes fadeIn{
    from{opacity:0;}
    to{opacity:1;}
}

</style>

</head>
<body>

<!-- Background Video -->
<video autoplay muted loop>
    <source src="5091624-hd_1920_1080_24fps.mp4" type="video/mp4">
</video>

<div class="container">
<h2>📊 STUDENT REPORTS</h2>

<?php


if(isset($row['average'])){
    echo "<b>Average:</b> ".$row['average']."<br>";
} else {
    echo "<b>Average:</b> Not Calculated<br>";
}

echo "<b>Performance:</b> <span class='$class'>".($remark ?? "N/A")."</span><br>";

while($row = $result->fetch_assoc()){

    $att = $row['attendance'];
    $color = ($att >= 75) ? "lightgreen" : "#ff4b2b";

    $remark = $row['remark'];
    $class = ($remark=="Good")?"good":(($remark=="Average")?"avg":"bad");

    echo "<div class='student-card'>";
    echo "<b>Roll No:</b> ".$row['roll_no']."<br>";
    echo "<b>Name:</b> ".$row['name']."<br>";
    echo "<b>Semester:</b> ".$row['semester']."<br>";

    echo "<b>Attendance:</b> ".$att."%";
    echo "<div class='progress'>
            <div class='progress-bar' 
                 style='width:".$att."%; background:$color'>
                 ".$att."%
            </div>
          </div>";

    if($att < 75){
        echo "<div class='warning'>⚠ Attendance Shortage</div>";
    }

    echo "<b>Marks:</b> ".$row['marks']."<br>";
    echo "<b>Average:</b> ".$row['average']."<br>";
    echo "<b>Performance:</b> <span class='$class'>$remark</span><br>";
    echo "</div>";
}
?>

<div class="button-container">
    <a href="performance.php">
        <button>Update Marks</button>
    </a>

    <br><br>

    <a href="index.php">
        <button>Back to Dashboard</button>
    </a>
</div>

</div>

</body>
</html>
