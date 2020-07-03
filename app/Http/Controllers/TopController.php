<?php

namespace App\Http\Controllers;

class TopController extends Controller
{
  public function index()
  {
    if(\Cookie::get("userid") != null )
    {
       return redirect("/main");
    }
    return view("top.index");
  }
}