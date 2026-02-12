<?php include 'includes/header.php'; 
if(!isset($_SESSION['user_id'])) header('Location: login.php');
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-4">
                <h3 class="text-center text-success mb-4">My Profile</h3>
                <div class="text-center mb-4">
                    <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Profile">
                    <h4 class="mt-3"><?= $_SESSION['username'] ?></h4>
                    <p class="text-muted"><?= ucfirst($_SESSION['role']) ?></p>
                </div>
                <hr>
                <h5>Update Resume (Coming Soon)</h5>
                <input type="file" class="form-control mb-3">
                <button class="btn btn-success w-100">Upload Resume</button>
                <div class="text-center mt-4">
                    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>