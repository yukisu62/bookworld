@extends("layout")

@section("content")
<style>
body{
  margin:0;
  user-select:none;
}
/* トップ */
.top-container{
  width:100%;
  height:220px;
  background-color:violet;
  font-size:18px;
  display:flex;
}
.top-left{
/*   border:solid; */
  width:50%;
  margin-left:30px;
}
/* ステージ */
.stage{
  display:inline-block;
  margin:5px 10px;
  padding:5px 10px;
  border:solid 3px black;
}
/* 前回の読書日 */
.before-reading{
  width:230px;
  background-color:yellowgreen;
  margin:5px 10px;
  padding:5px 10px;
  border:solid 3px black;
}
/* 合計ポイント */
.sum_p{
  background-color:yellowgreen;
  margin:10px 10px;
  padding:5px 10px;
  border:solid 3px black;
  width:230px;
  margin-top:0;
}
/* 次のステージまであと */
.next_p{
  background-color:yellowgreen;
  margin:10px 10px;
  padding:5px 10px;
  border:solid 3px black;
  width:230px;
  margin-top:0;
}

/* 右上部分 */
.top_right{
  font-size:14px;
/*   border:solid; */
  width:50%;
  padding-top:55px;
  margin-right:30px;
  
}
/* 前回獲得P */
.before_p{
  background-color:yellowgreen;
  margin:10px 10px;
  margin-left:auto;
  padding:20px 10px;
  border:solid 3px black;
  width:240px;
  margin-top:0;
}
/* ボーナスポイント */
.bounus_p{
  background-color:yellowgreen;
  margin:10px 10px;
  margin-left:auto;
  padding:20px 10px;
  border:solid 3px black;
  width:240px;
  margin-top:0;
}

/* イメージ部分 */
.top-img{
  
}
.back_img{
  position: relative;
  width:100%;
  height:300px;
}
.neko{
  position: absolute;
  top:300px;
  left:30px;
  width:200px;
  height:200px;
  z-index:2;
}
.yousei{
  position: absolute;
  top:300px;
  left:560px;
  width:200px;
  height:200px;
  z-index:2;
}


/* メニューリスト */
.menu-list-container{
  width:100%;
  height:200px;
  display:flex;
  justify-content:center;
}
.right.menu{
  
}
/* 読書中 */
.reading{
  font-size:26px;
  font-weight:bold;
  border-radius:3px;
  background-color:yellow;
  text-align:center;
  margin:10px 10px;
  padding:20px 20px;
  width:310px;
  margin-top:10px;
  cursor:pointer;
}
/* 新しい本 */
.new{
  font-size:26px;
  font-weight:bold;
  border-radius: 3px;
  background-color:yellow;
  text-align:center;
  margin:10px 10px;
  padding:20px 20px;
  width:310px;
  margin-top:10px;
  cursor:pointer;
}
.btn:hover{
  opacity:0.7;
}
.btn{
  border-bottom: solid 4px #627295;
  user-select:none;
}
.btn:active {
  /*ボタンを押したとき*/
  -webkit-transform: translateY(4px);
  transform: translateY(4px);/*下に動く*/
  border-bottom: none;/*線を消す*/
}
</style>



<!-- トップ -->
<div class="top-container">
<!--   左上部分 -->
  <div class="top-left">
    <div class="stage">
      <span>ステージ:{{$stage}}</span></div>
    <div class="before-reading">
      <span>前回の読書   : {{$last->r_day}}</span></div>
    <div class="sum_p">
      <span>合計ポイント：{{$point}}P</span></div>
    <div class="next_p">次のステージまであと{{$next_point}}P</div>
  </div>
<!--   右上部分 -->
   <div class="top_right">
     <div class="before_p">
       <span>前回獲得ポイント:{{$b_point}}P</span></div>
     <div class="bounus_p">
       <span>ボーナスポイント：{{$ddpoint}}P({{$dd}}日目）</span></div> 
   </div>
</div>

<!-- イメージ部分 -->
<div class="top-img">
<!--   背景 -->
  @if($stage == 1)
   <img class="back_img" src="https://school.oohara.jp/suizu/bookworld/stage1_back.jpg">
  @endif

  @if($stage == 2)
   <img class="back_img" src="https://school.oohara.jp/suizu/bookworld/stage2_back.jpg">
  @endif

  @if($stage == 3)
   <img class="back_img" src="https://school.oohara.jp/suizu/bookworld/stage3_back.jpg">
  @endif

  @if($stage == 4)1 
   <img class="back_img" src="https://school.oohara.jp/suizu/bookworld/stage4_back.jpg">
  @endif

  @if($stage == 5)
   <img class="back_img" src="https://school.oohara.jp/suizu/bookworld/stage5_back.jpg">
  @endif
</div>
<!-- メニューリスト -->
<div class="menu-list-container">
  <div class="left.menu">
    <p class="reading btn" onclick="location.href='/readlist'">読書中リスト</p>  
  </div>
  <div class="right.menu">
    <p class="new btn" onclick="location.href='/newbook'">新しい本の設定</p>
  </div> 
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



<script>


//前回の読書日


// 各ステージの規定ポイント一覧(cp = clear point)
var stage1_cp = 100
var stage2_cp = 1000
var stage3_cp = 2500
var stage4_cp = 5000
var stage5_cp = 10000

// 現在の合計ポイント(sumpoints)
var sumpoints = 0

//合計ポイントの計算 すべての本のnow_pagesの合計


//合計ポイント
$(".sum_p span").html("合計ポイント："{sumpoints});

//次のステージまであと  ポイント


//前回獲得ポイント
$(".before_p span").html("前回獲得ポイント：" {item->now_pages}"P");




// 読書中リストのページ数入力を持ってくる処理
var new_p = 0

// 合計ポイント計算
current_p + new_p


// 次のステージまであと何ポイント？
// （現在のステージの規定P）-[（合計P)-(クリアしたステージの規定P)]



</script>

@endsection