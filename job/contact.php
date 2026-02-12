<?php include 'includes/header.php'; ?>

<div class="container mt-5 mb-5">
    <div class="text-center mb-5">
        <h1 class="display-4 text-success fw-bold">Contact Us</h1>
        <p class="lead text-dark">We are here to help you. Get in touch with us!</p>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card h-100 shadow border-0">
                <div class="card-body">
                    <h4 class="card-title text-success mb-4">Our Office</h4>
                    <p><strong>Address:</strong><br>
                    HireHunt Headquarters<br>
                    Chhat.Sambhajinagar, Maharashtra<br>
                    India - 431001</p>

                    <p><strong>Phone:</strong><br>
                    +91 93568 20995 (Support)<br>
                    +91 87654 32109 (Employer)</p>

                    <p><strong>Email:</strong><br>
                    support@hirehunt.com<br>
                    employers@hirehunt.com</p>

                    <p><strong>Working Hours:</strong><br>
                    Monday - Saturday<br>
                    10:00 AM - 5:00 PM IST</p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card h-100 shadow border-0">
                <div class="card-body">
                    <h4 class="card-title text-success mb-4">Send us a Message</h4>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control form-control-lg" placeholder="your@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <select class="form-select form-select-lg">
                                <option>General Inquiry</option>
                                <option>Employer Support</option>
                                <option>Job Seeker Help</option>
                                <option>Technical Issue</option>
                                <option>Feedback</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control form-control-lg" rows="6" placeholder="Write your message here..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg w-100 fw-bold">Send Message</button>
                    </form>
                    <small class="text-muted d-block mt-3">We usually reply within 24 hours.</small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>