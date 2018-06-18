<?php
mb_language('Japanese');
ini_set('display_errors', 0);
if(!isset($_GET['page'])){
	$_GET['page'] = '1';
}
if(isset($_GET['q']) && $_GET['type'] == 'news' && is_numeric($_GET['page'])){
if(strstr($_GET['q'], '%E3%80%80')){
$_GET['q'] = str_replace('%E3%80%80', '+', $_GET['q']);
}
$_GET['q'] = htmlspecialchars($_GET['q']);
if(intval($_GET['page'])<1 || intval($_GET['page'])>30){
	$topresult = 'search.php?q=' . $_GET['q'] . '&type=' . $_GET['type'] . '&page=1';
	header('Location: '.$topresult);
}
$url = 'http://YOUR_SEARX_URL/?q=' . $_GET['q'] . '&categories=news&pageno=' . $_GET['page'] . '&language=en&engines=wikipedia,wikidata,google,duckduckgo&format=json';
$json =file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json, true);
$title = array();
$link = array();
$desc = array();
$i = 0;
while($i <= count($arr["results"])-1) {
$title[$i] = htmlspecialchars($arr["results"][$i]["title"]);
$link[$i] = htmlspecialchars($arr["results"][$i]["url"]);
$desc[$i] = htmlspecialchars($arr["results"][$i]["content"]);
$i++;
}
$i = 0;
while($i <= count($title)-1){
	echo '<div class="result"><div class="time">' . $time[$i] . '</div><div class="title"><a href="' . $link[$i] . '">' . $title[$i] . '</a></div>' . '<div class="decodeurl">' . $link[$i]. '</div><div class="desc">' . $desc[$i] . '</div></div><br>';
	$i++;
}
if(count($title) == 0){
	echo '<div class="result"><div class="erpix">No More Results</div></div>';
}
$backp = intval($_GET['page']) - 1;
$forwardp = intval($_GET['page']) + 1;
echo '</div><div id="bottom">';
if($_GET['page']!=='1'){
echo '<div id="backwrap"><a href="search.php?q=' . $_GET['q'] . '&type=news&page=' . $backp . '"><div id="back">&lt;&lt;Back</div></a></div>';
}
if(count($title)!==0){
echo '<div id="fwrap"><a href="search.php?q=' . $_GET['q'] . '&type=news&page=' . $forwardp . '"><div id="forward">Forward&gt;&gt;</div></a></div>';
}
}else{
header('Location: index.php');
}
?>
</div>