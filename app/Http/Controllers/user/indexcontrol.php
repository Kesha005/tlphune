<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\events;
use App\Models\marks;
use App\Models\shopproducts;
use App\Models\shops;
use Illuminate\Http\Request;

class indexcontrol extends Controller
{
    
    public function index()
    {
        $categories=category::all();
        $events=events::latest(20)->get();
    }

    public function category($id)
    {
        $events=events::with('user','category','mark')->where('category_id',$id)->paginate(20);
    }

    public function event($id)
    {
        $event=events::with('user','category','mark')->where('id',$id)->get();
    }
    public function marks()
    {
        $marks=marks::all();
    }

    public function mark($id)
    {
        $mark_events=events::with('mark','user','category')->where('mark_id',$id)->get();
    }

    public function shops()
    {
        $shops=shops::all();
    }

    public function shop($id)
    {
        $shop=shopproducts::with('products','c_products','shop')->where('shop_id',$id)->get();
    }


}
