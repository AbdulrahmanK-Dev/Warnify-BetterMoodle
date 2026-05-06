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


    

        <header>
     <?php
      
     session_start();

     $name = $_SESSION['fName'] ?? "Guest";

     echo    '<h1>Hello! '.$name.   '</h1> ';
     ?>
        
     dasd
    </header>



<div class="kcrs-layout">
    <div class="kcrs-wrapper">
        <h2 class="kcrs-heading">Coursesdss</h2>

        <div class="kcrs-card">
            <div class="kcrs-card-header">
                <span class="kcrs-card-title">Introduction to Web Development</span>
            </div>
            <div class="kcrs-track-wrap">
                <div class="kcrs-track-bg">
                    <div class="kcrs-track-fill" style="width: 65%"></div>
                </div>
                <span class="kcrs-track-label">65%</span>
            </div>
            <a href=resources\web.html>
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
                    <div class="kcrs-track-fill" style="width: 35%"></div>
                </div>
                <span class="kcrs-track-label">35%</span>
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
                    <div class="kcrs-track-fill" style="width: 75%"></div>
                </div>
                <span class="kcrs-track-label">75%</span>
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
                    <div class="kcrs-track-fill" style="width: 85%"></div>
                </div>
                <span class="kcrs-track-label">85%</span>
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
                    <div class="kcrs-track-fill" style="width: 35%"></div>
                </div>
                <span class="kcrs-track-label">35%</span>
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
                    <div class="kcrs-track-fill" style="width: 65%"></div>
                </div>
                <span class="kcrs-track-label">65%</span>
            </div>
            <button class="kcrs-action-btn" onclick="kcrsOpenResources()">See resources</button>
        </div>
    </div>
</div>


<script src="script.js"></script>
</body>
</html>