<?php

namespace App\Http\Controllers;
use illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
  public function index()
  {
    return view("login.index");
  }
  public function regist(Request $p)
  {
    $chk=User::where("mail",$p->mail)->where("pass",$p->pass)->first();
    if($chk == null){
      $rec = new User;
      $rec->name= $p->name;
      $rec->mail=$p->mail;
      $rec->pass=$p->pass;
      $rec->save();
      \Cookie::queue("userid",$rec->id);
      \Cookie::queue("username",$rec->name);
      return redirect("/main");
    }
    return redirect("/login");
  }
  public function login(Request $p)
  {
    $chk=User::where("mail",$p->log_mail)->where("pass",$p->log_pass)->first();
    if($chk == null){
      return redirect("/login");
    }
    \Cookie::queue("userid",$chk->id);
    \Cookie::queue("username",$chk->name);
    return redirect("/main");
  }
}