<?php
/**
 * Application C: PHP Web Application Using Name and Age Validation
 * File: result.php (Validation & Result Processing)
 *
 * Description:
 * 1. Retrieves submitted name and age using $_POST superglobal.
 * 2. Validates that both fields are provided and age is a valid number.
 * 3. Uses if-else conditional logic to check if age < 18 or >= 18.
 * 4. Outputs messages safely using htmlspecialchars() to prevent XSS.
 */

// Initialize variables
$errors = [];
$name = "";
$age = "";
$isAuthorized = false;
$resultMessage = "";

// Ensure page is accessed via POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Step 3: Retrieve submitted name and age from $_POST
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $ageInput = isset($_POST['age']) ? trim($_POST['age']) : '';

    // Step 4: Validate inputs
    // 4a. Validate Name
    if ($name === '') {
        $errors[] = "Name field cannot be empty.";
    } elseif (strlen($name) < 2) {
        $errors[] = "Name must be at least 2 characters long.";
    }

    // 4b. Validate Age
    if ($ageInput === '') {
        $errors[] = "Age field cannot be empty.";
    } elseif (!is_numeric($ageInput) || (int)$ageInput != $ageInput) {
        $errors[] = "Age must be a valid whole number.";
    } else {
        $age = (int)$ageInput;
        if ($age < 1 || $age > 125) {
            $errors[] = "Please enter a realistic age between 1 and 125.";
        }
    }

    // If there are no validation errors, proceed to age-based validation
    if (empty($errors)) {
        // Step 7: Use PHP conditional statements (if-else) to validate age
        if ($age < 18) {
            // Step 5: Under 18 - Unauthorized
            $isAuthorized = false;
            // Notice: htmlspecialchars() is applied directly or during output
            $resultMessage = "Hello, " . htmlspecialchars($name) . ", you are not authorized to visit the site.";
        } else {
            // Step 6: 18 or above - Authorized
            $isAuthorized = true;
            $resultMessage = "Welcome to this site, " . htmlspecialchars($name) . "!";
        }
    }
} else {
    // If someone navigated directly to result.php without submitting the form
    $errors[] = "No form data submitted. Please submit the form first.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application C - Validation Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Navigation Breadcrumb -->
        <div class="breadcrumb">
            <a href="index.php">&larr; Back to Validation Form</a> | 
            <a href="../index.php">Practical Index</a>
        </div>

        <div class="card result-card">
            <?php if (!empty($errors)): ?>
                <!-- Validation Error Display -->
                <div class="status-icon icon-error">&#10006;</div>
                <h2 class="result-title text-error">Validation Failed</h2>
                <div class="alert alert-danger">
                    <ul class="error-list">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="form-actions">
                    <a href="index.php" class="btn btn-secondary">&larr; Go Back and Try Again</a>
                </div>

            <?php elseif ($isAuthorized): ?>
                <!-- Authorized View (Age >= 18) -->
                <div class="status-icon icon-success">&#10004;</div>
                <span class="badge badge-success">Access Granted</span>
                
                <!-- Required Welcome Message safely escaped with htmlspecialchars() -->
                <h1 class="result-message message-welcome">
                    <?php echo $resultMessage; ?>
                </h1>

                <p class="subtitle">
                    Your age meets the minimum requirement (18+) for full access.
                </p>

                <!-- Summary Details Table -->
                <div class="info-box">
                    <div class="info-row">
                        <span class="info-label">Submitted Name:</span>
                        <span class="info-value"><strong><?php echo htmlspecialchars($name); ?></strong></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Submitted Age:</span>
                        <span class="info-value"><?php echo htmlspecialchars((string)$age); ?> years old</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Access Status:</span>
                        <span class="info-value text-success">&#9679; Authorized (Age &ge; 18)</span>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="index.php" class="btn btn-primary">&#8635; Check Another User</a>
                </div>

            <?php else: ?>
                <!-- Unauthorized View (Age < 18) -->
                <div class="status-icon icon-denied">&#9888;</div>
                <span class="badge badge-danger">Access Denied</span>

                <!-- Required Unauthorized Message safely escaped with htmlspecialchars() -->
                <h1 class="result-message message-denied">
                    <?php echo $resultMessage; ?>
                </h1>

                <p class="subtitle">
                    Sorry, you must be at least 18 years old to access this website.
                </p>

                <!-- Summary Details Table -->
                <div class="info-box">
                    <div class="info-row">
                        <span class="info-label">Submitted Name:</span>
                        <span class="info-value"><strong><?php echo htmlspecialchars($name); ?></strong></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Submitted Age:</span>
                        <span class="info-value"><?php echo htmlspecialchars((string)$age); ?> years old</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Access Status:</span>
                        <span class="info-value text-danger">&#9679; Restricted (Age &lt; 18)</span>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="index.php" class="btn btn-secondary">&larr; Check Another User</a>
                </div>
            <?php endif; ?>
        </div>

        <footer class="footer">
            <p>PHP Form Validation Practical Assignment &bull; Core PHP, HTML5 &amp; CSS3</p>
        </footer>
    </div>
</body>
</html>
