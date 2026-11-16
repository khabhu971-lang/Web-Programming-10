<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application C - Name &amp; Age Verification</title>
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
                <h2>User Age Verification</h2>
                <p class="subtitle">Practical Application C: Name and Age Validation Using PHP POST &amp; if-else</p>
            </div>

            <!-- 
                Form with two input fields: Name and Age
                Sends data to result.php using the POST method
            -->
            <form action="result.php" method="POST" class="form">
                <!-- Name Input Field -->
                <div class="form-group">
                    <label for="name">Full Name <span class="required">*</span></label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        placeholder="e.g. Alice Smith" 
                        required 
                        autofocus
                    >
                    <small class="form-help">Enter your name as it should appear in the greeting.</small>
                </div>

                <!-- Age Input Field -->
                <div class="form-group">
                    <label for="age">Age (in years) <span class="required">*</span></label>
                    <input 
                        type="number" 
                        id="age" 
                        name="age" 
                        placeholder="e.g. 21" 
                        min="1" 
                        max="125" 
                        required
                    >
                    <small class="form-help">Must be a valid positive whole number.</small>
                </div>

                <!-- Submit Button -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        Validate &amp; Submit &rarr;
                    </button>
                </div>
            </form>
        </div>

        <footer class="footer">
            <p>PHP Form Validation Practical Assignment &bull; Core PHP, HTML5 &amp; CSS3</p>
        </footer>
    </div>
</body>
</html>
