<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\events;
use App\Models\welayat;
use Illuminate\Http\Request;

class filterapi extends Controller
{
    public function filter(Request $request)
    {
        $events = events::query();
        $events->with('shop', 'etrap')->where('status', 1)->get(['id', 'name', 'public_image', 'user_id', 'is_new', 'price', 'place', 'created_at', 'updated_at', 'mark_id', 'category_id', 'vip']);
        if ($request->mark_id != null) {

            $events->whereIn('mark_id', ($request->mark_id));

        }
        if ($request->model_name != null) {

            $events->whereIn('name', $request->model_name);

        }

        if ($request->name != null) {
            $events->where('name', 'like', $request->name);
        }

        if ($request->color_id != null) {

            $events->whereIn('color_id', $request->color_id);

        }

        if ($request->price != null) {
            if ($request->price == 'max') {
                $events->orderBy('price', 'DESC');
            } else {
                $events->orderBy('price', 'ASC');
            }

        }

        if ($request->time != null) {
            if ($request->price == 'max') {
                $events->orderBy('created_at', 'DESC');
            } else {
                $events->orderBy('created_at', 'ASC');
            }

        }

        if ($request->place != null) {

            $events->whereIn('place', $request->place);
        }

        $itemsPaginated = $events->paginate(20, ['id', 'name', 'public_image', 'user_id', 'is_new', 'price', 'place', 'created_at', 'updated_at', 'mark_id', 'category_id', 'vip']);

        $itemsTransformed = $itemsPaginated
            ->getCollection()
            ->map(function ($item) {
                if ($item->etrap) {
                    $welayat = welayat::find($item->etrap->welayat_id); $place = $welayat->name;
                } else { $place = 'Näbelli ýer';}
                return (array) ($item->toArray() + ['welayat' => $place]);
            })->toArray();

        $itemsTransformedAndPaginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $itemsTransformed,
            $itemsPaginated->total(),
            $itemsPaginated->perPage(),
            $itemsPaginated->currentPage(), [
                'path' => \Request::url(),
                'query' => [
                    'page' => $itemsPaginated->currentPage(),
                ],
            ]
        );

        return response()->json($itemsTransformedAndPaginated);
    }
}
