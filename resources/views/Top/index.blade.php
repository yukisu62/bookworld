@extends("layout")

@section("content")
<style>

@keyframes opa {
  from{
    opacity:0;
    display:block;
  }
  to {
    opacity:1;
    display:block;
  }
}

@keyframes opa2 {
  from{
    opacity:0;
  }
  to {
    opacity:1;
    cursor:pointer;
  }
}
body{
  margin:0;
  padding:0;
  background-image:url("https://school.oohara.jp/suizu/bookworld/forest2.jpg");
  background-size:cover;
}
.container{
  text-align:center;       
  position:relative;
  height:100vh;
}

.header{
  
  
}
.skipdiv{
  position:relative;
}
.skip{
  position:absolute;
  color:white;
  right:0px;
  margin-top:10px;
  background-color:black;
  border-radius:4px;
  
}
.skip:hover{
  background-color:gray;
  cursor:pointer;
}
#bgm-btn{
 float:right;
 font-size:26px;
 background-color:gray;
 cursor:pointer;
}
#bgm-btn:hover{
 background-color:white;
}
.nakami{
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
 white-space:nowrap;
  font-family:sans-serif;
  font-weight:bold;
  font-size:20px;
  color:white;
}
p{
  margin-top:0;
}
.text1{
  animation-name:opa;
  animation-duration:2s;
  animation-delay:1s;
  animation-fill-mode:backwards;
  cursor:default;
}
.text2{
  animation-name:opa;
  animation-duration:2s;
  animation-delay:2.5s;
  animation-fill-mode:backwards;
  cursor:default;
}
.text3{
  animation-name:opa;
  animation-duration:2s;
  animation-delay:4s;
  animation-fill-mode:backwards;
  cursor:default;
}
.text4{
  animation-name:opa;
  animation-duration:2s;
  animation-delay:5.5s;
  animation-fill-mode:backwards;
  cursor:default;
}

.next{
  animation-name:opa2;
  animation-duration:1s;
  animation-delay:7s;
  animation-fill-mode:backwards;
  animation-iteration-count:infinite;
  background-color:gray;
  cursor:default;
  font-size:26px;
  
}

/* 最後の画面 */
.title-call{
  animation-name:opa;
  animation-duration:5s;
  animation-delay:2s;
  animation-fill-mode:backwards;
  cursor:default;
  color:white;
  text-shadow:3px 3px 0 black;
  font-size:26px;
}
.start:hover{
  background-color:#555555;
}
.start{
  animation-name:opa2;
  animation-duration:1s;
  animation-delay:5s;
  animation-fill-mode:backwards;
  animation-iteration-count:infinite;
  cursor:pointer;
  text-shadow:3px 3px 0 black;
  font-size:22px;
}

</style>
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
 <meta name="viewport" content="width=device-width">
</head>


<div class="container">
  <!-- BGMボタン -->
  <div class="header">
    <i id="bgm-btn" class="fas fa-volume-mute"></i>
    
　</div>
  <div class="skipdiv"><span class="skip">skip</span></div>
  
  <div class="nakami">
  <p class="text1">「急に体が。。。。ここはどこだ。。。」</p>
  <p class="text2">ある日、読書をサボりがちなあなたは</p>
  <p class="text3">本の妖精の魔法によって</p>
  <p class="text4">本の世界の中に閉じ込められてしまった</p>
  <a class="next">next</a>
  </div>
</div>

<!-- BGMのリンク -->
<audio id="windrainsd" src="https://school.oohara.jp/suizu/bookworld/oto/windsd1.mp3"></audio>

<audio id="windrainsd2" src="https://school.oohara.jp/suizu/bookworld/oto/rainy1.mp3"></audio>

<audio id="cs1" src="https://school.oohara.jp/suizu/bookworld/oto/btn_click1.mp3"></audio>

<audio id="bgbgm" src="https://school.oohara.jp/suizu/bookworld/oto/Edel_Bon.mp3"></audio>
 
<audio id="startsd" src="https://school.oohara.jp/suizu/bookworld/oto/btn2.mp3">
</audio>



<script>
// nextをクリックすると表示したストーリー（文字）を消して、
// 次の文章に進んでいきたい。そして、またnextをクリックすると次の文章。▶clickイベントを繰り返し、新しいHTML文章を追加したい。▶nextCount変数に0を置き、1,2,3と増えていくように設定。▶swich文でクリック回数に応じてJQueryを使ったHTMLDOM操作を実行。
// ▶クリックイベントを繰り返したいため、nextClickという関数の中に入れて、最初と関数内の最後に実行し繰り返しを反映。
// 最後まで文章を出したら、ログインページに移行。


// 最初にnextClickを出しておく
nextClick();
// swiｔch文の繰り返しのカウント数初期値設定
var nextCount = 0;
function nextClick(){
  // nextをクリックすると次の文章を表示
  $(".next").click(function(){
  cs();
  console.log("cs");

 
  
  nextCount ++;
  switch(nextCount){
    case 1 :
      
      $(".nakami").html(`
        <p class="text1">身体もネコの姿に変えられてしまった！</p>
        <p class="text2">この世界から抜け出すには</p>
        <p class="text3">毎日読書をして経験値を貯めて</p>
        <p class="text4">妖精の魔法を解除しなくてはならない！</p>
        <a class="next">▶next</a>
      `);
      
          break;
    case 2 :
       $(".nakami").html(`
          <p class="text1">さて、あなたは、読書を継続し</p>
          <p class="text2">本の世界から抜け出すことができるのか？
</p>
          <p class="text3">ゲーム感覚で読書を習慣にし</p>
          <p class="text4">本の世界から脱出しましょう！</p>
          <a class="next">▶next</a>
       `);
           break;   
      case 3 :
      $("body").css("background-size","cover");
      $("#windrainsd").get(0).pause();
      $("#windrainsd2").get(0).pause();
      if(!$("#bgm-btn").hasClass("fa-volume-mute")){
         $("#bgbgm").get(0).play();
         }
     
       $(".nakami").html(`
          <p id="title-call" class="title-call">「ブックワールド脱出ゲーム」</p>
          <a class="start">▶本をひらく</a>
       `);
       //次のページに飛ぶ処理を0.3秒くらい遅らせたい！
       $(".start").click(function(){
          location.href="/login";
       });

       // 本を開くボタンの音
        function start(){
        $("#startsd").get(0).play();    
        }

        $(".start").click(function(){
        start();
        console.log("start");
        });
      break;   
    }
  
 nextClick();
});
}



// BGMボタンのtoggle

  $("#bgm-btn").click(function(){
   $("#bgm-btn").toggleClass("fa-volume-mute");
   $("#bgm-btn").toggleClass("fa-volume-up");
   
 if($("#bgm-btn").hasClass("fa-volume-mute")){
   $("#windrainsd").get(0).pause();
   $("#windrainsd2").get(0).pause();
   $("#bgbgm").get(0).pause();
  }else{
    if(nextCount != 3){
      $("#windrainsd").get(0).play();
    $("#windrainsd2").get(0).play();
     }
    
    if(nextCount == 3){
      $("#bgbgm").get(0).play();
    }
  }
 });
  
  
// nextボタン効果音
function cs(){
    if($("#bgm-btn").hasClass("fa-volume-mute")){
  $("#cs1").get(0).pause();
    }else{
  $("#cs1").get(0).play();
    }
}
 
 //skipボタン
function skip(){
  $(".skip").click(function(){
  location.href="/login";
  });
}
skip();

</script>
@endsection