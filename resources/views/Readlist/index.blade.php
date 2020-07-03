@extends("layout")

@section("content")
<style>
body{
  margin:0px;
  background-color:#FFFFBB;
}

.top{
  text-align:center;
  background-color:#33CCFF;
  padding:0px 10px 15px 10px;
  font-size:30px;
  margin:0 auto;
  width:500px;
  height:30px;
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
}
p,span{
  font-weight:bold;
}

.name{
  margin-top:30px;
}
 .book-img{
    display:cover;
    width:70px;
    margin-right:10px;
   cursor:pointer;
   
  }

.pul{
  width:100%;
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
  <p class="title">読書記録をしましょう</p>
</div>

<!-- TOPに戻るリンク -->
<span class="re-top"><a href="/main">TOPに戻る</a></span>


<div class="container">
<form action="/readlist/regist" method="post" name="regist" enctype="multipart/form-data">{{csrf_field()}}
    <div class="nowbook">
      <div class="name">
     <span>今読んでいる本</span>
      <p class="pul">
          @foreach($rb as $item )
          <img src="/{{$item->image}}" class="book-img">
          @endforeach

        
          <select name="bookname" id="booklist">
          @php
            $count = 0;
          @endphp
          @foreach($rb as $item )
          <option value = "{{$item->reading}}" data-count="{{$count}}" >{{$item->reading}}</option>
          @php
            $count++;
          @endphp
          @endforeach
          </select>
       </p>
     </div>
     

   <div class="pages">
     <p>ページ数を入力</p>
      <div class="page_in">
      <span>今回、</span><input id="read" class="num" type="number" name="start"><span>ページ目</span>
      </div>
  <!--  読み終わるまであと｛｝ページをデータから参照し表示する -->
      <p class="nokori">読み終わるまであと<span></span>ページ</p>
   </div>
      
      <p class="touroku" onclick ="window.check()">記録する</p>
    </form>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script>

var pages = [ 
@foreach($rb as $item)
{{$item->pages - $item->now_pages}},
@endforeach
];

var list = 0;
$(".nokori span").html(pages[list]);
$("#booklist").change(function(){
    $(".nokori span").html(pages [parseInt($("#booklist option:selected").data("count")) ]);
});

$("#read").keyup(function(){
  if($(this).val() == ""){
    $(".nokori span").html(pages [parseInt($("#booklist option:selected").data("count")) ]);
    return ;
  }
  $(".nokori span").html(pages [parseInt($("#booklist option:selected").data("count")) ]  - parseInt($(this).val() ));
});

$("#read").change(function(){
  if($(this).val() == ""){
    $(".nokori span").html(pages [parseInt($("#booklist option:selected").data("count")) ]);
    return ;
  }
  $(".nokori span").html(pages [parseInt($("#booklist option:selected").data("count")) ]  - parseInt($(this).val() ));
});

function check(){
  var page = parseInt($(".nokori span").html());
  if(page >= 0){
    window.regist.submit();
  }
  

}


</script>

@endsection