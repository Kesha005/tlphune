@extends('layouts.admin.app')

@section('page_name')
Şertnamany üýtget
@endsection

@section('main_section')
<section class="section">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Şertnama Goşuldy
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Üýtget</h5>
                    <form action="{{route('admin.contract.update',$contract->id)}}" enctype="multipart/form-data" id="markform" method="POST" class="row g-3">
                        @csrf
                        @method ('PUT')
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Ady</label>
                                <input type="text" class="form-control" id="name" placeholder="Ady" name="name" value="{{$contract->name}}">
                                @if($errors->has('name'))
                                <div style="color:red;">
                                    {{$errors->first('name')}}
                                </div>
                                @endif
                            </div><br>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">Tipi</label>
                                <select id="type" class="form-control" name="type">
                                <option value="vip" {{($contract->type=='vip')? 'selected': ''}}>VIP</option>
                                    <option value="shop" {{($contract->type=='shop')? 'selected': ''}}>Dükan</option>
                                    <option value="login" {{($contract->type=='login')? 'selected': ''}}>Registrasiýa we Login</option>
                                </select>
                            </div><br>
                        </div>


                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="about">Mazmuny</label>
                                <textarea class="form-control" id="about" placeholder="Mazmuny" name="text">{{$contract->text}}</textarea>
                                @if($errors->has('text'))
                                <div style="color:red;">
                                    {{$errors->first('text')}}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="text-center">
                            <a type="button" class="btn btn-outline-secondary close-btn" href="{{route('admin.contract.index')}}">Çyk</a>
                            <button type="submit" id="savemark" class="btn btn-outline-success">Goş</button>
                        </div>


                    </form>


                </div>
            </div>

        </div>
    </div>
</section>
@endsection