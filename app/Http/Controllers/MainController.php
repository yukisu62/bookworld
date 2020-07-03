<?php

namespace App\Http\Controllers;
use App\Main;
use App\Readbook;
use App\User;

class MainController extends Controller
{
  public function index()
  {
    $main = Main::where("mail",\Cookie::get("userid")) -> orderBy("r_day" , "desc") -> get();
    $last = Main::where("mail",\Cookie::get("userid")) -> orderBy("r_day" , "desc") -> first();
    $l_date = date("Y-m-d",strtotime( str_replace("/","-",$last->r_day)));
    $user = User::where("id",\Cookie::get("userid")) -> first();
    $b_point = $user->b_point;


    $dd = 0;
    $point = 0;
    $ddpoint = 0;

//ボーナスポイント計算。連続読書日数に応じて計算
    $now_date = date("Y-m-d");
    
    foreach($main as $item){
      if(str_replace("-","/",$now_date) == $item -> r_day){
        $dd++;
      }else{
      break;
        
      }
      if($dd == 2){
        $point+= 5;
      }else if($dd == 3){
        $point+= 10;
      }else if($dd  <= 10 && $dd > 3 ){
        $point+= 20;
      }else if($dd <= 30 && $dd > 10){
        $point+= 50;
      }else if($dd >= 100 && $dd > 30){
        $point+= 100;
      }
      
    $now_date = date("Y-m-d",strtotime("-1 day",strtotime($now_date)));
    
    }
    $ddpoint = $point;


    


    //合計ポイントによってステージ遷移
    $rb = Readbook::where("mail",\Cookie::get("userid")) -> get();
    foreach($rb as $item){
      $point+= $item->now_pages;
    }
    if($point <= 100){
      $next_point = 100 - $point;
      $stage = 1;
    }else if($point <= 1000){
      $next_point = 1000 - $point;
      $stage = 2;
    }else if($point <= 2500){
      $next_point = 2500 - $point;
      $stage = 3;
    }else if($point <= 5000){
      $next_point = 5000 - $point;
      $stage = 4;
    }else if($point <= 10000){
      $next_point = 10000 - $point;
      $stage = 5;
    }
    return view("main.index",["last" => $last,"point"=> $point,"next_point" => $next_point, "stage" => $stage, "dd" => $dd,"ddpoint"=>$ddpoint,"b_point"=>$b_point] );

  }
}