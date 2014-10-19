<?php
###############DjAmol Group###############
//   DjAmolwap 12v                      //
//   Buy Now Pro Version Only 36 USD    //
//   http://twitter.com/djamol          //
//   Www.djamol.com/contact             //
//      http://ai.djamol.com            //
###############DjAmol Group###############
if($id){
###############Youtube.com/djamolOfficial#########################
if($setup['eval_change']==1) $eval = ',<a href="index.php?sort=eval&amp;id='.$id.'&url='.$url.'">rating</a>'; else $eval='';

if ($sort == 'name') $sortlink = '<u>Name</u>/<a href="index.php?sort=data&amp;id='.$id.'">Date</a>';
elseif ($sort == 'data') $sortlink = '<u>Date</u>/<a href="index.php?sort=name&amp;id='.$id.'">Name</a>';
elseif ($sort == 'size') $sortlink = '<a href="index.php?sort=data&amp;id='.$id.'">Дате/</a>,<a href="index.php?sort=name&amp;id='.$id.'">Name</a>';
elseif ($sort == 'load') $sortlink = '<a href="index.php?sort=data&amp;id='.$id.'&url='.$url.'">Дате/</a><a href="index.php?sort=name&amp;id='.$id.'">Name</a>';
elseif ($sort == 'eval' and $setup['eval_change']==1) $sortlink = '<a href="index.php?sort=data&amp;id='.$id.'">Дате</a>/<a href="index.php?sort=name&amp;id='.$id.'&url='.$url.'">Name</a>';

echo '<div class="i_bar_t">Sort:'.$sortlink.'</div>';
}
?>