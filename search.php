<?php
include 'function.php';
$leech = 'http://ohdep.net';
$page = htmlentities($_GET['page']);
$paging = $page;
if($paging==''){
$paging = 1;
}
if($paging>=2){
$trang = " | Trang $paging";}
$urll = strip_tags($_GET['url']);
$urll = str_replace('%20', '+', $urll);
$urll = str_replace(' ', '+', $urll);
$ua = 'Nokia6300/2.0 (04.20) Profile/MIDP-2.0 Configuration/CLDC-1.1 UNTRUSTED/1.0';
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_URL, $leech.'/search?query='.$urll.'&page='.$paging);
$tieude = curl_exec($ch);
$getpage = catchuoi($tieude,'<ul class="pagination"','</ul>');
$getpage = strip_tags($getpage,'<a>');
$getpage = preg_replace('#'.$leech.'/search(.*?)query#is', $home.'/search?url', $getpage);
$getpage = '<style>
#wp_page{margin:5px;}
#wp_page a{padding:5px 15px;text-decoration:none;background:#f5f5f5;border:rgba(0, 0, 0, 0.1) solid 1px;color:#595959;}
#wp_page a:hover{border:#9E9E9E solid 1px;}
#wp_page .current{padding:5px 15px;background:#f5f5f5;border:rgba(0, 0, 0, 0.1) solid 1px;color:#595959;}
</style>
<div id="wp_page">'.$getpage.'</div>';
$tieude = $urll.' | Tìm Kiếm';
$tieude = str_replace('+', ' ', $tieude);
$h2 = $urll;
$h2 = str_replace('+', ' ', $h2);
// Code By Nhoc96
if($page>=1){
$url = $leech.'/search?query='.$urll.'&page='.$page;
}else{
$url = $leech.'/search?query='.$urll;
}
$get_thumb = '<li> <div class="boxarrow wow" style="visibility: hidden;"> <div class="contbx"> <a href="$1"> <figure><img width="180" height="80" src="'.$leech.'/$5"></figure> <div class="textcont"> <h2>$8</h2></a>$9<br/>xem ảnh đẹp, ảnh thiên nhiên, ảnh girl xinh<div class="discript"><p id="dummy_text" style="display:none"></p> </div> </div> <a class="link" href="$1">Xem thêm</a> </div> </div> <div class="date">$10</div> </li>';

curl_setopt($ch, CURLOPT_URL, $url);
$content = curl_exec($ch);
$content = catchuoi($content,'<div id="masonry_list">','<div id="loadmorepost"');
$content = mh_trim($content);
$content = strip_tags($content,'<a><img><span>');
$content = preg_replace('#<a href="(.*?)" title="(.*?)"><img alt="(.*?)" title="(.*?)" src="(.*?)" /></a><a href="(.*?)" title="(.*?)">(.*?)</a><span>(.*?)</span><span>(.*?)</span>#is', $get_thumb, $content);

$title = $tieude;
if($content==''){
$title = "Lỗi Tìm Kiếm";
include 'mainpage/head.php';
echo '<br><br><br>'.$title.' Ko hợp lệ';
include 'mainpage/end.php';
}else{
include 'mainpage/head.php';
echo '<section id="bxnews-slider"> <ul id="slidernews"> <li><a href="https://toppay.vn/hoi-dap/dich-vu?article_id=63#answer-63"><img src="http://toppay.vn/images/Banner_Huong-dan-nap-tien-vao-vi-toppay_1920x400_15-07_3.png"></a></li> <li><a href="https://toppay.vn/tin-tuc/21-tin-tuc/115-gioi-thieu-cac-chuc-nang-chinh-cua-toppay"><img src="http://toppay.vn/images/TopPay_Nap-so-gia-soc_1920x400.png"></a></li> </ul> </section> <h2 class="title">'.$h2.''.$trang.'</h2>
<section id="newpage"><div class="inner-page">
<ul class="listnews">';
$max_page = str_replace("p", '', $max_page[1]);
echo $content;
echo '</ul><div class="pagination"> <p class="counter">'.$getpage.'</p> </div></section>';
include 'mainpage/end.php';
}
curl_close($ch);
?>