<?php include 'includes/header.php'; 

if(isset($_POST['register'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // yeh line bilkul sahi hai
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    // Duplicate check
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' OR username='$username'");
    if(mysqli_num_rows($check) > 0){
        echo "<div class='alert alert-danger text-center'>Email or Username already exists!</div>";
    } else {
        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
        if(mysqli_query($conn, $sql)){
            echo "<div class='alert alert-success text-center'>Registration Successful! <a href='login.php' style='color:green;'>Login Now</a></div>";
        } else {
            echo "<div class='alert alert-danger'>Error: ".mysqli_error($conn)."</div>";
        }
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4 shadow">
                <h3 class="text-center" style="color:#00bfa5;">Create Account</h3>
                <form method="POST">
                    <input type="text" name="username" class="form-control mb-3" placeholder="Full Name" required>
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                    <div class="mb-3">
    <label class="form-label fw-bold">I am registering as:</label>
    <select name="role" class="form-select form-select-lg" required>
        <option value="" disabled selected>Choose your role</option>
        <option value="seeker">Job Seeker (Looking for a job)</option>
        <option value="employer">Employer (Want to post jobs & hire)</option>
    </select>
</div>
                    <button type="submit" name="register" class="btn text-white w-100" style="background:#00bfa5;">
    Create Account
</button>
                </form>
                <div class="text-center mt-3">
                    <small>Already have account? <a href="login.php" style="color:#00bfa5;">Login Here</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>