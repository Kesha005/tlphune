@extends('layouts.admin.app')

@section('page_name')
Model
@endsection

@section('main_section')
<section class="section">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Haryt Goşuldy
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Täze model goş</h5>
                    <form action="{{route('admin.products.store')}}" enctype="multipart/form-data" id="markform" method="POST" class="row g-3">
                        @csrf

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Ady</label>
                                <input type="text" class="form-control" id="name" placeholder="Ady" name="name" value="{{old('name')}}">
                                @if($errors->has('name'))
                                <div style="color:red;">
                                    {{$errors->first('name')}}
                                </div> 
                                @endif
                            </div><br>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image">Surat</label>
                                <input type="file" class="form-control" id="image" name="image[]" placeholder="Surat" multiple>
                                @if($errors->has('image'))
                                <div style="color:red;">
                                    {{$errors->first('image')}}
                                </div> 
                                @endif
                            </div>
                        </div>




                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category">Kategoriýa</label>
                                <select name="category_id" class="form-control" id="category">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" class="form-control">{{$category->tm}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="mark_id">Marka</label>
                                <select name="mark_id" class="form-control" id="mark_id">
                                    @foreach($marks as $mark)
                                    <option value="{{$mark->id}}" class="form-control">{{$mark->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="country">Ýurt</label>
                                <input type="text" class="form-control" id="country" placeholder="Yurt" name="country" value="{{old('country')}}">
                                @if($errors->has('country'))
                                <div style="color:red;">
                                    {{$errors->first('country')}}
                                </div> 
                                @endif
                            </div>
                        </div>



                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="about">Barada TM</label>
                                <textarea class="form-control" id="about" placeholder="Barada" name="about">{{old('about')}}</textarea>
                                @if($errors->has('about'))
                                <div style="color:red;">
                                    {{$errors->first('about')}}
                                </div> 
                                @endif
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="about1">Barada Rus dili</label>
                                <textarea class="form-control" id="about1" placeholder="Barada rus" name="ru">{{old('ru')}}</textarea>
                                @if($errors->has('ru'))
                                <div style="color:red;">
                                    {{$errors->first('ru')}}
                                </div> 
                                @endif
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="color_id">Reňk</label>
                                <select name="color[]" class="form-control" size="8" id="color_id" multiple>
                                    @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->tm}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('color'))
                                <div style="color:red;">
                                    {{$errors->first('color')}}
                                </div> 
                                @endif
                            </div>
                        </div>


                        <div class="text-center">
                            <a type="button" class="btn btn-outline-secondary close-btn" href="{{route('admin.products.index')}}">Çyk</a>
                            <button type="submit" id="savemark" class="btn btn-outline-success">Goş</button>
                        </div>


                    </form>


                </div>
            </div>

        </div>
    </div>
</section>
@endsection