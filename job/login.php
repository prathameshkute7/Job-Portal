
<?php include 'includes/header.php'; 

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<div class='alert alert-danger text-center'>Wrong Password!</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Email not registered!</div>";
    }
}
?>
<?php if(isset($_GET['msg']) && $_GET['msg'] == 'login_required'): ?>
    <div class="alert alert-info text-center mb-4 fw-bold fs-5">
        Please login first to view all jobs!
    </div>
<?php endif; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4 shadow border-0">
                <h3 class="text-center mb-4" style="color:#00bfa5;">Welcome Back</h3>
                
                <form method="POST">
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                    <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>
                    <button type="submit" name="login" class="btn text-white w-100 fw-bold" style="background:#00bfa5; height:50px;">
                        Login
                    </button>
                </form>
                <div class="text-center mt-3">
                    <small>New here? <a href="register.php" style="color:#00bfa5;">Create Account</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>