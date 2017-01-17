<?php
if($title==''){
$title = "kho ảnh gái xinh, hot girl cập nhật 24h";
}
if($des==''){
$des = "Người đẹp bikini, Tổng hợp các album girl xinh tươi, thỏa sức ngắm gái đẹp, ảnh bikini, ảnh girl xinh các loại, người mẫu..";
}
if($baseurl==''){
$baseurl = $home;
}
if($img==''){
$img = $home.'/images/noimage.png';
}
echo '<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn">
<head>
<base href="'.$baseurl.'" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="'.$des.'" />
<meta name="copyright" content="Copyright © 2016 KenhWap.tk. All Rights Reserved" />
<meta name="description" content="'.$des.'" />
<title>'.$title.'</title>
<link href="http://toppay.vn/templates/theme1691/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<link href="'.$home.'/search" rel="search" title="Tìm kiếm" type="application/opensearchdescription+xml" />
<script src="http://toppay.vn/media/jui/js/jquery.min.js" type="text/javascript"></script>
<script src="http://toppay.vn/media/jui/js/jquery-noconflict.js" type="text/javascript"></script>
<script src="http://toppay.vn/media/jui/js/jquery-migrate.min.js" type="text/javascript"></script>
<script src="http://toppay.vn/media/system/js/html5fallback.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="google-site-verification" content="'.$google.'" />
<!-- Facebook Open Graph Meta Tags -->
<meta property="og:title" content="'.$title.'"/>
<meta property="og:type" content="website"/>
<meta property="og:image" content="'.$img.'"/>
<meta property="og:url" content="'.$baseurl.'"/>
<meta property="og:description" content="'.$des.'"/>
<!-- End Facebook Open Graph Meta Tags -->
<link type="text/css" href="http://toppay.vn/images/custom.css" rel="stylesheet">
<link rel="stylesheet" href="http://toppay.vn/templates/theme1691/css/main.css"/>
<link rel="stylesheet" href="http://toppay.vn/templates/theme1691/css/font-awesome.css"/>
<link rel="stylesheet" href="http://toppay.vn/templates/theme1691/css/menu-mobile.css"/>
<link rel="stylesheet" href="http://toppay.vn/templates/theme1691/css/animate.css"/>
<link rel="stylesheet" href="http://toppay.vn/templates/theme1691/css/sliderbanner.css"/>
<link rel="shortcut icon" href="http://toppay.vn/templates/theme1691/favicon.ico" type="image/x-icon"/>
<!--[if IE 8]> <!-- <link rel="stylesheet" href=http://toppay.vn"/templates/theme1691/css/ie.css" /> <script type="text/javascript" src="http://toppay.vn/templates/theme1691/js/respond.min.js"></script>--> <![endif]-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript" />
</head>
<body id="tin-tuc">
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div> <script>(function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5"; fjs.parentNode.insertBefore(js, fjs); }(document, \'script\', \'facebook-jssdk\'));</script>
<!-- scroll to top -->';
?>
<!--Lazy Loading-->
<script src='https://65a77fe780fd0d6fd0d7c825fbb01c35124d06df.googledrive.com/host/0BwL0KbT-xOaTZzd4ZldpckNDbUE'></script>
<script>//<![CDATA[
$(function () {
    $("img.lazy").lazyload({
        effect: "fadeIn"
});
});
//]]></script>
<style>
img.hai {
 opacity: 0.5; //giá trị 0.5 làm cho hình ảnh rõ ràng hơn hoặc mờ đục
 -webkit-transition: all .3s linear; //3s thời gian thực hiện hành động
 -moz-transition: all .3s linear;
 -o-transition: all .3s linear;
 transition: all .3s linear;
}
img.hovereffect:hover {
 opacity: 1;
}
</style>
<?php
include 'menu.php';
?>