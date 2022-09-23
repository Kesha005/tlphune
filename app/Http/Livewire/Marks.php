<?php

namespace App\Http\Livewire;

use App\Models\marks as ModelsMarks;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Marks extends Component
{
    use WithFileUploads;

    public $name,$image,$mark_id;

    public function render()
    {
        $marks=ModelsMarks::all();
        return view('livewire.marks',compact('marks'));
    }

    private function resetinput()
    {
        $this->name='';
        $this->image='';
    }

    public function submit()
    {
        $validateddata=$this->validate(['name'=>'required','image'=>'required']);
        $validateddata['image'] = $this->image->store('files', 'public');
        ModelsMarks::create($validateddata);
        $this->resetinput();
        session()->flash('message','Marka döredildi');
    }

    public function delete($id)
    {
        if ($id) {
           $img=ModelsMarks::find($id)->pluck('image');
           foreach($img as $i)
           {
                File::delete('storage/'.$i);
           }
           ModelsMarks::destroy($id);
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }

    public function cancel()
    {
        $this->resetinput();
    }

    public function edit($id)
    {
        $mark=ModelsMarks::findOrFail($id);
        $this->mark_id=$mark->id;
        $this->name=$mark->name;
        $this->image=$mark->image;
    }

    public function update()
    {
        $validateddata=$this->validate([
            'name'=>'required',
            'image'=>'required',
        ]);
        $mark=ModelsMarks::find($this->mark_id);
        $data=['name'=>$this->name,'image'=>is_file($this->image) ?$this->image->store('files', 'public'): $mark->image ];
        $mark->update($data);
    }
}
