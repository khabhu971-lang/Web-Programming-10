<?php
/**
 * Application A: PHP Web Application Using Sessions
 * File: hello.php (Personalized Greeting Page)
 *
 * Description:
 * Checks for an active session. If active, displays a personalized
 * greeting with the user's name, shows the session start time at
 * the top-right corner of the page, and provides a Logout button.
 */

// Start session to access session variables
session_start();

// Security Check: If user is not logged in, redirect to login page
if (!isset($_SESSION['user_name']) || !isset($_SESSION['login_time'])) {
    header("Location: index.php");
    exit();
}

$userName = $_SESSION['user_name'];
$loginTimeFormatted = isset($_SESSION['login_time_formatted']) 
    ? $_SESSION['login_time_formatted'] 
    : date('h:i:s A, d M Y', $_SESSION['login_time']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, <?php echo htmlspecialchars($userName); ?>! - Application A</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Top-Right Session Start Time Banner -->
    <div class="top-nav">
        <div class="top-nav-container">
            <span class="nav-brand">Session Manager</span>
            <div class="session-badge">
                <span class="badge-icon">&#9200;</span>
                <span class="badge-label">Session Started:</span>
                <span class="badge-time"><?php echo htmlspecialchars($loginTimeFormatted); ?></span>
            </div>
        </div>
    </div>

    <div class="container main-content">
        <div class="card greeting-card">
            <div class="avatar-circle">
                <span><?php echo strtoupper(substr($userName, 0, 1)); ?></span>
            </div>

            <!-- Personalized Greeting -->
            <h1 class="greeting-title">
                Hello, <span class="highlight"><?php echo htmlspecialchars($userName); ?></span>!
            </h1>

            <p class="greeting-subtitle">
                Welcome to your session dashboard. Your session is currently active and your usage duration is being tracked.
            </p>

            <!-- Session Details Table / Info Box -->
            <div class="info-box">
                <div class="info-row">
                    <span class="info-label">Active User:</span>
                    <span class="info-value"><?php echo htmlspecialchars($userName); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Session ID:</span>
                    <span class="info-value"><code><?php echo htmlspecialchars(session_id()); ?></code></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Login Timestamp:</span>
                    <span class="info-value"><?php echo htmlspecialchars($loginTimeFormatted); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Session Status:</span>
                    <span class="info-value status-active">&#9679; Active</span>
                </div>
            </div>

            <!-- Action buttons including Logout -->
            <div class="action-buttons">
                <!-- Logout Button redirecting to logout.php -->
                <a href="logout.php" class="btn btn-danger">
                    &#128274; Logout &amp; View Duration
                </a>
                <a href="hello.php" class="btn btn-secondary">
                    &#8635; Refresh Page
                </a>
            </div>
        </div>

        <footer class="footer">
            <p>PHP Sessions Practical Assignment &bull; Core PHP, HTML5 &amp; CSS3</p>
        </footer>
    </div>
</body>
</html>
