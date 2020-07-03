<?php

namespace App\Http\Controllers;
use illuminate\Http\Request;
use App\Readbook;

class NewbookController extends Controller
{
  public function index()
  {
    return view("newbook.index");
  }
  public function regist(Request $p)
  {
    $user=\Cookie::get("userid");
    $book= new Readbook;
    $book->mail = $user;
    $book->reading = $p->name;
    $book->pages = (string)(((int)$p->finish)-((int)$p->start) +1 );
    $book->now_pages = 0;
    if($_FILES["file"]){
      $tmpfile = $_FILES["file"]["tmp_name"];
      $savefile = \Cookie::get("userid")."__book__".$_FILES["file"]["name"];
      move_uploaded_file($tmpfile,public_path()."/".$savefile);
      $book->image = $savefile;
    }
    $book->save();
    return redirect("/main");
  }
}
