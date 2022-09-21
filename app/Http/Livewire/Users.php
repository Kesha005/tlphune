<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $isban;
    public function render()
    {   
        $users=User::where('isban',0)->get();
        return view('livewire.users',compact('users'));
    }

    public function show($id)
    {
        $user=User::findOrFail($id);
        $this->name=$user->name;
        $this->phone=$user->phone;
        $this->isban=$user->isban;
    }

    public function ban($id)
    {
        $user=User::findOrFail($id);
        $data=['isban'=>1];
        $user->update($data);
    }
}
