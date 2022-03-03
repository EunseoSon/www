<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>로그인</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="./css/login.css">

</head>
<body>
	<div class="wrap">
		
		<article id="content">
		<header>
			<h1><a href="../index.html">로고</a></h1>
		</header>
			<form  name="member_form" method="post" action="login.php"> 
			
				<div id="id_pw_input">
					<ul>
						<li>
							<label for="">아이디</label>
							<input type="text" name="id" id="id" class="login_input">
						</li>
						<li>
							<label for="id">패스워드</label>
							<input type="password" name="pass" id="pass" class="login_input">
						</li>
						<li>
							<div id="login_button">
								<input type="submit" value="로그인">
							</div>
						</li>
						<li>
							아직 회원이 아니십니까? <a class="join_btn" href="../member/member_form.php">회원가입 하기</a>
						</li>
						<li>
							<div>
								<a href="./id_find.php">아이디 찾기</a>
								<a href="./pw_find.php">패스워드 찾기</a>
							</div>
						</li>

					</ul>						
				</div>
				

			</form>
		</article>
	</div>
</body>
</html>