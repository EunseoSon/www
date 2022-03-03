<?
   function latest_article($table, $loop, $char_limit) 
   {
	   //latest_article("greet", 5, 30);
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			 $len_subject = mb_strlen($row[subject], 'utf-8'); //한글도 1자로 처리, 제목의 총 글자수 40
			$subject = $row[subject];

			if ($len_subject > $char_limit) //제한글자수 (30)보다 크면
			{              
               	$subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

			$regist_day = substr($row[regist_day], 0, 10); //날짜가 뜸

       
        	if($table=='greet')
		   { 
			echo "<li><a href='./$table/view.php?table=$table&num=$num'>$subject<span>$regist_day</span></a></li>";
		   }     
               
		}


		mysql_close();
   }
?>