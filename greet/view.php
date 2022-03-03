<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>view</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
	<link rel="stylesheet" href="./css/greet.css">

	<script>
		function del(href) 
		{
			if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
					document.location.href = href;
			}
		}
	</script>
</head>
<body>
<? include "../common/sub_header.html" ?>
		<div class="visual">
            <img src="../sub6/common/images/visual.jpg" alt="비주얼 이미지">
            <h3>커뮤니티</h3>
            <p>학회의 소식과 자료를 만나보세요.</p>
        </div>
		<div class="sub_menu">
            <ul>
			<li class="current"><a href="../greet/list.php">학회소식</a></li>
                <li><a href="../sub6/sub6_2.html">천문학회의일정</a></li>
                <li><a href="../download/list.php">자료실</a></li>
                <li><a href="../sub6/sub6_4.html">관련기관</a></li>
            </ul>
        </div>
		<article id="content">
            <div class="title_area">
                <div class="line_map">
                    HOME &gt; 커뮤니티 &gt; <strong>학회소식</strong>
                </div>
                <h2>학회소식</h2>
            </div>
			<div class="content_area">
			<div id="col2">
        

		<div id="view_comment"> &nbsp;</div>

		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>  
			                      | <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a class="list_btn btn" href="list.php?page=<?=$page?>">목록</a>
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	{
?>
				<a class="btn modify_btn" href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>
				<a class="del_btn btn" href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>
<?
	}
?>
<? 
	if($userid )  //로그인이 되면 글쓰기
	{
?>
				<a class="btn write_btn" href="write_form.php">글쓰기</a>
<?
	}
?>
		</div>

		<div class="clear"></div>

	</div> <!-- end of col2 -->
			
			</div>
		</article>
<? include "../common/sub_footer.html" ?>
</body>
</html>



