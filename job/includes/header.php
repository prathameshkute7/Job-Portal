<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HireHunt - Unlock Your Career Potential</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark shadow-lg" style="background: linear-gradient(135deg, #00bfa5, #00796b);">
    <div class="container">
        <a class="navbar-brand text-white d-flex align-items-center" href="index.php">
            <img src="images/logo.jpg" alt="HireHunt Logo" width="60" height="60" class="me-3" style="border-radius: 12px; background: white; padding: 6px; box-shadow: 0 4px 20px rgba(0,0,0,0.3); object-fit: contain;">
            <div>
                <span class="fw-bold fs-2">HireHunt</span><br>
                <small class="text-dark-50 fs-6 opacity-80 ">Unlock Your Career Potential.</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link text-white fw-bold fs-5 px-4" href="index.php">Home</a></li>
                <li class="nav-item">
    <a class="nav-link text-white fw-bold fs-5 px-4" 
       href="<?php echo isset($_SESSION['user_id']) ? 'index.php' : 'login.php?msg=login_required'; ?>">
        Jobs
    </a>
</li>               
                <li class="nav-item"><a class="nav-link text-white fw-bold fs-5 px-4" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link text-white fw-bold fs-5 px-4" href="contact.php">Contact Us</a></li>
            </ul>

            <div class="d-flex">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="dashboard.php" class="btn btn-light me-2">Dashboard</a>
                    <a href="logout.php" class="btn btn-outline-light">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-outline-light me-2">Employer Login</a>
                    <a href="login.php" class="btn btn-light">Candidate Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>