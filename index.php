<!--
This software is released under the BSD-3-Clause License.
See LICENSE file.
(C) 2018- by ThunderRa1n, <podsn0w@gmail.com>
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta cahrset="UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>Ellpedia</title>
    <script type="text/javascript" src="include/scripts/check.js"></script>
    <link rel="stylesheet" media="screen and (min-width: 620px)"　type="text/css" href="./include/css/indexpage.css">
    <link rel="stylesheet" media="screen and (max-width: 619px)" type="text/css" href="./include/css/indexpage_sp.css"> 
    <link rel="apple-touch-icon" sizes="180x180" href="./include/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="./include/icons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="./include/icons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="./include/icons/manifest.json">
    <link rel="mask-icon" href="./include/icons/safari-pinned-tab.svg" color="#000046">
    <link rel="shortcut icon" href="./include/icons/favicon.ico">
    <meta name="msapplication-config" content="./include/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <script>window.onload=$(function(){$('input').val('').focus();})</script>
  </head>
  <body>
    <div id="main">
      <div id="maintitle">Ellpedia</div>
      <form id="sform" name="sform" action="search.php" method="get" onSubmit="return check()">
        <input type="text" id="swindow" name="q">
        <input type="hidden" name="type" value="web">
        <input type="hidden" name="page" value="1">
        <input type="submit" id="sbutton">
      </form>
    </div>
    <div id="footer">
	  <ul id="footerlist">
	    <li><a href="readme.html">Language</a></li>
	    <li><a href="readme.html">About</a></li>
	    <li><a href="readme.html">Blog</a></li>
	    <li><a href="readme.html">Privacy</a></li>
	    <li><a href="readme.html">Terms</a></li>
	  </ul>
    </div>
  </body>
</html>
