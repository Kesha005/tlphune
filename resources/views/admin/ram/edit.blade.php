@extends('layouts.admin.app')

@section('page_name')
Ram
@endsection

@section('main_section')
<div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Üýtget</h5>
                        <form action="{{route('admin.ram.update',$ram->id)}}" id="markform1" enctype="multipart/form-data" method="POST" class="row g-3">
                            @method('PUT')
                            @csrf

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Ady(Tipi)</label>
                                    <input type="text" class="form-control" id="name" placeholder="Ady" name="type" value="{{$ram->type}}">
                                </div><br>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="size">Ululygy</label>
                                    <input type="text" class="form-control" id="size" placeholder="Ululygy" name="size" value="{{$ram->size}}">
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