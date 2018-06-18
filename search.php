<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo htmlspecialchars($_GET['q']) ?> - Ellpedia</title>
    <script type="text/javascript" src="./include/scripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src=".include/scripts/check.js"></script>
    <script type="text/javascript" src="./include/scripts/button.js"></script>
    <script type="text/javascript" src="./include/scripts/footerFixed.js"></script>
    <link rel="stylesheet" media="screen and (min-width: 620px)"　type="text/css" href="./include/css/main.css">
    <link rel="stylesheet" media="screen and (max-width: 619px)" type="text/css" href="./include/css/main_sp.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./include/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="./include/icons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="./include/icons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="./include/icons/manifest.json">
    <link rel="mask-icon" href="./include/icons/safari-pinned-tab.svg" color="#000046">
    <link rel="shortcut icon" href="./include/icons/favicon.ico">
    <meta name="msapplication-config" content="./include/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
  </head>
  <body>
    <header>
      <form id="sform" name="sform" action="search.php" method="get" onSubmit="return check()">
        <input type="text" id="swindow" name="q" value="<?php echo htmlspecialchars(urldecode($_GET['q']), ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="page" value="1">
        <input type="hidden" name="type" value="<?php echo $_GET['type'] ?>">
        <input type="submit" id="sbutton" value="Ell">
      </form>
      <div id="overscrolls">
        <ul id="type">
          <?php
            $_GET['q'] = htmlspecialchars(urlencode($_GET['q']));
            echo '<li><a href="index.php">Ellpedia</a></li>';
            echo '<li><a href="search.php?q=' . $_GET['q'] . '&type=web&page=1">Web</a></li>';
            echo '<li><a href="search.php?q=' . $_GET['q'] . '&type=news&page=1">News</a></li>';
            echo '<li><a href="search.php?q=' . $_GET['q'] . '&type=image">Image</a></li>';
            echo '<li><a href="search.php?q=' . $_GET['q'] . '&type=video">Video</a></li>';
            echo '<li><a href="map.html" target="_blank">Map</a></li>';
          ?>
        </ul>
      </div>
    </header>
    <div id="resultsarea">
      <?php
        if(!isset($_GET['type'])){
	    $_GET['type'] = 'web';
        }
        if($_GET['type'] == 'web'){
          include './include/websearch.php';
        }else if($_GET['type'] == 'news'){
	      include './include/newssearch.php';
        }else if($_GET['type'] == 'image'){
	      ?>
          <div class="result">
            <div class="erpix">
              About Image Search
            </div>
            <div class="desc">
              Fllowing images are provided by <a href="https://pixabay.com/ja/">Pixabay</a> under CC0 license. You can use them without any restriction.
            </div>
          </div>
          <div id="imageresult"></div><div id="message"></div>
          <script type="text/javascript" src="./include/imagesearch.js"></script>	
          </div> <!--resultarea-->
          <div id="bottom">
            <div id="fwrap"><a href="https://pixabay.com/ja/photos/?q=<?php echo $_GET['q'] ?>" target="_blank"><div id="forward">Pixabay>></div></a></div>
          </div>
          <br>
          <div class="pixv"><iframe width="560" height="315" src="https://www.youtube.com/embed/G-5E-cqbajs?list=PLsxGHHZDolE_SP5VB5cv6OT9GnoyHP_hy" frameborder="0" allowfullscreen></iframe></div>
           <?php
        }else if($_GET['type']=='video'){
	      include './include/videosearch.php';
        }else{
	      header('Location: index.php');
        }
      ?>
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