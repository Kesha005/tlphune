@extends('layouts.admin.app')

@section('page_name')
Etrap 
@endsection

@section('main_section')
<div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Üýtget</h5>
                        <form action="{{route('admin.etrap.update',$etrap->id)}}" id="markform1" enctype="multipart/form-data" method="POST" class="row g-3">
                            @method('PUT')
                            @csrf

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Ady</label>
                                    <input type="text" class="form-control" id="name" placeholder="Ady" name="name" value="{{$etrap->name}}">
                                </div><br>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">Welaýat</label>
                                    <select name="welayat_id" class="form-control" id="category_id">
                                        @foreach($welayats as $welayat)
                                        <option value="{{$welayat->id}}" {{($welayat->id==$etrap->welayat_id) ? 'selected' : ''}} class="form-control">{{$welayat->name}}</option>
                                        @endforeach
                                    </select>
                                </div><br>
                            </div>

                           

                            <div class="pull-right">
                                <button type="submit" class="btn btn-outline-success btn-sm pull-right ">Üýtget</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection