<?php
echo '<span class="guestentry">'.$rdxml->eng->html->b1.'</span><br>';
if ($mlang == "1")
{ echo '<span class="guestentry">Select Language :<a href="?lang=en">English</a> || <a href="?lang=ur">اردو</a> || <a href="?lang=ru">России</a> || <a href="?lang=hl">हिंदी</a> || <a href="?lang=gu">ગુજરાતી</a></span><br>';
}
echo '<div class="catRow"><a href="http://djamol.com/contact.php&amp;lang='.$lang.'">'.$rdxml->eng->html->b2.'</a> | <a href="dashboard.php?avp=iml&amp;lang='.$lang.'">'.$rdxml->eng->html->b3.'</a>|<a href="dashboard.php?dmca=dis&amp;lang='.$lang.'">'.$rdxml->eng->html->b4.'</a> |<a href="dashboard.php?dmca=tos&amp;lang='.$lang.'"> '.$rdxml->eng->html->b5.'</a> |</div>
';
?>
