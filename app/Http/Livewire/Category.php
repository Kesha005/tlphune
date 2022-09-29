<?php

namespace App\Http\Livewire;

use App\Models\category as ModelsCategory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Category extends Component
{
    use WithFileUploads;
    public $categories,$name,$image,$category_id;

    public function render()
    {
        $this->categories=ModelsCategory::all();
        return view('livewire.category');
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
        ModelsCategory::create($validateddata);
        $this->resetinput();
        session()->flash('message','Bölüm döredildi');
    }

    public function delete($id)
    {
        if ($id) {
           $img=ModelsCategory::find($id)->pluck('image');
           foreach($img as $i)
           {
                File::delete('storage/'.$i);
           }
            ModelsCategory::destroy($id);
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }

    public function cancel()
    {
        $this->resetinput();
    }

    public function edit($id)
    {
        $category=ModelsCategory::findOrFail($id);
        $this->category_id=$category->id;
        $this->name=$category->name;
        $this->image=$category->image;
    }

    public function update()
    {
        $validateddata=$this->validate([
            'name'=>'required',
            'image'=>'required',
        ]);
        $category=ModelsCategory::find($this->category_id);
        $data=['name'=>$this->name,'image'=>is_file($this->image) ?$this->image->store('files', 'public'): $category->image ];
        $category->update($data);
    }
}
