<?php
/**
 * Application A: PHP Web Application Using Sessions
 * File: index.php (Login / Name Input Form)
 *
 * Description:
 * Displays an HTML form asking the user to enter their name.
 * On form submission (POST), validates the input, starts a session,
 * stores the name and login timestamp, and redirects to hello.php.
 */

// Start session to check if user is already logged in
session_start();

// If user already has an active session, redirect directly to hello.php
if (isset($_SESSION['user_name'])) {
    header("Location: hello.php");
    exit();
}

$error = "";

// Check if the form was submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and trim the user input
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';

    // Form input validation
    if (empty($name)) {
        $error = "Please enter your name before submitting.";
    } elseif (strlen($name) < 2) {
        $error = "Name must be at least 2 characters long.";
    } elseif (strlen($name) > 50) {
        $error = "Name must not exceed 50 characters.";
    } else {
        // Store user details in session variables
        $_SESSION['user_name'] = $name;
        $_SESSION['login_time'] = time(); // Store UNIX timestamp for duration calculation
        $_SESSION['login_time_formatted'] = date('h:i:s A, d M Y'); // Readable format for display

        // Redirect user to the personalized Hello page
        header("Location: hello.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application A - Session Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Navigation Breadcrumb -->
        <div class="breadcrumb">
            <a href="../index.php">&larr; Back to Practical Index</a>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>User Login Form</h2>
                <p class="subtitle">Practical Application A: PHP Sessions Demonstration</p>
            </div>

            <!-- Error message display if validation fails -->
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <strong>Error:</strong> <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <!-- Name Entry Form -->
            <form action="index.php" method="POST" class="form">
                <div class="form-group">
                    <label for="name">Enter Your Name <span class="required">*</span></label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        placeholder="e.g. John Doe" 
                        value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"
                        required 
                        autofocus
                    >
                    <small class="form-help">Enter your real name or nickname to start the session.</small>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Start Session &rarr;</button>
                </div>
            </form>
        </div>

        <footer class="footer">
            <p>PHP Sessions Practical Assignment &bull; Core PHP, HTML5 &amp; CSS3</p>
        </footer>
    </div>
</body>
</html>
