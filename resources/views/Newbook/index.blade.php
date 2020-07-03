@extends("layout")

@section("content")
<style>
body{
  margin:0px;
}
.top{
  text-align:center;
  background-color:lightgreen;
  padding:15px;
  font-size:30px;
}

.re-top{
  
}
.container{
  height:400px;
  margin:0 auto;
  display:flex;
  justify-content:center;
  background-color:pink;
}
.input-lists{
  background-color:lightgreen;
  width:300px;
  height:400px;
  font-size:24px;
  display:flex;
  flex-direction:column;
}
.name{
  margin-top:30px;
}
.input{
  width:280px;
  height:20px;
}
.start_p{
  margin-top:14px;
}

.num{
   width:100px;
   height:20px;
}
.book_photo{
  margin-top:30px;
}
.file{
  margin-left:100px;
}
.touroku:hover{
  background-color:#CCFF00;
}
.touroku{
  text-align:center;
  padding:15px;
  border:solid;
  background-color:yellow;
  cursor:pointer;
}
</style>
<div class="top">
  <p>新しい本の設定</p>
  </div>

<span class="re-top"><a href="/main">TOPに戻る</a></span>

<div class="container">
  
  <form action="/newbook/regist" method="post" name="regist" enctype="multipart/form-data">{{csrf_field()}}
    <div class="input-lists">
      <div class="name">
     <span>本の名前</span>
      <input class="input" type="text" name="name">
       </div>
     
     <div class="start_p">
     <span>開始ページ</span>
      <input class="num" type="number" name="start">
       </div>
      
      <div class="finish_p">
     <span>終了ページ</span>
      <input class="num" type="number" name="finish">
       </div>
     
      <div class="book_photo">
     <span> ※本の写真(任意)</span>
     <span><input class="file" type="file" name="file"></span>
       </div>
      <p class="touroku" onclick="window.regist.submit()">登録</p>
      
    </div>
   </form>     
</div>
    
</div>
<script>
</script>

@endsection