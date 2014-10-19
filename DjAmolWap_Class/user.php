<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
require 'moduls/ini.php';
require 'moduls/fun.php';
require 'moduls/connect.php';
require 'moduls/header.php';

$id = intval($_GET['id']);
$page = intval($_GET['page']);

##############DjAmolgroup Inc#################
if($setup['eval_change']==1){
$eval = ',<a href="index.php?lang='.$lang.'&amp;sort=eval&amp;id='.$id.'">rating</a>';
}
else{
$eval='';
}  //DjAmol

$sort = $_SESSION['sort'];
$onpage = $_SESSION['onpage'];
$prew = $_SESSION['prew'];


if($sort == 'name') $sortlink = '<a href="index.php?lang='.$lang.'&amp;sort=data&amp;id='.$id.'">date</a>,<a href="index.php?lang='.$lang.'&amp;sort=size&amp;id='.$id.'">size</a>,<a href="index.php?lang='.$lang.'&amp;sort=load&amp;id='.$id.'">popularity</a>'.$eval;
elseif($sort == 'data') $sortlink = '<a href="index.php?lang='.$lang.'&amp;sort=name&amp;id='.$id.'">name</a>,<a href="index.php?lang='.$lang.'&amp;sort=size&amp;id='.$id.'">size</a>,<a href="index.php?lang='.$lang.'&amp;sort=load&amp;id='.$id.'">popularity</a>'.$eval;
elseif($sort == 'size') $sortlink = '<a href="index.php?lang='.$lang.'&amp;sort=data&amp;id='.$id.'">date</a>,<a href="index.php?lang='.$lang.'&amp;sort=name&amp;id='.$id.'">name,<a href="index.php?lang='.$lang.'&amp;sort=load&amp;id='.$id.'">popularity</a></a>'.$eval;
elseif($sort == 'load') $sortlink = '<a href="index.php?lang='.$lang.'&amp;sort=data&amp;id='.$id.'">date</a>,<a href="index.php?lang='.$lang.'&amp;sort=name&amp;id='.$id.'">name,<a href="index.php?lang='.$lang.'&amp;sort=size&amp;id='.$id.'">size</a>'.$eval;
elseif($sort == 'eval' and $setup['eval_change']==1) $sortlink = '<a href="index.php?lang='.$lang.'&amp;sort=data&amp;id='.$id.'">дата</a>,<a href="index.php?lang='.$lang.'&amp;sort=name&amp;id='.$id.'">name,<a href="index.php?lang='.$lang.'&amp;sort=size&amp;id='.$id.'">size</a>,<a href="index.php?lang='.$lang.'&amp;sort=load&amp;id='.$id.'">popularity</a>';

echo '<div class="mp3t">'.$rdxml->eng->i4.'&raquo;'.$rdxml->eng->i9.'</div>
<div class="a">'.$rdxml->eng->i2.':<br>'.$sortlink.'</div>';
##########djamol###############
if($setup['onpage_change'] == 1)
{
echo '<div class="a">'.$rdxml->eng->st->s1.': ';
for($i=10; $i<35;$i=$i+5)
{

echo '[<a href="index.php?lang='.$lang.'&amp;onpage='.$i.'&amp;id='.$id.'">'.$i.'</a>]';
}
echo '</div>';
}
if($setup['preview_change'] == 1)  //twitter.com/djamol
{
echo '<div class="a">'.$rdxml->eng->db4->d3.': ';


echo '[<a href="index.php?lang='.$lang.'&amp;id='.$id.'&amp;prew=1&amp;page='.$page.'">'.$rdxml->eng->db4->d4.'</a>][<a href="index.php?lang='.$lang.'&amp;id='.$id.'&amp;prew=0&amp;page='.$page.'">'.$rdxml->eng->db4->d5.'</a>]';

echo '</div>';
}
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
echo '
<div class="a">
<div class="mp3t"><a href="index.php?lang='.$lang.'&amp;id='.$id.'">'.$rdxml->eng->vs->v15.'</a></div>
<div class="mp3t"><a href="index.php?lang='.$lang.'&amp;">'.$rdxml->eng->i4.'</a></div>
<div class="mp3t"><a href="'.$setup['site_url'].'?lang='.$lang.'">'.$rdxml->eng->h1.'</a></div>
';
echo '</div><div class="title">';
include 'moduls/foot.php';
echo '</div>';
?>