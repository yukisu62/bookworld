@extends("layout")

@section("content")
<style>
body{
  margin:0px;
  background-color:#FFFFBB;
}

.top{
  text-align:center;
  background-color:#99FF00;
  padding:0px 10px 15px 10px;
  font-size:30px;
  margin:0 auto;
  width:500px;
  height:30px;
}
.title{
  
}
.container{
  height:400px;
  margin:0 auto;
  display:flex;
  justify-content:center;
background:url("https://school.oohara.jp/suizu/bookworld/syosaibg.jpg");
  background-size:cover;
  background-position:center;
  
}
.nowbook{
  background-color:rgba(51,204,255,0.3);
  width:480px;
  text-align:center;
  
}
p,span{
  
  font-weight:bold;
  font-size:30px;
  
}

.name{
  margin-top:70px;
}
 .book-img{
    display:cover;
    width:70px;
    margin-right:10px;
   cursor:pointer;
   
  }


.page_in{
  text-align:center;
  font-size:24px;
}
.num{
  width:90px;
  height:30px;
}
.nokori{
  padding-left:100px;
}

.touroku:hover{
  background-color:#CCFF00;
}
.touroku{
  text-align:center;
  font-size:20px;
  padding:15px;
  border:solid;
  background-color:yellow;
  cursor:pointer;
  margin-top:70px;
}

/* レスポンシブスマフォ対応 */
@media screen and (max-width: 480px){
  p,span{
    font-size:22px;
  }
  .top{
    font-size:30px;
    background-color:#33CCFF;
    width:100%;
  }
  .title{
    text-align:default;
    padding-left:0;
  }
  .nowbook{
    width:100%;
  }
  .book-img{
    
  }
}
</style>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- header -->
<div class="top">
  <p class="title">読書しました！</p>
</div>


<div class="container">
    <div class="nowbook">
      <div class="name">
     <span>{{$book}}</span>
     <p>を</p>
      <span>{{$page}}ページ読みました</span>    
     </div>
     

   <div class="">
     <p></p>
<div class="page_in">
      </div>
  
   </div>
      
      <p class="touroku" onclick="location.href='/main'">TOPに戻る</p>
      
  </div>

  @endsection