<?php
include 'function.php';
$leech = 'http://ohdep.net';
$page = htmlentities($_GET['page']);
$urll = htmlentities($_GET['url']);
$ua = 'Nokia6300/2.0 (04.20) Profile/MIDP-2.0 Configuration/CLDC-1.1 UNTRUSTED/1.0';
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_URL, $leech);
$tieude = curl_exec($ch);
$tieude = explode('<title>', $tieude);
$tieude = explode('</title>', $tieude[1]);
$tieude = $tieude[0];

// Code By Nhoc96
if($page>=1){
$url = $leech.'/?page='.$page;
}else{
$url = $leech;
}
$get_thumb = '<li> <div class="boxarrow wow" style="visibility: hidden;"> <div class="contbx"> <a href="$1"> <figure><img width="180" height="80" src="'.$leech.'/$5"></figure> <div class="textcont"> <h2>$8</h2></a>$9<br/> xem ảnh đẹp, ảnh thiên nhiên, ảnh girl xinh<div class="discript"><p id="dummy_text" style="display:none"></p> </div> </div> <a class="link" href="$1">Xem thêm</a> </div> </div> <div class="date">$10</div> </li>';

//
curl_setopt($ch, CURLOPT_URL, "$leech");
$content = curl_exec($ch);
$content = catchuoi($content,'<div id="masonry_list">','<div id="loadmorepost"');
$content = mh_trim($content);
$content = preg_replace('#<div class="img_viewcount"><span>(.*?)</span></div>#is', '', $content);
$content = preg_replace('#<div class="img_createdate"><span>(.*?)</span></div>#is', '', $content);
$content = strip_tags($content,'<a><img>');
$content = preg_replace('#<a href="(.*?)" title="(.*?)"><img alt="(.*?)" title="(.*?)" src="(.*?)" /></a><a href="(.*?)" title="(.*?)">(.*?)</a>#is', $get_thumb, $content);
$max_page = $content;
$max_page = explode('<a href="', $max_page);
$max_page = explode('">', $max_page[1]);
$max_page = $max_page[0];
$max_page = explode('/', $max_page);

curl_setopt($ch, CURLOPT_URL, $url);
$content = curl_exec($ch);
$content = catchuoi($content,'<div id="masonry_list">','<div id="loadmorepost"');
$content = mh_trim($content);
$content = strip_tags($content,'<a><img><span>');
$content = preg_replace('#<a href="(.*?)" title="(.*?)"><img alt="(.*?)" title="(.*?)" src="(.*?)" /></a><a href="(.*?)" title="(.*?)">(.*?)</a><span>(.*?)</span><span>(.*?)</span>#is', $get_thumb, $content);


include 'mainpage/head.php';
echo '<section id="bxnews-slider"> <ul id="slidernews"> <li><h2>Cám ơn bạn đã quan tâm sử dụng dịch vụ của chúng tôi</h2></li> <li><h2>Chúc các bạn có những giây phút thư giãn vui vẻ bên gia đình</h2></li> </ul> </section> <h2 class="title"> Cập nhật ảnh gái xinh hàng ngày</h2>
<section id="newpage"><div class="inner-page">
<ul class="listnews">';
$max_page = str_replace("p", '', $max_page[1]);
echo $content;
echo '</ul><div class="pagination"> <p class="counter">';
mh_page($max_page,"15");
echo '</p></div></section>';
include 'mainpage/end.php';
curl_close($ch);
?>
