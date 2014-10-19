<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
        if(isset($_POST['word']))
$q = $_POST['word'];
if(!empty($_POST['word'])){
$q=$_POST['word'];
}else{
$q='katrina';
}
$q = str_replace('www', "", $q);
$q = str_replace('.in', "jar", $q);
$q = str_replace('dot', "", $q);
$q = str_replace('.com', "mp3", $q);
$q = stripslashes($q);
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
$div = "|#|";
$dat='../ls.txt';
###############DjAmol Group###############
###############DjAmol Group###############
$fp=fopen($dat, 'r');
$count=fgets($fp);
fclose($fp);
$cari = $q;
$cari = str_replace('+', ' ', $cari);
$data = explode($div, $count);
if (in_array($cari, $data)) {
$tulis = implode($div, $data);
$hit=$tulis;
}  //djamol
else {
$data = explode($div, $count);
$tulis = $data[1].''.$div.''.$data[2].''.$div.''.$data[3].''.$div.''.$data[4].''.$div.''.$data[5].''.$div.''.$data[6].''.$div.''.$data[7].''.$div.''.$data[8].''.$div.''.$data[9].''.$div.''.$data[10].''.$div;
$tulis .= $cari;
$hit=$tulis;
}


$masuk=fopen($dat, 'w');
fwrite($masuk,$tulis);
fclose($masuk);

$fa=fopen($dat, 'r');
$b=fgets($fa);
fclose($fa);

$c = explode($div, $b);
$e = str_replace(' ','+',$c);
echo '<div class=r1>'.$rdxml->eng->sr->s7.' :</div>';
foreach(array_reverse($e) as $d){
echo '|<a href="?act=search&lang='.$lang.'&word='.str_replace('+',' ',$d).'">'.str_replace('+',' ',$d).'</a>'; }

//<a href="?word='.$d.'">'.str_replace('+',' ',$d).'</a>//
echo '|';
?>
