<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}
.header-wrapper {
    width: 100%;
    border-bottom: 1px solid #ccc;
    padding: 5px 10px;
}
.header-table {
    width: 100%;
    border-collapse: collapse;
}
.header-table td {
    border: none;
    vertical-align: middle;
}
.logo {
    width: 100px;
}
.page-number {
    text-align: center;
    font-size: 10px;
}
</style>
</head>
<body onload="substitutePageNumbers()">
<div class="header-wrapper">
    <table class="header-table">
        <tr>
            <td style="width:33%; text-align:left;">
                <img src="file://{{ str_replace('\\', '/', public_path('splogo.png')) }}" class="logo">
            </td>
            <td style="width:33%;"></td>
            <td style="width:34%; text-align:center; font-size:10px;">
                Page <span class="page"></span> of <span class="topage"></span>
            </td>
        </tr>
    </table>
</div>
<script>
function substitutePageNumbers() {
    var vars = {};
    var x = window.location.search.substring(1).split('&');
    for (var i in x) {
        var z = x[i].split('=', 2);
        vars[z[0]] = decodeURIComponent(z[1]);
    }

    var pageElements = document.getElementsByClassName('page');
    for (var i = 0; i < pageElements.length; ++i) {
        pageElements[i].textContent = vars.page -1;
    }
    var topageElements = document.getElementsByClassName('topage');
    for (var i = 0; i < topageElements.length; ++i) {
        topageElements[i].textContent = vars.topage -1;
    }
}
window.onload = substitutePageNumbers;
</script>
</body>
</html>