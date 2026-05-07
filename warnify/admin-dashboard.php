<?php
session_start();
include("config.php");


if (!isset($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'admin') {
    header("Location: admin-login.html");
    exit();
}

// fetch ignored subject
$ignored = [];
$res = mysqli_query($con, "
    SELECT t.topic_name,
           SUM(p.completed) AS done,
           COUNT(p.user_id) - SUM(p.completed) AS ignored
    FROM topics t
    LEFT JOIN progress p ON t.topic_id = p.topic_id
    GROUP BY t.topic_id
    HAVING ignored > done
    ORDER BY ignored DESC
    LIMIT 10
");
while ($row = mysqli_fetch_assoc($res)) {
    $ignored[] = $row;
}

// fetch most used subjects
$focused = [];
$res = mysqli_query($con, "
    SELECT t.topic_name,
           SUM(p.completed) AS done,
           COUNT(p.user_id) - SUM(p.completed) AS ignored
    FROM topics t
    LEFT JOIN progress p ON t.topic_id = p.topic_id
    GROUP BY t.topic_id
    HAVING done > ignored
    ORDER BY done DESC
    LIMIT 10
");
while ($row = mysqli_fetch_assoc($res)) {
    $focused[] = $row;
}

// fetches all students
$students = [];
$res = mysqli_query($con, "
    SELECT u.fName,
           u.lName,
           u.email,
           COUNT(p.topic_id) AS total,
           IFNULL(SUM(p.completed), 0) AS done,
           ROUND(IFNULL(SUM(p.completed) / COUNT(p.topic_id), 0) * 100, 0) AS pct
    FROM user u
    LEFT JOIN progress p ON u.id = p.user_id
       WHERE u.role = 'student'
       OR u.role IS NULL
       OR u.role = ''
    GROUP BY u.id
    ORDER BY u.fName
");
while ($row = mysqli_fetch_assoc($res)) {
    $students[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin-dashboard.css">
</head>
<body>

    <header class="admin-header">
        <h1>Warnify Admin Dashboard</h1>
        <a href="logout.php" class="logout-btn">Log out</a>
    </header>

    <main class="container">

        <div class="grid-2">

            
            <section class="card">
                <div class="card-header">
                    <h2>Ignored Topics</h2>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Topic</th>
                                <th>Incomplete</th>
                                <th>Completed</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($ignored)): ?>
                                <tr>
                                    <td colspan="3" class="empty-state">No ignored topics.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($ignored as $t): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($t['topic_name']) ?></td>
                                        <td><?= $t['ignored'] ?></td>
                                        <td><?= $t['done'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>


            <section class="card">
                <div class="card-header">
                    <h2>Most Focused Topics</h2>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Topic</th>
                                <th>Completed</th>
                                <th>Incomplete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($focused)): ?>
                                <tr>
                                    <td colspan="3" class="empty-state">No focused topics.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($focused as $t): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($t['topic_name']) ?></td>
                                        <td><?= $t['done'] ?></td>
                                        <td><?= $t['ignored'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

        </div>

       
        <section class="card">
            <div class="card-header">
                <h2>Student Progress</h2>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Email</th>
                            <th>Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($students)): ?>
                            <tr>
                                <td colspan="3" class="empty-state">No students found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($students as $s): ?>
                                <tr>
                                    <td><?= htmlspecialchars($s['fName'] . ' ' . $s['lName']) ?></td>
                                    <td><?= htmlspecialchars($s['email']) ?></td>
                                    <td>
                                        <div class="progress-bg">
                                            <div class="progress-fill" style="width: <?= $s['pct'] ?>%"></div>
                                        </div>
                                        <div class="progress-text">
                                            <?= $s['pct'] ?>% (<?= $s['done'] ?>/<?= $s['total'] ?>)
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main>

</body>
</html>