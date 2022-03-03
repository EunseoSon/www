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
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./css/member_form_modify.css">

    <title>Document</title>
    <script>
        // $(document).ready(function() {
        //     $("#nick").keyup(function() {    // id입력 상자에 id값 입력시
        //     var nick = $('#nick').val();

        //         $.ajax({
        //             type: "POST",
        //             url: "check_nick.php",
        //             data: "nick="+ nick,  
        //             cache: false, 
        //             success: function(data)
        //             {
        //                 $("#loadtext2").html(data);
        //             }
        //         });
        //     });
        // });	

    </script>
<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
</head>

<body>
    <div class="wrap">
            
        <article id="content">
        <h1><a href="../index.html">로고</a></h1>
        <div id="col2">
        <form  name="member_form" method="post" action="modify.php">


		<div id="form_join">
            <p class="must"><span class="red">*</span> 는 필수 입력항목입니다.</p>
			<div id="join2">
			<ul>
			<li>아이디 <span class="gap"><?= $row[id] ?></span></li>
			<li><label for="pass">비밀번호<span class="red">*</span></label><input type="password" name="pass" value=""></li>
			<li><label for="pass_confirm">비밀번호 확인<span class="red">*</span></label><input type="password" name="pass_confirm" value=""></li>
			<li><label for="name">이름</label><input type="text" name="name" value="<?= $row[name] ?>"></li>
			<li><label for="nick">닉네임</label><input id="nick" type="text" name="nick" value="<?= $row[nick] ?>"><span id="loadtext2"></span></li>
			<li>
                <label for="hp1">전화번호</label>
                <select class="hp" name="hp1" id="hp1" value="<?= $hp1 ?>"> 
                    <option value='010'>010</option>
                    <option value='011'>011</option>
                    <option value='016'>016</option>
                    <option value='017'>017</option>
                    <option value='018'>018</option>
                    <option value='019'>019</option>
                </select> 
             - <input type="text" class="hp" name="hp2" value="<?= $hp2 ?>"> - <input type="text" class="hp" name="hp3" value="<?= $hp3 ?>"></li>
			<li><label for="email">이메일</label><input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ <input type="text" name="email2" 
			           value="<?= $email2 ?>"></li>
			</ul>
			</div>
			
		</div>

		<div id="button">
            <a href="#" onclick="check_input()">수정완료</a>
            <a href="#" onclick="reset_form()">취소하기</a>
		</div>
	    </form>

        </article>
   </div>


</body>
</html>
