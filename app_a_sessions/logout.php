<?php
/**
 * Application A: PHP Web Application Using Sessions
 * File: logout.php (Session Logout & Duration Calculation)
 *
 * Description:
 * Calculates total session duration by subtracting the stored login time
 * from the current time. Displays a "Thank You" message with the user's
 * name and duration, then destroys the session completely.
 */

// Step 1: Start the session to access stored session variables
session_start();

// Check if user session variables exist
$hasSession = isset($_SESSION['user_name']) && isset($_SESSION['login_time']);

if ($hasSession) {
    // Step 2: Retrieve stored session values into local variables
    $userName = $_SESSION['user_name'];
    $loginTime = $_SESSION['login_time'];
    $loginFormatted = isset($_SESSION['login_time_formatted']) 
        ? $_SESSION['login_time_formatted'] 
        : date('h:i:s A, d M Y', $loginTime);

    // Step 3: Get current logout time
    $logoutTime = time();
    $logoutFormatted = date('h:i:s A, d M Y', $logoutTime);

    // Step 4: Calculate total duration in seconds
    $totalDurationSeconds = $logoutTime - $loginTime;

    // Format duration into hours, minutes, and seconds for friendly display
    $hours = floor($totalDurationSeconds / 3600);
    $minutes = floor(($totalDurationSeconds % 3600) / 60);
    $seconds = $totalDurationSeconds % 60;

    $durationText = "";
    if ($hours > 0) {
        $durationText .= $hours . " hour" . ($hours > 1 ? "s " : " ");
    }
    if ($minutes > 0 || $hours > 0) {
        $durationText .= $minutes . " minute" . ($minutes > 1 ? "s " : " ");
    }
    $durationText .= $seconds . " second" . ($seconds != 1 ? "s" : "");

    // Step 5: Destroy the session after retrieving required information
    // Unset all session variables
    session_unset();

    // Destroy session cookie if cookies are used
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Destroy the session storage on server
    session_destroy();
} else {
    // If accessed directly without an active session
    $userName = "Guest";
    $totalDurationSeconds = 0;
    $durationText = "0 seconds (No active session found)";
    $loginFormatted = "N/A";
    $logoutFormatted = date('h:i:s A, d M Y');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Session Terminated</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Navigation Breadcrumb -->
        <div class="breadcrumb">
            <a href="../index.php">&larr; Back to Practical Index</a>
        </div>

        <div class="card thank-you-card">
            <div class="success-icon">&#10004;</div>

            <!-- Required Thank You Message with Name -->
            <h1 class="thank-you-title">
                Thank You, <span class="highlight"><?php echo htmlspecialchars($userName); ?></span>!
            </h1>

            <p class="subtitle">
                Your session has been securely logged out and destroyed. Here is a summary of your visit:
            </p>

            <!-- Duration Summary Box -->
            <div class="duration-card">
                <div class="duration-label">Total Session Duration</div>
                <div class="duration-value"><?php echo htmlspecialchars($durationText); ?></div>
                <div class="duration-subtext">(Exact: <?php echo (int)$totalDurationSeconds; ?> second<?php echo $totalDurationSeconds == 1 ? '' : 's'; ?>)</div>
            </div>

            <!-- Detailed Session Breakdown -->
            <div class="info-box">
                <div class="info-row">
                    <span class="info-label">User Name:</span>
                    <span class="info-value"><?php echo htmlspecialchars($userName); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Session Login Time:</span>
                    <span class="info-value"><?php echo htmlspecialchars($loginFormatted); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Session Logout Time:</span>
                    <span class="info-value"><?php echo htmlspecialchars($logoutFormatted); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Current Session Status:</span>
                    <span class="info-value status-destroyed">&#9679; Destroyed (session_destroy called)</span>
                </div>
            </div>

            <!-- Action to Return to Login -->
            <div class="form-actions">
                <a href="index.php" class="btn btn-primary">
                    &#8635; Start a New Session
                </a>
            </div>
        </div>

        <footer class="footer">
            <p>PHP Sessions Practical Assignment &bull; Core PHP, HTML5 &amp; CSS3</p>
        </footer>
    </div>
</body>
</html>
