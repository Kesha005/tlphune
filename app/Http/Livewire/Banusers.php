<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class Banusers extends Component
{
    public $users;
    public function render()
    {   
        $this->users=User::where('isban',1)->get();
        return view('livewire.banusers');
    }

    public function show($id)
    {
        $user=User::findOrFail($id);
        $this->phone=$user->phone;
        $this->isban=$user->isban;
    }

    public function delban($id)
    {
        $user=User::findOrFail($id);
        $data=['isban'=>0];
        $user->update($data);
    }
}
