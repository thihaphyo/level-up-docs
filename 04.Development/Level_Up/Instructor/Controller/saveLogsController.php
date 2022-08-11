<?php

if(isset($_POST['data_to_log'])){
    $fp = fopen('video_uploading_logs.txt', 'a');//opens file in append mode.
    fwrite($fp, 'START---------------'.PHP_EOL);
    fwrite($fp, $_POST['data_to_log']);
    fwrite($fp, '---------------END'.PHP_EOL);
    fclose($fp);
}


?>