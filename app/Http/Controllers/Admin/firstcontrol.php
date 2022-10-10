<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\events;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class firstcontrol extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    
   public function year()
   {
       $users=User::whereYear('created_at', date('Y'))->get();
       $events=events::whereYear('created_at',date('Y'))->get();
       return response()->json($users,$events);
   }

   public function month()
   {

   }
}






// DB::select("SELECT COUNT(id) as coun,year(views.updated_at) as
// year FROM views GROUP BY year;");


//  $month = date('m');
//  $year = date('y');
//   DB::select("SELECT day(views.updated_at) as date_id, 
//   COUNT(views.id) as countt FROM views 
//   WHERE year(views.updated_at) = $year 
//   and month(views.updated_at) = $month GROUP BY date_id;");






// private function GetViewsCount($items, $views, $num = 0)
//     {
//         $views_data = [];

//         foreach (range(1, $items) as $id) {
//             $views_data[$id] = 0;
//         }

//         foreach ($views as $view) {
//             $views_data[$view->date_id + $num] = $view->countt;
//         }

//         return $views_data;
//     }