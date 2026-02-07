<!DOCTYPE html>
<html>
<head>
<title>Smart Attendance System</title>

<style>
body,html{
    margin:0;
    padding:0;
    height:100%;
    font-family:'Poppins',sans-serif;
    overflow:hidden;
    color:white;
}

/* 🎥 Background Video */
video{
    position:fixed;
    right:0;
    bottom:0;
    min-width:100%;
    min-height:100%;
    object-fit:cover;
    z-index:-1;
}

/* 🌫 Glass Container */
.container{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    text-align:center;
    padding:50px;
    background:rgba(255,255,255,0.1);
    backdrop-filter:blur(15px);
    border-radius:25px;
    box-shadow:0 0 40px rgba(0,0,0,0.6);
    animation:fadeIn 1.5s ease-in-out;
}

h1{
    margin-bottom:40px;
    letter-spacing:2px;
}

/* 🚀 Modern Buttons */
.btn{
    display:block;
    width:250px;
    margin:15px auto;
    padding:15px;
    border-radius:40px;
    border:none;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    color:white;
    background:linear-gradient(45deg,#ff512f,#dd2476);
    transition:0.4s;
    position:relative;
    overflow:hidden;
}

/* Hover Animation */
.btn:hover{
    transform:scale(1.08);
    box-shadow:0 0 20px #ff4b2b;
}

/* Click Effect */
.btn:active{
    transform:scale(0.95);
}

/* Shine Animation */
.btn::after{
    content:"";
    position:absolute;
    top:0;
    left:-100%;
    width:100%;
    height:100%;
    background:linear-gradient(120deg,transparent,rgba(255,255,255,0.4),transparent);
    transition:0.6s;
}

.btn:hover::after{
    left:100%;
}

a{
    text-decoration:none;
}

/* Fade Animation */
@keyframes fadeIn{
    from{opacity:0; transform:translate(-50%,-40%);}
    to{opacity:1; transform:translate(-50%,-50%);}
}
</style>
</head>

<body>

<!-- 🎥 Background Video -->
<video autoplay muted loop>
    <source src="5091624-hd_1920_1080_24fps.mp4" type="video/mp4">
</video>

<div class="container">
<h1>SMART ATTENDANCE & PERFORMANCE TRACKER</h1>

<a href="add_student.php"><button class="btn">Student Management</button></a>
<a href="attendance.php"><button class="btn">Attendance Management</button></a>
<a href="performance.php"><button class="btn">Performance Management</button></a>
<a href="report.php"><button class="btn">View Report</button></a>

</div>

</body>
</html>
