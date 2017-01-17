<?php
//Code post bài cho forum
//Cần setup mod cho nick forum.
//Ho tro gocgiaitri.club
function stz() {
$url='http://xtgem.com/auth/login?redir=VjFKVWRuQkxRa1pJUjFVM1JuZHRZVVo2UnpkSE1HRnlWVlJ6UTBaUVIzZHdTa2N2VVZWTFFsTldZWFJMVlVzMVRIaDNiSEpRT0c1YWRsaDZkRkZvWTFwNVJtRkJiMDhyUlZNd2JVVkpVVFJGZVU4eVFtOUtORVJTVDJ4RmJ6UndWVEJvUlZKR05GWkhiRmgxVUVaVlIxZEhTa3RXYkZWWlZWTTBQUT09&s=VjFkWk1FSlhaVmxHTURGRVNFcEhkRWt3WVVaUlVEMDk%3D';

$ua = 'NokiaN73-2/3.0-630.0.2 Series60/3.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 ';
$cookie = 'cookgessg.txt';
$time = 20;
$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
if (!file_exists($cookie) || (filemtime($cookie) < time() - 3600))
{
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, array('email' => 'homquahy@yahoo.com', 'password' => 'hhhhhh', 'action' => 'login', 'account_login' => 'Ok'));
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);

curl_exec($ch);
}
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);

curl_setopt($ch, CURLOPT_URL, $url);

$nd=curl_exec($ch);
curl_close($ch);
preg_match('#<a(.*?)class="submit"(.*?)href="(.*?)"(.*?)>(.*?)</a>#is', $nd , $t);
$link=$t[3];
return $link;
}
function postforum($url,$title,$text) {

$link=stz();

$ua = 'NokiaN73-2/3.0-630.0.2 Series60/3.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 ';
$cookie = 'hikigat.txt';
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $ua);curl_setopt($ch, CURLOPT_URL, $link);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);

curl_exec($ch);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, array('title' => $title, 'message' => $text, 'submit' => 'Gửi bài'));
$nd=curl_exec($ch);
preg_match('#url=(.*?)">#is',$nd,$t);

$trang=$t[1];
$trang=str_replace('http://maxhay.mobie.in/index/__xt/redirect.html?redir=','',$trang);
$trang=base64_decode($trang);

//thay di nhé
$t=$trang;

return $t;
}
//Su dụng postforum
$dem = file_get_contents('dem.txt');
$ss = ($dem+1);
file_put_contents('dem.txt', $ss);

$ten = 'nhoc96 '.file_get_contents('dem.txt');
postforum('http://maxhay.mobie.in/index/__xt/new-thread-owv6eo2sq0kyzb7m9edcfon6wg2ki0cqrt7e9.html','ttt','ahihi');
 
?>