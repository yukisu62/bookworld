@extends("layout")

@section("content")
<style>
body{
  margin:0;
  background-color:#FFFFBB;
}
.title {
  
  margin:20px auto 50px auto;
  text-align:center;
  background-color:lightgreen;
  width:500px;
  height:50px;
}

.title h1{
  white-space:nowrap;
}
/* 新規登録遅延とフォントサイズ */
.sinki {
  position:relative;
  font-size : 20px ;
  height:0px;
  transition:1s;
  
}
/* 新規登録ボタン */
.sinki-btn{
  position:absolute;
  margin-top:-17px;
  left:50%;
  transform:translatex(-50%);
  z-index:1;
  border:solid 2px;
  background-color:lightgreen;
  padding:5px 217px;
  cursor:pointer;
  white-space:nowrap;
}

/* ボタンホバー */
.btn:hover{
  background-color:yellow;
}
/* クリック前入力フォーム */
.sinki-view0{
  margin-top:10px;
  height:0px;
  overflow:hidden;
  position:absolute;
  width:85vw;
  padding-bottom:20px;
  left:50%;
  transform:translatex(-50%);
  border:solid 1px #FFFFBB;
  transition:1s;
  text-align:center;
}
/* クリック後入力フォーム囲い部分 */
.view{
  border:solid 3px lightgreen;
  height:calc(320px + 18vw / 2);
}
/*クリック後入力フォーム隠し用 */
.view2{
  height:calc(320px + 18vw / 2);
}
td{
  width:85vw;
}
/* 新規入力欄 */
input{
  width:40vw;
  height:3vw;
}
/* 登録ボタン */
.touroku-btn{
  text-align:center;
  background-color:pink;
  border:solid 3px black;
  margin:5px 26%;
  cursor:pointer;
  white-space:nowrap;
}


/* ログイン部分 */
.login {
  margin-top:50px;
  position:relative;
  height:500px;
  font-size : 20px;
}

/* ログインボタン */
.login-btn{
  text-align:center;
  z-index:1;
  border:solid 3px black;
  background-color:lightcoral;
  bottom:0;
  margin:10px 26%;
  cursor:pointer;
  white-space:nowrap;
  
}
/* 入力フォーム */
.login-view{
  border:solid 3px lightgreen;
  position:absolute;
  left:50%;
  margin-top:35px;
  padding:20px 0vw 90px 0vw;
  width:85vw;
  transform:translatex(-50%);
  text-align:center;
}

/* メールアドレス表記部分 */
.form1{
  padding-top:30px;
}
</style>

<!-- タイトル -->
<div class = title>
  <h1>ブックワールド</h1>
</div>
<!-- 新規登録 -->
<div class="sinki ">
  <p class="sinki-btn btn">新規登録</p>
  
<!--  クリック前入力フォーム -->
  <div class="sinki-view0"> 
  <form action="/login/regist" method="post" name="regist">{{csrf_field()}}
   <table>
     <tr><td class="form1">
        ニックネーム
        </td></tr>
        <tr><td>
        <input type="text" name="name">
        </td></tr>
        <tr><td>
        メールアドレス
        </td></tr>
        <tr><td>
        <input type="email" name="mail">
        </td></tr>
        <tr><td>
        パスワード
        </td></tr>
        <tr><td>
        <input type="password" name="pass">
        </td></tr>
        <tr><td>
        再度パスワード
        </td></tr>
        <tr><td>
        <input type="password" name="repass">
        </td></tr>
    </table>
<!--     登録ボタン -->
    <!-- <p class="touroku-btn btn" onclick="window.regist.submit()">登録</p> -->
    <p class="touroku-btn btn" onclick="return check();">登録</p>
    </form>
  </div>
</div>  

<!-- ログイン部分 -->
<div class ="login">
  <div class="login-view">  

<!-- 入力フォーム部分 -->
<form action="/login/login" method="post" name="login">{{csrf_field()}}
    <table>
    <tr><td class="form1">
    メールアドレス
    </td></tr>
    <tr><td>
    <input type="email" name="log_mail">
    </td></tr>
    <tr><td>
    パスワード
    </td></tr>
    <tr><td>
    <input type="password" name="log_pass">
    </td></tr>
      </table>
    <!-- ログインボタン -->
    <p class="login-btn btn" onclick="window.login.submit()">ログイン</p>
    </form>
  </div>
</div>
  

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>



<script>
$(".sinki-btn").click(function(){
  $(".sinki").toggleClass("view2");
  $(".sinki-view0").toggleClass("view");

});





// 登録時、入力されてるかチェック
function check(){
  if(
     regist.name.value == "" ||
     regist.mail.value == "" ||
     regist.pass.value == "" 

  
  ){
    return alert("必要項目を入力して下さい");

  // pass比較
  }else if(regist.pass.value !== regist.repass.value){
  return alert("再入力パスワードが一致しません");
  }else{
    window.regist.submit();
  }
}







</script>
@endsection


