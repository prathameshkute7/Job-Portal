<?php 
include 'includes/header.php'; 
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'employer') header('Location: login.php');

if(isset($_POST['post'])){
    $title = $_POST['title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $min = $_POST['min_salary'];
    $max = $_POST['max_salary'];
    $mode = $_POST['mode'];
    $type = $_POST['type'];
    $desc = $_POST['description'];
    $emp_id = $_SESSION['user_id'];

    mysqli_query($conn, "INSERT INTO jobs (employer_id,title,company,location,salary_min,salary_max,work_mode,job_type,description) 
              VALUES ('$emp_id','$title','$company','$location','$min','$max','$mode','$type','$desc')");
    
    echo "<div class='alert alert-success text-center'>Job Posted Successfully!</div>";
}
?>

<div class="container mt-4">
    <h3 class="text-center text-success mb-4">Post a New Job</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 shadow">
                <form method="POST">
                    <input type="text" name="title" class="form-control mb-3" placeholder="Job Title" required>
                    <input type="text" name="company" class="form-control mb-3" placeholder="Company Name" required>
                    <input type="text" name="location" class="form-control mb-3" placeholder="Location (e.g. Mumbai)" required>
                    
                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" name="min_salary" class="form-control" placeholder="Min Salary" required>
                        </div>
                        <div class="col">
                            <input type="number" name="max_salary" class="form-control" placeholder="Max Salary" required>
                        </div>
                    </div>

                    <select name="mode" class="form-select mb-3" required>
                        <option value="wfh">Work from Home</option>
                        <option value="wfo">Work from Office</option>
                        <option value="hybrid">Hybrid</option>
                    </select>

                    <select name="type" class="form-select mb-3" required>
                        <option value="fulltime">Full Time</option>
                        <option value="parttime">Part Time</option>
                        <option value="internship">Internship</option>
                    </select>

                    <textarea name="description" class="form-control mb-3" rows="5" placeholder="Job Description" required></textarea>
                    
                    <button type="submit" name="post" class="btn btn-success btn-lg w-100">Post Job</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>