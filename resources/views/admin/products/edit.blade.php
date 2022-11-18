@extends('layouts.admin.app')

@section('page_name')
Model {{$product->name}}
@endsection

@section('main_section')
<div>
   
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                    <h5 class="card-title">Üýtget</h5>
                    <form action="{{route('admin.products.update',$product->id)}}"  id="markform1" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Ady</label>
                        <input type="text" class="form-control" id="name" placeholder="Ady" name="name">
                    </div><br>

                    <div class="form-group">
                    <label for="category">Kategoriýa</label>
                        <select name="category_id" class="form-control" id="category_id">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}"  {{($category->id==$product->category_id) ? 'selected' : ''}}   class="form-control">{{$category->tm}}</option>
                            @endforeach
                        </select>
                    </div><br>

                    <div class="form-group">
                    <label for="mark_id">Marka</label>
                        <select name="mark_id" class="form-control" id="mark_id">
                            @foreach($marks as $mark)
                            <option value="{{$mark->id}}" class="form-control" {{($mark->id==$product->mark_id)? 'selected': ''}}>{{$mark->name}}</option>
                            @endforeach
                        </select>
                    </div><br>


                    


                    <div class="form-group">
                        <label for="country">Ýurt</label>
                        <input type="text" class="form-control" id="country" placeholder="Yurt" name="country" value="{{$product->country}}">
                    </div><br>

                    <div class="form-group">
                        <label for="about">Barada</label>
                        <textarea  class="form-control" id="about" placeholder="Barada" name="about" value="{{$product->tm}}"></textarea>
                    </div><br>

                    <div class="form-group">
                        <label for="about1">Barada Rus dili</label>
                        <textarea  class="form-control" id="about1" placeholder="Barada rus" name="ru" value="{{$product->ru}}"></textarea>
                    </div><br>

                    <div class="form-group">
                        <label for="about2">Barada Iňlis dili</label>
                        <textarea  class="form-control" id="about2" placeholder="Barada inlis" name="en" value="{{$product->en}}"></textarea>
                    </div><br>

                    <div class="form-group">
                        <label for="mimage1">Esasy Surat</label>
                        <input type="file" class="form-control" id="mimage1" name="public_image" placeholder="Surat">
                    </div>
                    <br><img src="{{ asset('storage/'.$mark->image) }}" height="100" width="100"  />
                </div>
                
                <button type="submit"  class="btn btn-outline-success ">Üýtget</button>
            </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection