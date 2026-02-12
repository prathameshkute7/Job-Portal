
<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center mb-4" style="color: #00695c;">Find Jobs in India</h2>

    <div class="row">
        <!-- Left Side Filters -->
<div class="col-lg-3">
    <div class="filter-box filter-scroll sticky-top" style="top: 20px;">
        <h5 class="mb-4"><strong>Filters</strong></h5>

        <!-- Date Posted -->
        <div class="mb-4">
            <h6>Date Posted</h6>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="date" id="all" checked>
                <label class="form-check-label" for="all">All Time</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="date" id="24hr">
                <label class="form-check-label" for="24hr">Last 24 hours</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="date" id="3days">
                <label class="form-check-label" for="3days">Last 3 days</label>
            </div>
        </div>

        <hr>

        <!-- Job Type -->
        <div class="mb-4">
            <h6>Job Type</h6>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="fulltime">
                <label class="form-check-label" for="fulltime">Full Time</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="parttime">
                <label class="form-check-label" for="parttime">Part Time</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="wfh">
                <label class="form-check-label" for="wfh">Work from Home</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="intern">
                <label class="form-check-label" for="intern">Internship</label>
            </div>
        </div>

        <hr>

        <!-- Experience Level -->
        <div class="mb-4">
            <h6>Experience Level</h6>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="fresher">
                <label class="form-check-label" for="fresher">Fresher</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="0-1">
                <label class="form-check-label" for="0-1">0-1 Year</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="1-3">
                <label class="form-check-label" for="1-3">1-3 Years</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="3+">
                <label class="form-check-label" for="3+">3+ Years</label>
            </div>
        </div>

        <hr>

        <!-- Salary Range Slider -->
        <div class="mb-4">
            <h6>Salary Range</h6>
            <input type="range" class="form-range" min="0" max="200000" value="100000" id="salaryRange">
            <div class="d-flex justify-content-between text-muted small">
                <span>₹0</span>
                <span id="salaryValue">₹1 Lakh+</span>
            </div>
        </div>

        <hr>

        <!-- Location Search -->
        <div class="mb-3">
            <h6>Location</h6>
            <input type="text" class="form-control" placeholder="e.g. Mumbai, Delhi" id="locationFilter">
        </div>

        <button class="btn btn-success w-100 py-3 fw-bold">Apply Filters</button>
        <a href="index.php" class="btn btn-outline-secondary w-100 mt-2">Clear All</a>
    </div>
</div>

        <!-- Job Listings -->
        <div class="col-lg-9">
            <?php
$sql = "SELECT * FROM jobs ORDER BY posted_date DESC";
$result = mysqli_query($conn, $sql);
while($job = mysqli_fetch_assoc($result)):
?>
<div class="job-card">
    <div class="d-flex justify-content-between align-items-start">
        <div class="d-flex">
            <div class="company-logo me-4 rounded shadow-sm bg-white d-flex align-items-center justify-content-center overflow-hidden" style="width:70px; height:70px; border:2px solid #e0e0e0;">
    <?php if(!empty($job['company_logo'])): ?>
        <img src="<?php echo htmlspecialchars($job['company_logo']); ?>" alt="<?php echo htmlspecialchars($job['company']); ?> Logo" style="max-width:95%; max-height:95%; object-fit:contain;">
    <?php else: ?>
        <span class="fs-3 fw-bold text-primary"><?php echo strtoupper(substr($job['company'], 0, 2)); ?></span>
    <?php endif; ?>
</div>
            <div>
                <h5 class="job-title"><?php echo $job['title']; ?></h5>
                <p class="company-name"><?php echo $job['company']; ?></p>
                <p class="location">
                    Location Icon <?php echo $job['location']; ?>
                </p>
                <div class="salary">
                    ₹<?php echo number_format($job['salary_min']); ?> - ₹<?php echo number_format($job['salary_max']); ?> monthly
                </div>
                <div class="mt-2">
                    <span class="tag">Field Job</span>
                    <span class="tag"><?php echo ucfirst($job['job_type']); ?></span>
                    <span class="tag">Fresher</span>
                    <span class="tag">No English Required</span>
                </div>
                <?php
// Real posted time calculate kar rahe hain (bilkul alag alag dikhega)
$posted_timestamp = strtotime($job['posted_date']);  // database ki date le rahe hain
$now = time();
$diff = $now - $posted_timestamp;

if ($diff < 60) {
    $time_text = "Just now";
} elseif ($diff < 3600) {
    $minutes = floor($diff / 60);
    $time_text = $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
} elseif ($diff < 86400) {
    $hours = floor($diff / 3600);
    $time_text = $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
} elseif ($diff < 604800) {
    $days = floor($diff / 86400);
    $time_text = $days . " day" . ($days > 1 ? "s" : "") . " ago";
} else {
    $time_text = date("d M Y", $posted_timestamp);
}
?>

<small class="text-muted posted-time">
    <i class="fas fa-clock text-success me-1"></i> <?php echo $time_text; ?>
</small>
            </div>
        </div>
        <a href="apply.php?id=<?php echo $job['id']; ?>" class="btn btn-success rounded-pill px-4 py-2 fw-bold">
    Apply Now
</a>
    </div>
</div>
<?php endwhile; ?>

            <!-- Dummy jobs agar database khali ho -->
            <?php if(mysqli_num_rows($result) == 0): ?>
            <div class="job-card">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="company-logo me-3">BL</div>
                        <div>
                            <h5>Delivery Boy</h5>
                            <p class="text-muted">Blinkit Private Limited</p>
                            <p><i class="fas fa-map-marker-alt"></i> Aurangabad</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-success">Apply Now</a>
                </div>
                <div class="mt-3"><span class="salary">₹35,000 - ₹78,000 monthly</span></div>
                <div class="mt-3">
                    <span class="tag">Part Time</span>
                    <span class="tag">Field Job</span>
                    <span class="tag">No English Required</span>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
document.getElementById('salaryRange').addEventListener('input', function() {
    let value = this.value;
    if(value >= 100000) {
        document.getElementById('salaryValue').innerHTML = "₹" + (value/100000).toFixed(1) + " Lakh+";
    } else {
        document.getElementById('salaryValue').innerHTML = "₹" + value;
    }
});
</script>
<?php include 'includes/footer.php'; ?>