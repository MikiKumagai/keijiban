<?php
    function writeData(){
        $contents = $_POST['contents'];
        $contents = nl2br($contents);
    
        $data = "<hr>";
        $data = "<p>".$contents."</p>".$data ;
    
        $keijban_file = 'keijiban.html';
    
        $fp = fopen($keijban_file, 'ab');
    
        if ($fp){
            if (flock($fp, LOCK_EX)){
                if (fwrite($fp,  $data) === FALSE){
                    print('ファイル書き込みに失敗しました');
                }
    
                flock($fp, LOCK_UN);
            }else{
                print('ファイルロックに失敗しました');
            }
        }
        fclose($fp);
    }
?>