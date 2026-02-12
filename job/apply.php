<?php
include 'includes/db.php';

// Login check - agar nahi logged in to login page pe bhej do
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Role check - sirf seeker hi apply kar sakta hai
if($_SESSION['role'] != 'seeker') {
    echo "<script>alert('Only job seekers can apply!'); window.location='dashboard.php';</script>";
    exit();
}

// Job ID le rahe hain URL se
if(!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid job!'); window.location='index.php';</script>";
    exit();
}

$job_id = mysqli_real_escape_string($conn, $_GET['id']);
$seeker_id = $_SESSION['user_id'];

// Check kar rahe hain ki already apply to nahi kiya
$check = mysqli_query($conn, "SELECT * FROM applications WHERE job_id = '$job_id' AND seeker_id = '$seeker_id'");

if(mysqli_num_rows($check) > 0) {
    // Already applied
    echo "<script>
            alert('You have already applied for this job!');
            window.location='index.php';
          </script>";
} else {
    // New application insert kar rahe hain
    $insert = mysqli_query($conn, "INSERT INTO applications (job_id, seeker_id) VALUES ('$job_id', '$seeker_id')");
    
    if($insert) {
        echo "<script>
                alert('Applied Successfully! Good luck 🤞');
                window.location='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Something went wrong! Try again.');
                window.location='index.php';
              </script>";
    }
}
?>