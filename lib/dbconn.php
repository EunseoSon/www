<?

    $connect=mysql_connect( "localhost", "ses", "eunseo7938") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("ses_db",$connect);
   
    /*
    $connect=mysql_connect( "localhost", "eunseoson", "thsdmstj7938!") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("eunseoson",$connect);
    */
?>
