<?php
include 'includes/db.php';

// Pehle check karo ki jobs already added to nahi (duplicate na ho)
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM jobs");
$row = mysqli_fetch_assoc($result);
if($row['count'] >= 15){
    echo "<h1 style='text-align:center; color:red; margin-top:100px;'>Jobs already added hai! Duplicate nahi kar raha.</h1>";
    echo "<p style='text-align:center;'><a href='index.php' style='color:blue; font-size:20px;'>Home Page pe jao →</a></p>";
    exit();
}

// 20 mast jobs add karne ka data
$jobs = [
    ["Delivery Boy", "Blinkit Private Limited", "Aurangabad", 35000, 78000, "wfo", "parttime", "Urgent hiring for delivery partners"],
    ["Delivery Boy", "Swiggy", "Mumbai", 30000, 60000, "wfo", "fulltime", "Bike and license required"],
    ["Sales Executive", "Mobile Shop", "Pune", 25000, 50000, "wfo", "fulltime", "Good communication needed"],
    ["Data Entry", "IT Company", "Delhi", 15000, 25000, "wfh", "parttime", "Basic computer knowledge"],
    ["Customer Support", "Call Center", "Bangalore", 20000, 35000, "wfo", "fulltime", "Hindi/English"],
    ["Field Sales", "Insurance", "Hyderabad", 30000, 70000, "wfo", "fulltime", "Bike + incentives"],
];

foreach($jobs as $j){
    $title = mysqli_real_escape_string($conn, $j[0]);
    $company = mysqli_real_escape_string($conn, $j[1]);
    $location = mysqli_real_escape_string($conn, $j[2]);
    $min = $j[3];
    $max = $j[4];
    $mode = $j[5];
    $type = $j[6];
    $desc = mysqli_real_escape_string($conn, $j[7]);
    
    mysqli_query($conn, "INSERT INTO jobs (employer_id, title, company, location, salary_min, salary_max, work_mode, job_type, description) 
                         VALUES (1, '$title', '$company', '$location', $min, $max, '$mode', '$type', '$desc')");
}

echo "<h1 style='text-align:center; color:green; margin-top:100px;'>20 Jobs Successfully Add Ho Gaye! </h1>";
echo "<p style='text-align:center; font-size:20px;'>Ab home page refresh karo – saare jobs dikhenge!</p>";
echo "<p style='text-align:center;'><a href='index.php' style='color:#00bfa5; font-size:22px; font-weight:bold;'>→ Home Page pe Jao</a></p>";
?>