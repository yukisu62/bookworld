<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;


class KirokuController extends Controller
{
  public function index(Request $r){
  
   
    return view("kiroku.index",["book"=>$r->book,"page"=>$r->page]);
  }
}

