<?php
$home = 'http://ohdep.tk';
function mh_page($total,$show){
$p = $_GET['page'];
if(empty($_GET['page'])) $p=1;
if($p>1) $hal=' Page #'.$p;
$pg=ceil($total/$show);
if($p>$pg && $p!=1)
$p=$pg;
if($p<1)
$p = 1;
if($p<$pg){
$hai1s = ($p+1);
$hai1 = "<a href=\"/page/$hai1s\">Sau &rarr;</a>";
$hais5 = ($p-1);
$hai5 = "<a href=\"/page/$hais5\">&larr; Trước</a>";
}
if($hais5==0){
$hai5= "";
}
elseif($hai1s==$pg){
$hai1 == "";
}
if($p==$pg){
$hai5ss = ($p-1);
$hai5 = "<a href=\"/page/$hai5ss\">&larr; Trước</a>";
}
if($total>$show){
echo '<style>
#wp_page{margin:5px;}
#wp_page a{padding:5px 15px;text-decoration:none;background:#f5f5f5;border:rgba(0, 0, 0, 0.1) solid 1px;color:#595959;}
#wp_page a:hover{border:#9E9E9E solid 1px;}
#wp_page .current{padding:5px 15px;background:#f5f5f5;border:rgba(0, 0, 0, 0.1) solid 1px;color:#595959;}
</style>';
echo "<br /><p><center><div id=\"wp_page\">$hai5 <span class=\"current\">$p / $pg</span> $hai1</div></center></p>";
}
}

function catchuoi($noidung, $start, $stop) {

$bd = strpos($noidung, $start);

$kt = strpos(substr($noidung, $bd), $stop) + $bd;

$con = substr($noidung, $bd, $kt - $bd);

return $con;

}
function mh_trim($html){ 

$html = str_replace(array("\r\n", "\r"), "\n", $html); 

$lines = explode("\n", $html); 

$new_lines = array(); 



foreach ($lines as $i => $line) { 

if(!empty($line)) 

$new_lines[] = trim($line); 

} 

return implode($new_lines); 



}
?>