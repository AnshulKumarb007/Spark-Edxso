<?php
// Server-side PHP to detect browser and platform from user agent

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

function getBrowser($userAgent) {
    $browsers = [
        'Edge' => 'Edge',
        'Edg' => 'Edge (Chromium)',
        'OPR' => 'Opera',
        'Opera' => 'Opera',
        'Chrome' => 'Chrome',
        'Safari' => 'Safari',
        'Firefox' => 'Firefox',
        'MSIE' => 'Internet Explorer',
        'Trident' => 'Internet Explorer',
    ];

    foreach ($browsers as $key => $name) {
        if (stripos($userAgent, $key) !== false) {
            return $name;
        }
    }
    return 'Unknown';
}

function getPlatform($userAgent) {
    if (preg_match('/linux/i', $userAgent)) {
        return 'Linux';
    } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
        return 'Mac';
    } elseif (preg_match('/windows|win32/i', $userAgent)) {
        return 'Windows';
    }
    return 'Unknown';
}

$browser = getBrowser($userAgent);
$platform = getPlatform($userAgent);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>System Info Detection</title>
<script>
// Client-side JavaScript to detect more details

function detectBrowserVersion() {
    const ua = navigator.userAgent;
    let browserName = 'Unknown';
    let fullVersion = 'Unknown';

    if (ua.indexOf("Edg/") > -1) {
        browserName = "Edge (Chromium)";
        fullVersion = ua.substring(ua.indexOf("Edg/") + 4).split(" ")[0];
    } else if (ua.indexOf("OPR/") > -1) {
        browserName = "Opera";
        fullVersion = ua.substring(ua.indexOf("OPR/") + 4).split(" ")[0];
    } else if (ua.indexOf("Chrome/") > -1) {
        browserName = "Chrome";
        fullVersion = ua.substring(ua.indexOf("Chrome/") + 7).split(" ")[0];
    } else if (ua.indexOf("Safari/") > -1 && ua.indexOf("Chrome") === -1 && ua.indexOf("OPR") === -1) {
        browserName = "Safari";
        const versionMatch = ua.match(/Version\/([\d\.]+)/);
        fullVersion = versionMatch ? versionMatch[1] : "Unknown";
    } else if (ua.indexOf("Firefox/") > -1) {
        browserName = "Firefox";
        fullVersion = ua.substring(ua.indexOf("Firefox/") + 8).split(" ")[0];
    } else if (ua.indexOf("MSIE ") > -1) {
        browserName = "Internet Explorer";
        fullVersion = ua.substring(ua.indexOf("MSIE ") + 5).split(";")[0];
    } else if (ua.indexOf("Trident/") > -1) {
        browserName = "Internet Explorer";
        const rvMatch = ua.match(/rv:([\d\.]+)/);
        fullVersion = rvMatch ? rvMatch[1] : "Unknown";
    }

    return { browserName, fullVersion };
}

function detectInfo() {
    const screenRes = window.screen.width + "x" + window.screen.height;
    const jsEnabled = true;
    const deviceMemory = navigator.deviceMemory || 'Not available';
    const platformJS = navigator.platform;

    const { browserName, fullVersion } = detectBrowserVersion();

    document.getElementById('screenRes').textContent = screenRes;
    document.getElementById('jsEnabled').textContent = jsEnabled ? "Yes" : "No";
    document.getElementById('deviceMemory').textContent = deviceMemory + " GB";
    document.getElementById('browserNameJS').textContent = browserName;
    document.getElementById('browserVersion').textContent = fullVersion;
    document.getElementById('platformJS').textContent = platformJS;
}

window.onload = detectInfo;
</script>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    ul { list-style: none; padding-left: 0; }
    li { margin: 6px 0; }
    strong { width: 180px; display: inline-block; }
</style>
</head>
<body>

<h2>System Information</h2>
<ul>
    <li><strong>Browser (from PHP):</strong> <?php echo htmlspecialchars($browser); ?></li>
    <li><strong>Platform (from PHP):</strong> <?php echo htmlspecialchars($platform); ?></li>
    <li><strong>Browser (from JS):</strong> <span id="browserNameJS">Detecting...</span></li>
    <li><strong>Browser Version (from JS):</strong> <span id="browserVersion">Detecting...</span></li>
    <li><strong>Screen Resolution:</strong> <span id="screenRes">Detecting...</span></li>
    <li><strong>JavaScript Enabled:</strong> <span id="jsEnabled">Detecting...</span></li>
    <li><strong>Device RAM (GB):</strong> <span id="deviceMemory">Detecting...</span></li>
    <li><strong>Platform (from JS):</strong> <span id="platformJS">Detecting...</span></li>
</ul>

</body>
</html>
