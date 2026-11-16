<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Practical Assignment - Web Applications Suite</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            color: #1e293b;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .hero {
            text-align: center;
            margin-bottom: 40px;
        }

        .hero h1 {
            font-size: 2.5rem;
            color: #0f172a;
            margin-bottom: 10px;
            font-weight: 800;
        }

        .hero p {
            color: #64748b;
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
        }

        .meta-bar {
            display: inline-flex;
            gap: 16px;
            margin-top: 15px;
            padding: 6px 16px;
            background: #ffffff;
            border-radius: 9999px;
            border: 1px solid #cbd5e1;
            font-size: 0.85rem;
            color: #475569;
        }

        .meta-bar strong {
            color: #0f172a;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .app-card {
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .app-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .card-top {
            padding: 24px 24px 16px 24px;
            border-bottom: 1px solid #f1f5f9;
        }

        .badge {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 4px 10px;
            border-radius: 6px;
            margin-bottom: 12px;
        }

        .badge-a { background: #dbeafe; color: #1e40af; }
        .badge-b { background: #dcfce7; color: #166534; }
        .badge-c { background: #ede9fe; color: #5b21b6; }

        .app-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .card-body {
            padding: 20px 24px;
            flex-grow: 1;
        }

        .app-desc {
            font-size: 0.925rem;
            color: #64748b;
            line-height: 1.5;
            margin-bottom: 16px;
        }

        .features-list {
            list-style: none;
            font-size: 0.85rem;
            color: #334155;
        }

        .features-list li {
            padding: 5px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .features-list li::before {
            content: "✓";
            color: #10b981;
            font-weight: bold;
        }

        .card-footer {
            padding: 16px 24px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }

        .btn {
            display: block;
            text-align: center;
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 0.95rem;
        }

        .btn-a { background: #2563eb; color: #ffffff; }
        .btn-a:hover { background: #1d4ed8; }

        .btn-b { background: #059669; color: #ffffff; }
        .btn-b:hover { background: #047857; }

        .btn-c { background: #6366f1; color: #ffffff; }
        .btn-c:hover { background: #4f46e5; }

        .guide-box {
            background: #ffffff;
            border-radius: 16px;
            padding: 28px;
            border: 1px solid #cbd5e1;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .guide-box h2 {
            font-size: 1.3rem;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .guide-box ol {
            margin-left: 20px;
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .guide-box code {
            background: #f1f5f9;
            color: #0f172a;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: Consolas, monospace;
        }

        .footer {
            text-align: center;
            color: #64748b;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Hero Header -->
        <header class="hero">
            <h1>PHP Practical Assignment Suite</h1>
            <p>A collection of three clean, core PHP web applications demonstrating sessions, built-in date/time functions, and form validation.</p>
            <div class="meta-bar">
                <span>Architecture: <strong>Core PHP (No Frameworks)</strong></span>
                <span>Styling: <strong>Modern CSS3</strong></span>
                <span>PHP Version: <strong><?php echo phpversion(); ?></strong></span>
            </div>
        </header>

        <!-- Applications Grid -->
        <div class="grid">
            <!-- Application A Card -->
            <div class="app-card">
                <div class="card-top">
                    <span class="badge badge-a">Application A</span>
                    <h2 class="app-title">Session Management</h2>
                </div>
                <div class="card-body">
                    <p class="app-desc">Demonstrates user session lifecycle, tracking session start time, personalized greeting, and usage duration calculation on logout.</p>
                    <ul class="features-list">
                        <li>Form asking for user's name via POST</li>
                        <li>Stores name &amp; login timestamp in <code>$_SESSION</code></li>
                        <li>Session start time shown at top-right corner</li>
                        <li>Calculates total duration upon logout</li>
                        <li>Destroys session using <code>session_destroy()</code></li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="app_a_sessions/index.php" class="btn btn-a">Launch Application A &rarr;</a>
                </div>
            </div>

            <!-- Application B Card -->
            <div class="app-card">
                <div class="card-top">
                    <span class="badge badge-b">Application B</span>
                    <h2 class="app-title">Date, Time &amp; Day</h2>
                </div>
                <div class="card-body">
                    <p class="app-desc">Demonstrates PHP's built-in date and time functions with timezone configuration and clean format specifiers.</p>
                    <ul class="features-list">
                        <li>Timezone configured with <code>date_default_timezone_set()</code></li>
                        <li>Current date in <strong>DD-MM-YYYY</strong> format</li>
                        <li>Current time in <strong>HH:MM:SS</strong> (12-hr &amp; 24-hr)</li>
                        <li>Current day of week (e.g. Monday)</li>
                        <li>Format specifiers reference table</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="app_b_datetime/index.php" class="btn btn-b">Launch Application B &rarr;</a>
                </div>
            </div>

            <!-- Application C Card -->
            <div class="app-card">
                <div class="card-top">
                    <span class="badge badge-c">Application C</span>
                    <h2 class="app-title">Name &amp; Age Validation</h2>
                </div>
                <div class="card-body">
                    <p class="app-desc">Demonstrates server-side form validation using POST method, conditional logic (if-else), and XSS prevention with <code>htmlspecialchars()</code>.</p>
                    <ul class="features-list">
                        <li>HTML form with Name &amp; Age input fields</li>
                        <li>Server-side validation using <code>$_POST</code></li>
                        <li>Age &lt; 18: "Unauthorized to visit" notice</li>
                        <li>Age &ge; 18: "Welcome to this site" greeting</li>
                        <li>Safely escaped using <code>htmlspecialchars()</code></li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="app_c_validation/index.php" class="btn btn-c">Launch Application C &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Local Execution Guide -->
        <div class="guide-box">
            <h2>Quick Local Testing Guide</h2>
            <ol>
                <li>Place the entire <code>web 10</code> folder inside your web server directory:
                    <ul>
                        <li><strong>XAMPP:</strong> <code>C:\xampp\htdocs\web 10</code></li>
                        <li><strong>WAMP:</strong> <code>C:\wamp64\www\web 10</code></li>
                    </ul>
                </li>
                <li>Start Apache in XAMPP or WAMP control panel.</li>
                <li>Open your web browser and visit: <code>http://localhost/web%2010/</code> or <code>http://localhost:8000</code> if using PHP CLI (<code>php -S localhost:8000</code>).</li>
            </ol>
        </div>

        <footer class="footer">
            <p>PHP College Practical Assignment &bull; Designed with Core PHP, HTML5, and CSS3</p>
        </footer>
    </div>
</body>
</html>
