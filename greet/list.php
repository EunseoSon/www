<? 
	session_start(); 
     @extract($_POST);
     @extract($_GET);
     @extract($_SESSION);
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>학회소식</title>

	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
	<link rel="stylesheet" href="./css/greet.css">

	<?
	include "../lib/dbconn.php";

	
  if (!$scale)
    $scale=10;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>
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
			
			<form  name="board_form" method="post" action="list.php?mode=search"> 
		<div id="list_search">
			<div id="list_search1">총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
			<div class="list_search_wrap">
				<select name="scale" onchange="location.href='list.php?scale='+this.value" style="position: absolute;
    left: 30px;
    top: 16px;
    border: 0;
    font-size: 18px;">
								 <option value=''>보기</option>
								 <option value='1'>10</option>
								 <option value='2'>15</option>
								 <option value='3'>20</option>
								 <option value='4'>30</option>
						 </select>
				<div id="list_search2">
					<select name="find">
								 <option value='subject'>제목</option>
								 <option value='content'>내용</option>
								 <option value='nick'>별명</option>
								 <option value='name'>이름</option>
					</select></div>
				<div id="list_search3"><input type="text" name="search"></div>
				<div id="list_search4"><input type="submit" value="검색"></div>
			</div>
		</div>
		</form>
		
		
		
		

		<div class="clear"></div>

		<div id="list_top_title">
			<ul>
				<li id="list_title1">번호</li>
				<li id="list_title2">제목</li>
				<li id="list_title3">글쓴이</li>
				<li id="list_title4">등록일</li>
				<li id="list_title5">조회</li>
			</ul>		
		</div>

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

?>
			<div id="list_item">
				<div id="list_item1"><?= $number ?></div>
				<div id="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
				<div id="list_item3"><?= $item_nick ?></div>
				<div id="list_item4"><?= $item_date ?></div>
				<div id="list_item5"><?= $item_hit ?></div>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> &lt; &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
           if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
            }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp; &gt;
				</div>
				<div id="button">
					<a class="list_btn btn" href="list.php?page=<?=$page?>">목록</a>
<? 
	if($userid)
	{
?>
		<a class="write_btn btn" href="write_form.php">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->
		
        </div> <!-- end of list content -->



			</div>
		</article>

	<? include "../common/sub_footer.html" ?>
</body>
</html>


