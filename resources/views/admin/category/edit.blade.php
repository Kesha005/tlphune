@extends('layouts.admin.app')

@section('page_name')
Markalar
@endsection
@section('main_section')
<div>
   
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                    <h5 class="card-title">Üýtget</h5>
                    <form action="{{route('admin.categories.update',$category)}}"  id="markform1" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mname1">TM</label>
                        <input type="text" class="form-control" id="mname1" placeholder="Ady" name="tm" value="{{$category->name}}">
                    </div><br>

                    <div class="form-group">
                        <label for="mname2">EN</label>
                        <input type="text" class="form-control" id="mname2" placeholder="EN" name="en" value="{{$category->en}}">
                    </div><br>

                    <div class="form-group">
                        <label for="mname3">RU</label>
                        <input type="text" class="form-control" id="mname3" placeholder="RU" name="ru" value="{{$category->ru}}">
                    </div><br>

                    <div class="form-group">
                        <label for="mimage1">Surat</label>
                        <input type="file" class="form-control" id="mimage1" name="image" placeholder="Surat" value="{{asset('storage/'.$category->image)}}">
                    </div>
                    <br><img src="{{ asset('storage/'.$category->image) }}" height="100" width="100"  />
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