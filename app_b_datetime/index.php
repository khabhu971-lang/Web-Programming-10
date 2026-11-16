<?php
/**
 * Application B: PHP Program to Display Current Date, Time, and Day
 * File: index.php
 *
 * Description:
 * Demonstrates the use of PHP built-in date/time functions:
 * 1. date_default_timezone_set() to set the timezone.
 * 2. date('d-m-Y') for current date in DD-MM-YYYY format.
 * 3. date('h:i:s A') / date('H:i:s') for current time in HH:MM:SS format.
 * 4. date('l') for current day of the week.
 */

// Step 5: Set appropriate timezone using date_default_timezone_set()
// Default timezone is set to 'Asia/Kolkata' (can be customized via GET parameter)
$availableTimezones = [
    'Asia/Kolkata'     => 'India (IST - Asia/Kolkata)',
    'UTC'              => 'Coordinated Universal Time (UTC)',
    'America/New_York' => 'New York (EST/EDT - America/New_York)',
    'Europe/London'    => 'London (GMT/BST - Europe/London)',
    'Asia/Tokyo'       => 'Tokyo (JST - Asia/Tokyo)',
    'Australia/Sydney' => 'Sydney (AEST/AEDT - Australia/Sydney)'
];

$selectedTimezone = isset($_GET['timezone']) && array_key_exists($_GET['timezone'], $availableTimezones)
    ? $_GET['timezone']
    : 'Asia/Kolkata';

// Set the active timezone
date_default_timezone_set($selectedTimezone);

// Step 2: Retrieve current date in DD-MM-YYYY format using date()
$currentDate = date('d-m-Y');

// Step 3: Retrieve current time in HH:MM:SS format (12-hour and 24-hour clocks)
$currentTime12 = date('h:i:s A'); // 12-hour clock with AM/PM (e.g. 08:45:20 PM)
$currentTime24 = date('H:i:s');   // 24-hour clock (e.g. 20:45:20)

// Step 4: Retrieve current day of the week using date('l')
$currentDay = date('l'); // Full textual representation (e.g., Monday, Tuesday)

// Additional helpful date details
$currentMonth = date('F'); // Full month name (e.g., November)
$currentYear  = date('Y'); // 4-digit year (e.g., 2026)
$timezoneName = date_default_timezone_get();
$timezoneOffset = date('P'); // Difference to GMT with colon (e.g., +05:30)
$timestampNow   = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application B - Current Date, Time &amp; Day</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Navigation Breadcrumb -->
        <div class="breadcrumb">
            <a href="../index.php">&larr; Back to Practical Index</a>
        </div>

        <!-- Page Header -->
        <header class="header">
            <h1 class="page-title">Current Date, Time &amp; Day</h1>
            <p class="page-subtitle">Practical Application B: PHP Built-in Date and Time Functions</p>
        </header>

        <!-- Timezone Selector Control Form -->
        <div class="timezone-bar">
            <form action="index.php" method="GET" class="timezone-form">
                <label for="timezone" class="tz-label">Select Timezone:</label>
                <select name="timezone" id="timezone" onchange="this.form.submit()" class="tz-select">
                    <?php foreach ($availableTimezones as $tzKey => $tzLabel): ?>
                        <option value="<?php echo htmlspecialchars($tzKey); ?>" <?php echo $selectedTimezone === $tzKey ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($tzLabel); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <noscript>
                    <button type="submit" class="btn-refresh">Update</button>
                </noscript>
            </form>
            <div class="tz-info">
                <span>Offset: <strong>GMT <?php echo htmlspecialchars($timezoneOffset); ?></strong></span>
            </div>
        </div>

        <!-- Three Primary Value Cards as requested -->
        <div class="cards-grid">
            <!-- 1. Current Date Card -->
            <div class="info-card date-card">
                <div class="card-icon">&#128197;</div>
                <div class="card-heading">Current Date</div>
                <div class="card-format-label">Format: DD-MM-YYYY</div>
                <div class="card-value"><?php echo htmlspecialchars($currentDate); ?></div>
                <div class="card-subtext"><?php echo htmlspecialchars(date('d F Y')); ?></div>
            </div>

            <!-- 2. Current Time Card -->
            <div class="info-card time-card">
                <div class="card-icon">&#9200;</div>
                <div class="card-heading">Current Time</div>
                <div class="card-format-label">Format: HH:MM:SS (12-hr &amp; 24-hr)</div>
                <div class="card-value"><?php echo htmlspecialchars($currentTime12); ?></div>
                <div class="card-subtext">24-Hour Format: <strong><?php echo htmlspecialchars($currentTime24); ?></strong></div>
            </div>

            <!-- 3. Current Day Card -->
            <div class="info-card day-card">
                <div class="card-icon">&#9728;</div>
                <div class="card-heading">Current Day</div>
                <div class="card-format-label">Day of the Week</div>
                <div class="card-value"><?php echo htmlspecialchars($currentDay); ?></div>
                <div class="card-subtext">Week #<?php echo htmlspecialchars(date('W')); ?> of <?php echo htmlspecialchars($currentYear); ?></div>
            </div>
        </div>

        <!-- Technical Explanation Table for College Practical Evaluation -->
        <div class="explanation-card">
            <h3>PHP Built-in Functions &amp; Format Specifiers Used</h3>
            <table class="spec-table">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Format Specifier</th>
                        <th>Function Call</th>
                        <th>Generated Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Timezone Set</strong></td>
                        <td><code>N/A</code></td>
                        <td><code>date_default_timezone_set('<?php echo htmlspecialchars($selectedTimezone); ?>')</code></td>
                        <td><span class="badge badge-success">Success</span></td>
                    </tr>
                    <tr>
                        <td><strong>Date (DD-MM-YYYY)</strong></td>
                        <td><code>d-m-Y</code></td>
                        <td><code>date('d-m-Y')</code></td>
                        <td><strong><?php echo htmlspecialchars($currentDate); ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong>Time (12-Hour)</strong></td>
                        <td><code>h:i:s A</code></td>
                        <td><code>date('h:i:s A')</code></td>
                        <td><strong><?php echo htmlspecialchars($currentTime12); ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong>Time (24-Hour)</strong></td>
                        <td><code>H:i:s</code></td>
                        <td><code>date('H:i:s')</code></td>
                        <td><strong><?php echo htmlspecialchars($currentTime24); ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong>Day of Week</strong></td>
                        <td><code>l</code> (lowercase L)</td>
                        <td><code>date('l')</code></td>
                        <td><strong><?php echo htmlspecialchars($currentDay); ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong>UNIX Epoch Timestamp</strong></td>
                        <td><code>N/A</code></td>
                        <td><code>time()</code></td>
                        <td><code><?php echo htmlspecialchars((string)$timestampNow); ?></code></td>
                    </tr>
                </tbody>
            </table>

            <div class="actions">
                <a href="index.php?timezone=<?php echo urlencode($selectedTimezone); ?>" class="btn-primary">
                    &#8635; Refresh Current Time
                </a>
            </div>
        </div>

        <footer class="footer">
            <p>PHP Date &amp; Time Practical Assignment &bull; Core PHP, HTML5 &amp; CSS3</p>
        </footer>
    </div>
</body>
</html>
