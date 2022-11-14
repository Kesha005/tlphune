<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\c_shopproducts;
use App\Models\events;
use App\Models\shopproducts;
use App\Models\shops;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class usercontrol extends Controller
{

    public function index()
    {
        $users = User::where('isban', 0)->where('role','user')->get();
        return view('admin.users.index', compact('users'));
    }

    public function banuser()
    {
        $users = User::where('isban', 1)->get();
        return view('admin.banuser.index', compact('users'));
    }

    public function ban(User $user)
    {
        $data = ['isban' => 1];
        $user->update($data);
        return redirect()->route('admin.users.index');
    }

    public function delban(User $user)
    {
        $data = ['isban' => 0];
        $user->update($data);

        return redirect()->route('admin.users.banuser');
    }

    public function destroy(User $user)
    {
        $id = $user->id;
        $this->delete_user_data($id);
        $user->delete();
        return redirect()->route('admin.users.banuser');
    }


    public function delete_user_data($id)
    {
        $shop_id = shops::where('user_id', $id)->get();
        $this->DeleteDate(events::class, $id, 'user_id');
        $this->DeleteDate(shops::class, $id, 'user_id');
        if (count($shop_id) != 0) {
            $this->DeleteDate(c_shopproducts::class, $shop_id, 'shop_id');
            $this->DeleteDate(shopproducts::class, $shop_id, 'shop_id');
        }

        Storage::deleteDirectory("public/users/$id");
    }


    protected function DeleteDate($model, $id, $column = null)
    {
        if (!$model && !$id) return false;
        $column = $column ?? 'id';
        $model::where($column, $id)->delete();
        return redirect()->route('admin.users.banuser');
    }
}
