<?php
session_start();

include("config.php");

$user_id = $_SESSION['user_id'];
$subjectProg_ID = 1;

echo $user_id;

$stmt = $con->prepare("
    SELECT t.topic_id, t.topic_name, p.completed 
    FROM topics t
    LEFT JOIN progress p ON t.topic_id = p.topic_id AND p.user_id = ?
    WHERE t.subjectProg_ID = ?
    ORDER BY t.display_order
");



$stmt->bind_param("ii", $user_id, $subjectProg_ID);
$stmt->execute();
$result = $stmt->get_result();

/* We first get all the topics with their IDs from the DB. and store
   them into "Topics" Which behaves as a hashmap Where Index 0 points to 
   Topic_id
   topic_name
   Completed
   All as one singualar row


<?php echo $topics[0]['topic_id']; ?>
This spaghetti line here simply means.
Go to the first index in array topics(That we retieved from DB)
and then get me topic id inside it.
its equivelant becomes 


<?php echo $topics[0]['topic_id']; ?> = <?php $topics[1]; ?>


*/
$topics = [];
while ($row = $result->fetch_assoc()) {
    $topics[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Programming Resources</title>
    <link rel="stylesheet" href="resources.css">
    <base target="_blank">
</head>
<body>

<div class="wrapper">
    <h1 class="heading">Introduction to Web Development</h1>

    <form method="POST" action="save_progress.php">

    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"> 
    <input type="hidden" name="subjectProg_ID" value="<?php echo $subjectProg_ID; ?>">


        <div class="card">
            <div class="card-title">HTML Introduction to Web Programming</div>
            <div class="topic">
                <input type="checkbox" name="topics[<?php echo $topics[0]['topic_id']; ?>]" value="1" <?php if($topics[0]['completed']) echo 'checked'; ?>>
                <span class="topic-name">HTML Introduction to Web Programming</span>
                <button type="button" class="view-btn" onclick="openPopup('HTML Introduction to Web Programming', 'html-intro')">View</button>
            </div>
        </div>

     
        <div class="card">
            <div class="card-title">HTML Part 1</div>
            <div class="topic">
                <input type="checkbox" name="topics[<?php echo $topics[1]['topic_id']; ?>]" value="1" <?php if($topics[1]['completed']) echo 'checked'; ?>>
                <span class="topic-name">HTML Part 1</span>
                <button type="button" class="view-btn" onclick="openPopup('HTML Part 1', 'html1')">View</button>
            </div>
        </div>

        <div class="card">
            <div class="card-title">HTML Part 2 and CSS</div>
            <div class="topic">
                <input type="checkbox" name="topics[<?php echo $topics[2]['topic_id']; ?>]" value="1" <?php if($topics[2]['completed']) echo 'checked'; ?>>
                <span class="topic-name">HTML Part 2 and CSS</span>
                <button type="button" class="view-btn" onclick="openPopup('HTML Part 2 and CSS', 'html2')">View</button>
            </div>
        </div>

        <div class="card">
            <div class="card-title">CSS Part 1</div>
            <div class="topic">
                <input type="checkbox" name="topics[<?php echo $topics[3]['topic_id']; ?>]" value="1" <?php if($topics[3]['completed']) echo 'checked'; ?>>
                <span class="topic-name">CSS Part 1</span>
                <button type="button" class="view-btn" onclick="openPopup('CSS Part 1', 'css1')">View</button>
            </div>
        </div>

        <div class="card">
            <div class="card-title">CSS Part 2</div>
            <div class="topic">
                <input type="checkbox" name="topics[<?php echo $topics[4]['topic_id']; ?>]" value="1" <?php if($topics[4]['completed']) echo 'checked'; ?>>
                <span class="topic-name">CSS Part 2</span>
                <button type="button" class="view-btn" onclick="openPopup('CSS Part 2', 'css2')">View</button>
            </div>
        </div>

        <div class="card">
            <div class="card-title">PHP Part 1</div>
            <div class="topic">
                <input type="checkbox" name="topics[<?php echo $topics[5]['topic_id']; ?>]" value="1" <?php if($topics[5]['completed']) echo 'checked'; ?>>
                <span class="topic-name">PHP Part 1</span>
                <button type="button" class="view-btn" onclick="openPopup('PHP Part 1', 'php1')">View</button>
            </div>
        </div>

        <div class="card">
            <div class="card-title">PHP Part 2</div>
            <div class="topic">
                <input type="checkbox" name="topics[<?php echo $topics[6]['topic_id']; ?>]" value="1" <?php if($topics[6]['completed']) echo 'checked'; ?>>
                <span class="topic-name">PHP Part 2</span>
                <button type="button" class="view-btn" onclick="openPopup('PHP Part 2', 'php2')">View</button>
            </div>
        </div>

        <div class="card">
            <div class="card-title">PHP Part 3</div>
            <div class="topic">
                <input type="checkbox" name="topics[<?php echo $topics[7]['topic_id']; ?>]" value="1" <?php if($topics[7]['completed']) echo 'checked'; ?>>
                <span class="topic-name">PHP Part 3</span>
                <button type="button" class="view-btn" onclick="openPopup('PHP Part 3', 'php3')">View</button>
            </div>
        </div>

        
        <div class="card">
            <div class="card-title">PHP Part 4</div>
            <div class="topic">
                <input type="checkbox" name="topics[<?php echo $topics[8]['topic_id']; ?>]" value="1" <?php if($topics[8]['completed']) echo 'checked'; ?>>
                <span class="topic-name">PHP Part 4</span>
                <button type="button" class="view-btn" onclick="openPopup('PHP Part 4', 'php4')">View</button>
            </div>
        </div>

       
        <div class="card">
            <div class="card-title">JS Part 1</div>
            <div class="topic">
                <input type="checkbox" name="topics[<?php echo $topics[9]['topic_id']; ?>]" value="1" <?php if($topics[9]['completed']) echo 'checked'; ?>>
                <span class="topic-name">JS Part 1</span>
                <button type="button" class="view-btn" onclick="openPopup('JS Part 1', 'js1')">View</button>
            </div>
        </div>

        <div class="card">
            <div class="card-title">JS Part 2</div>
            <div class="topic">
                <input type="checkbox" name="topics[<?php echo $topics[10]['topic_id']; ?>]" value="1" <?php if($topics[10]['completed']) echo 'checked'; ?>>
                <span class="topic-name">JS Part 2</span>
                <button type="button" class="view-btn" onclick="openPopup('JS Part 2', 'js2')">View</button>
            </div>
        </div>

        <button type="submit" style="margin-top: 20px; padding: 10px 20px;">Save Progress</button>
    </form>
</div>

<div class="popup-overlay" id="popupOverlay">
    <div class="popup">
        <div class="popup-header">
            <span class="popup-title" id="popupTitle">Resources</span>
            <button class="popup-close" onclick="closePopup()">&times;</button>
        </div>
        <div class="popup-body">
            <ul class="resource-list" id="resourceList"></ul>
        </div>
    </div>
</div>

<script src="resources.js"></script>
</body>
</html>