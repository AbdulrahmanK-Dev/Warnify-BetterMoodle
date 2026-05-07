<?php
session_start();
include("config.php");

$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    header("Location: login.html");
    exit();
}



$courseMap = [
    1 => 1, 
    2 => 2, 
    3 => 3, 
    4 => 4, 
    5 => 5, 
    6 => 6, 
];

$fallbacks = [65, 35, 75, 85, 35, 65];

$courseProgress = [];
foreach ($courseMap as $cardIndex => $subjID) {
    $stmt = $con->prepare("
        SELECT COUNT(*) as total, IFNULL(SUM(p.completed), 0) as done
        FROM topics t
        LEFT JOIN progress p ON t.topic_id = p.topic_id AND p.user_id = ?
        WHERE t.subjectProg_ID = ?
    ");
    $stmt->bind_param("ii", $user_id, $subjID);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    $total = (int) $row['total'];
    $done  = (int) $row['done'];

    if ($total > 0) {
        $pct = round(($done / $total) * 100);
    } else {
  
        $pct = $fallbacks[$cardIndex - 1];
    }

    $courseProgress[$cardIndex] = [
        'pct'   => $pct,
        'done'  => $done,
        'total' => $total
    ];
}

$name = $_SESSION['fName'] ?? "Guest";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="homepage.css">
    <base target="_blank">
</head>
<body>

    <div class="cal-widget">
        <div class="cal-widget-header">
            <button class="cal-widget-navbtn" id="calPrevBtn">&#8249;</button>
            <div class="cal-widget-monthyear" id="calMonthYear">Month Year</div>
            <button class="cal-widget-navbtn" id="calNextBtn">&#8250;</button>
        </div>
        <div class="cal-widget-weekdays">
            <div>Sun</div><div>Mon</div><div>Tue</div>
            <div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
        </div>
        <div class="cal-widget-days" id="calDaysContainer"></div>
        <div class="cal-widget-footer">
            Selected: <span class="cal-widget-selectedtext" id="calSelectedDisplay">None</span>
        </div>
    </div>

    <header style="padding: 20px; text-align: center;">
        <h1>Hello! <?= htmlspecialchars($name) ?></h1>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a href="adminDashboard.php" style="display:inline-block;margin-top:10px;background:#16a34a;color:#fff;padding:8px 16px;border-radius:8px;text-decoration:none;font-size:0.875rem;font-weight:500;">Admin Portal</a>
        <?php endif; ?>
    </header>

  
    <div class="kcrs-layout">
        <div class="kcrs-wrapper">
            <h2 class="kcrs-heading">Courses</h2>

          
            <div class="kcrs-card">
                <div class="kcrs-card-header">
                    <span class="kcrs-card-title">Introduction to Web Development</span>
                </div>
                <div class="kcrs-track-wrap">
                    <div class="kcrs-track-bg">
                        <div class="kcrs-track-fill" style="width: <?= $courseProgress[1]['pct'] ?>%"></div>
                    </div>
                    <span class="kcrs-track-label"><?= $courseProgress[1]['pct'] ?>%</span>
                </div>
                <a href="web.php">
                    <button class="kcrs-action-btn">See resources</button>
                </a>
            </div>

            <br>

        

            <div class="kcrs-card">
                <div class="kcrs-card-header">
                    <span class="kcrs-card-title">Computer Architecture</span>
                </div>
                <div class="kcrs-track-wrap">
                    <div class="kcrs-track-bg">
                        <div class="kcrs-track-fill" style="width: <?= $courseProgress[2]['pct'] ?>%"></div>
                    </div>
                    <span class="kcrs-track-label"><?= $courseProgress[2]['pct'] ?>%</span>
                </div>
                <button class="kcrs-action-btn" onclick="kcrsOpenResources()">See resources</button>
            </div>

            <br>

            <div class="kcrs-card">
                <div class="kcrs-card-header">
                    <span class="kcrs-card-title">Cybersecurity</span>
                </div>
                <div class="kcrs-track-wrap">
                    <div class="kcrs-track-bg">
                        <div class="kcrs-track-fill" style="width: <?= $courseProgress[3]['pct'] ?>%"></div>
                    </div>
                    <span class="kcrs-track-label"><?= $courseProgress[3]['pct'] ?>%</span>
                </div>
                <button class="kcrs-action-btn" onclick="kcrsOpenResources()">See resources</button>
            </div>

            <br>

            <div class="kcrs-card">
                <div class="kcrs-card-header">
                    <span class="kcrs-card-title">Data structure and algorithims</span>
                </div>
                <div class="kcrs-track-wrap">
                    <div class="kcrs-track-bg">
                        <div class="kcrs-track-fill" style="width: <?= $courseProgress[4]['pct'] ?>%"></div>
                    </div>
                    <span class="kcrs-track-label"><?= $courseProgress[4]['pct'] ?>%</span>
                </div>
                <button class="kcrs-action-btn" onclick="kcrsOpenResources()">See resources</button>
            </div>

            <br>

      
            <div class="kcrs-card">
                <div class="kcrs-card-header">
                    <span class="kcrs-card-title">Software Engineering</span>
                </div>
                <div class="kcrs-track-wrap">
                    <div class="kcrs-track-bg">
                        <div class="kcrs-track-fill" style="width: <?= $courseProgress[5]['pct'] ?>%"></div>
                    </div>
                    <span class="kcrs-track-label"><?= $courseProgress[5]['pct'] ?>%</span>
                </div>
                <button class="kcrs-action-btn" onclick="kcrsOpenResources()">See resources</button>
            </div>

            <br>

      

            <div class="kcrs-card">
                <div class="kcrs-card-header">
                    <span class="kcrs-card-title">Advanced Programming</span>
                </div>
                <div class="kcrs-track-wrap">
                    <div class="kcrs-track-bg">
                        <div class="kcrs-track-fill" style="width: <?= $courseProgress[6]['pct'] ?>%"></div>
                    </div>
                    <span class="kcrs-track-label"><?= $courseProgress[6]['pct'] ?>%</span>
                </div>
                <button class="kcrs-action-btn" onclick="kcrsOpenResources()">See resources</button>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>