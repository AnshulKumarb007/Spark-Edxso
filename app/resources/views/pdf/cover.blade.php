<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>School Performance Report: Spark Olympiad</title>
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }

body {
    font-family: Arial, sans-serif;
    font-size: 11px;
    color: #1e293b;
    background: #fff;
}

/* ----------------------------------------------
   PAGE BREAK
---------------------------------------------- */
.page-break {
    display: block;
    page-break-before: always;
}

/* ----------------------------------------------
   COVER
---------------------------------------------- */
.cover {
    padding: 56px 14mm 40px 14mm;
    text-align: center;
}

/* Main Logo */
.cover-logo {
    width: 180px;
    margin: 0 auto 40px auto;
    display: block;
}

/* Banner Image */
.cover img[style*="width:80%"] {
    margin-bottom: 55px;
}

/* School Name */
.school-lbl {
    font-size: 22px;
    font-weight: bold;
    color: #333;
    margin-bottom: 25px;
}

/* Report Title */
.rpt-title {
    font-size: 18px;
    font-weight: bold;
    color: #111;
    font-family: Georgia, serif;
    margin-bottom: 40px;
}

/* By Section */
.by-wrap {
    width: 70%;
    margin: 25px auto;
    display: table;
}

.by-line,
.by-line2 {
    display: table-cell;
    vertical-align: middle;
    width: 30%;
}

.by-line hr,
.by-line2 hr {
    border: none;
    border-top: 1px solid #999;
}

.by-lbl {
    display: table-cell;
    vertical-align: middle;
    padding: 0 8px;
    font-size: 11px;
    color: #555;
    white-space: nowrap;
}

/* Logos */
.logos-wrap {
    width: 70%;
    margin: 75px auto 30px auto;
    display: table;
}

.logo-cell {
    display: table-cell;
    text-align: center;
    vertical-align: top;
    padding: 0 10px;
}

.logo-cell img {
    height: 40px;
    display: block;
    margin: 0 auto 10px auto;
}

.logo-cell p {
    font-size: 10px;
    color: #333;
    line-height: 1.5;
}

/* Footer */
.cover-foot {
    width: 100%;
    border-top: 1px solid #ccc;
    padding-top: 12px;
    margin-top: 130px;   /* 60px se 100px kar diya */
    font-size: 9px;
    color: #444;
    line-height: 1.6;
    text-align: center;
}
</style>
</head>
<body>
<div class="cover">
    <img src="file://{{ str_replace('\\', '/', public_path('1splogo.png')) }}" class="cover-logo" alt="Spark"/>
    <br/> <br/><br/>
    <img src="file://{{ str_replace('\\', '/', public_path('main1.png')) }}" style="width:80%" alt="Spark"/>
    <!-- <div style="margin-bottom: 0; line-height:1; text-align:center;">
        <span class="indias-first">India's First</span>
    </div>
  
    <div style="text-align:center; margin-bottom:18px;">
        <div class="box-section">
            <div class="olympiad-txt">Competency Based Online Olympiad</div>
        </div>
    </div> -->
 
    <div class="school-lbl">
        {{ $schoolSubjects->flatten()->pluck('school_name')->unique()->implode(',') }}
    </div>
    <br/><br/>
    <div class="rpt-title">Olympiad Report</div>
     <br/><br/><br/>
        <div class="by-wrap">
        <div class="by-line"><hr></div>
        <div class="by-lbl">By</div>
        <div class="by-line2"><hr></div>
    </div>
   
    <div class="logos-wrap">
        <div class="logo-cell">
            <img src="file://{{ str_replace('\\', '/', public_path('edxso-logo.png')) }}" alt="EDXSO"/>
            <p>India's Premier<br>Education Consultants</p>
        </div>
        <div class="logo-cell">
            <img src="file://{{ str_replace('\\', '/', public_path('prometric-logo.png')) }}" alt="Prometric"/>
            <p>Global Leaders in Secure<br>Large Scale Online Testing</p>
        </div>
    </div>
     
    <div class="cover-foot">
        <p>For More Information, Contact:<br>
        reachout@sparkolympiads.com &nbsp;|&nbsp; +91 84474 77275</p>
    </div>
</div>
</body>
</html>
