<?php 
include 'includes/header.php'; 
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-success">Namaste, <?= htmlspecialchars($_SESSION['username'] ?? 'User') ?>!</h2>
            <p class="text-muted fs-5">Role: <strong><?= ucfirst($_SESSION['role']) ?></strong></p>
        </div>
        <div class="col-md-4 text-end">
            <a href="profile.php" class="btn btn-outline-primary me-2">My Profile</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <hr>

    <!-- Employer ke liye buttons -->
    <?php if($_SESSION['role'] == 'employer'): ?>
        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="card text-center p-5 shadow-sm border-0" style="background: #e0f7fa;">
                    <h3 class="text-primary">Post New Job</h3>
                    <p>Recruit top talent quickly</p>
                    <a href="post-job.php" class="btn btn-success btn-lg">+ Post a Job</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center p-5 shadow-sm border-0" style="background: #fff3e0;">
                    <h3 class="text-warning">My Jobs</h3>
                    <p>View and manage posted jobs</p>
                    <a href="index.php" class="btn btn-warning btn-lg">View Jobs</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center p-5 shadow-sm border-0" style="background: #fce4ec;">
                    <h3 class="text-danger">Applications</h3>
                    <p>See who applied</p>
                    <a href="applications.php" class="btn btn-danger btn-lg">View Applications</a>
                </div>
            </div>
        </div>

    <?php else: // Job Seeker ?>
    <div class="container mt-5">
        <div class="row justify-content-center g-4">
            <!-- Browse Jobs Card -->
            <div class="col-md-5 col-11">
                <div class="card h-100 text-center shadow-lg border-0 rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #e3f2fd, #bbdefb);">
                    <div class="card-body p-5 d-flex flex-column justify-content-center">
                        <i class="fas fa-briefcase fa-4x text-primary mb-4"></i>
                        <h3 class="text-primary fw-bold mb-3">Browse Jobs</h3>
                        <p class="text-muted fs-5 mb-4">Explore thousands of opportunities waiting for you</p>
                        <a href="index.php" class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-bold shadow-sm mt-auto">
                            Find Jobs Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- My Profile Card -->
            <div class="col-md-5 col-11">
                <div class="card h-100 text-center shadow-lg border-0 rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #e0f7fa, #b2ebf2);">
                    <div class="card-body p-5 d-flex flex-column justify-content-center">
                        <i class="fas fa-user-edit fa-4x text-info mb-4"></i>
                        <h3 class="text-info fw-bold mb-3">My Profile</h3>
                        <p class="text-muted fs-5 mb-4">Update your resume & skills to get noticed</p>
                        <a href="profile.php" class="btn btn-info btn-lg rounded-pill px-5 py-3 fw-bold shadow-sm mt-auto">
                            Update Resume
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>