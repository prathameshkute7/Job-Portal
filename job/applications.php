<?php 
include 'includes/header.php'; 
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'employer') {
    header('Location: index.php');
    exit();
}

$emp_id = $_SESSION['user_id'];
?>

<div class="container mt-5 mb-5">
    <h2 class="text-center text-danger mb-5 fw-bold">Job Applications Received</h2>

  <?php
$emp_id = $_SESSION['user_id'];

// WHERE clause ko completely hata diya (purane jobs ki applications bhi dikhegi)
$sql = "SELECT a.applied_date, 
               j.title, j.company, 
               u.username as seeker_name, u.email as seeker_email
        FROM applications a 
        JOIN jobs j ON a.job_id = j.id 
        JOIN users u ON a.seeker_id = u.id 
        ORDER BY a.applied_date DESC";

// Direct query chalao (prepared statement ki zarurat nahi ab)
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Error check ke liye
}
?>

    <?php if($result->num_rows > 0): ?>
        <div class="table-responsive shadow-lg rounded">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-success text-dark">
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Company</th>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Applied On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sr = 1;
                    while($app = $result->fetch_assoc()): 
                    ?>
                    <tr>
                        <td><?php echo $sr++; ?></td>
                        <td><strong><?php echo htmlspecialchars($app['title']); ?></strong></td>
                        <td><?php echo htmlspecialchars($app['company']); ?></td>
                        <td><?php echo htmlspecialchars($app['seeker_name']); ?></td>
                        <td><?php echo htmlspecialchars($app['seeker_email']); ?></td>
                        <td><?php echo date('d M Y - h:i A', strtotime($app['applied_date'])); ?></td>
                        <td>
                            <button class="btn btn-sm btn-primary">View Resume</button>
                            <button class="btn btn-sm btn-success">Shortlist</button>
                            <button class="btn btn-sm btn-warning">Message</button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <p class="fs-5 text-success fw-bold">Total: <?php echo $result->num_rows; ?> Applications Received</p>
        </div>

    <?php else: ?>
        <div class="text-center py-5">
            <div class="card border-0 shadow-sm mx-auto" style="max-width: 600px; background: #fff8e1;">
                <div class="card-body p-5">
                    <h3 class="text-warning mb-3">No applications yet!</h3>
                    <p class="text-muted mb-4 fs-5">Post some jobs and candidates will start applying soon.</p>
                    <a href="post-job.php" class="btn btn-primary btn-lg rounded-pill px-5 shadow">
                        <i class="fas fa-plus-circle"></i> Post a New Job
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>