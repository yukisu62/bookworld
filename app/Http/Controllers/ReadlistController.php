<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Readbook;
use App\Main;
use App\User;

class ReadlistController extends Controller
{
  public function index()
  {
    $rb = Readbook::where("mail",\Cookie::get("userid"))->get();
    return view("readlist.index",["rb"=>$rb]);
  }

  public function regist(Request $r)
  {
    $rb = Readbook::where("mail",\Cookie::get("userid"))->where("reading", $r->bookname)->first();
    $rb->now_pages += intval($r->start);
    $rb->save();
    $date = date("Y/m/d");
    $main = Main::where("mail",\Cookie::get("userid")) -> where("r_day", $date)->first();
    if($main == null){
      $main = new Main;
    }
    $main -> mail = \Cookie::get("userid");
    $main -> r_day = $date;
    $main -> save();
    $user = User::where("id",\Cookie::get("userid")) ->first();
    $user -> b_point = intval($r->start);
    $user -> save();

    return redirect("/kiroku?book=".$rb->reading."&page=".$r->start);
  }
}
