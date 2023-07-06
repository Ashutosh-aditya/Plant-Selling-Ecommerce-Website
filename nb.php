<?php
        echo '<button class="lbtn"  style="width:auto;"> <a href="http://localhost/web_dev_proj/plant/login.php"> ';
if ($str=="Login") {
    echo $str;
} else {
    // echo $str;
    echo '<form method="post" action="logout.php">';
    echo 'Hi, <input type="submit" value="'.$str.'">';
    echo '</form>';
}
?>