<?php
include 'function.php';
$leech = "http://wapvip.herokuapp.com";
$del = $leech;
$page = htmlentities($_GET['page']);
$urll = htmlentities($_GET['url']);
$id = htmlentities($_GET['id']);
$ua = 'Nokia6300/2.0 (04.20) Profile/MIDP-2.0 Configuration/CLDC-1.1 UNTRUSTED/1.0';
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_URL, $leech.'/'.$id.'/'.$urll);
$tieude = curl_exec($ch);
$config = $tieude;
preg_match('/<title>(.*?)<\/title>/',$tieude,$tieus);
$tieude = $tieus[1];
$tieude = str_replace(' | ohdep.net', '', $tieude);
$url = $leech.'/'.$id.'/'.$urll;
curl_setopt($ch, CURLOPT_URL, $url);
$time = curl_exec($ch);
$time = catchuoi($time,'<div class="post_time"><span>','</span></div>');
$time = preg_replace('#<a(.*?)<span>(.*?)</span>#is', '$2', $time);
//config meta
preg_match('/<meta property="og:description" content="(.*?)" \/>/',$config,$desr);
$des = $tieude.', '.$desr[1];
preg_match('/<meta property="og:image" content="(.*?)" \/>/',$config,$img);
if($img==''){
$img = "$home/images/noimage.png";
}else{
$img = $img[1];
}
$home = 'http://ohdep.tk';
$baseurl = "$home/$id/$urll";

// Code By Nhoc
$url = $leech.'/'.$id.'/'.$urll;
curl_setopt($ch, CURLOPT_URL, $url);
$content = curl_exec($ch);
$content = catchuoi($content,'<div class="post_pcontent">','<div style="width:100%');
$content = preg_replace('#<img(.*?)src="(.*?)"(.*?)>#is', '<p><img style="display: block; margin-left: auto; margin-right: auto;" alt="'.$tieude.'" data-original="$2" class="lazy" /></p>', $content);
curl_setopt($ch, CURLOPT_URL, $url);
$cm = curl_exec($ch);
$cm = catchuoi($cm,'<div id="masonry_list">','<div id="loadmorepost"');
$cm = mh_trim($cm);
$cm = strip_tags($cm,'<a><span><img>');
$get_thumb = '<li><a href="$1" class="linkimg"><img width="100" height="50" class="lazy" data-original="http://ohdep.net/$5" /></a><h3 style="text-align:left;"><a href="$1">$8</a></h3><span class="timepost" style="text-align:left;"><i class="fa fa-calendar"></i> $9 $10</span></li>';
$cm = preg_replace('#<a href="(.*?)" title="(.*?)"><img alt="(.*?)" title="(.*?)" src="(.*?)" /></a><a href="(.*?)" title="(.*?)">(.*?)</a><span>(.*?)</span><span>(.*?)</span>#is', $get_thumb, $cm);
$title = $tieude.' | Ảnh Đẹp';
if($content==''){
header('location:/');
}else{
include 'mainpage/head.php';
include 'style.php';
echo '<style>
.cont a {color:#DC3C23;}</style>
<section class="mainCont" id="newsdetail"> <div class="inner-page clearfix"> <div class="contnews">
<h1 class="title-act">'.$tieude.' </h1> <p class="date">'.$time.' By Minh Hải</p><script src="https://apis.google.com/js/platform.js" async defer> {lang: \'vi\'} </script> <div class="cont">'.$content.'</div></div> </div><div class="bxrelat"> <ul class="list_relatio"><h3 class="titlehome">Bài viết liên quan</h3>
<ul class="newslist relate">'.$cm.'</ul></ul></div></div>';
include 'mainpage/end.php';
}
curl_close($ch);
?>
