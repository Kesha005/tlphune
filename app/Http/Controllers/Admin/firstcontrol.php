<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\events;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class firstcontrol extends Controller
{
    public function index()
    {
        return view('admin.index');
    }


    private function GetYears()
    {
        $query = DB::select("SELECT COUNT(id) as coun,year(events.created_at) as year FROM events GROUP BY year;");
        return $query;
    }

    private function GetDaysCountInMonth()
    {
        return date('t');
    }

    private function GetViewsData($year)
    {
        $month = date('m');
        $day = date('d');

        $data = DB::select("SELECT 
        (SELECT COUNT(id) FROM events WHERE year(events.created_at ) =  $year) as this_year, 
        (SELECT COUNT(id) FROM events WHERE month(events.created_at) = $month) as this_month, 
        (SELECT COUNT(id) FROM events WHERE day(events.created_at) = $day) as this_day;");
        return $data;
    }

    private function GetYearViewsData($year)
    {
        $months_views = DB::select("SELECT month(events.created_at) as date_id, COUNT(events.id) as countt FROM events WHERE year(events.created_at) = $year GROUP BY date_id;");
        return $this->GetViewsCount(12, $months_views);
    }

    private function GetMonthViewsData($year)
    {
        $month = date('m');

        $query = DB::select("SELECT day(events.created_at) as date_id, 
        COUNT(events.id) as countt FROM events WHERE year(events.created_at) = $year and month(events.created_at) = $month GROUP BY date_id;");

        return $this->GetViewsCount(date('t'), $query);
    }

    private function GetViewsCount($items, $views, $num = 0)
    {
        $views_data = [];

        foreach (range(1, $items) as $id) {
            $views_data[$id] = 0;
        }

        foreach ($views as $view) {
            $views_data[$view->date_id + $num] = $view->countt;
        }

        return $views_data;
    }
    public function index1()
    {
        $year = date('Y');
        $data = $this->GetViewsData($year);
        $year_views_data = $this->GetYearViewsData($year);
        $month_views_data = $this->GetMonthViewsData($year);

        $years = $this->GetYears();

        $CountMonthDays = $this->GetDaysCountInMonth();

        return  $data;
        // return Voyager::view('voyager::index', compact('data', 'month_views_data', 'year_views_data', 'CountMonthDays', 'years', 'week_views_data'));
    }
}
