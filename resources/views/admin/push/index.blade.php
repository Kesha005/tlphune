@extends('layouts.admin.app')

@section('page_name')
Bildiriş ibermek
@endsection

@section('main_section')
<div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Bildiriş iber</h5>
                        <form action="{{route('admin.push.send')}}" id="markform1" enctype="multipart/form-data" method="POST" class="row g-3">
                            @csrf

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Ady</label>
                                    <input type="text" class="form-control" id="name" placeholder="Ady" name="name">
                                </div><br>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tekst">Tekst</label>
                                    <textarea id="tekst" class="form-control"></textarea>
                                </div><br>
                            </div>

                           

                            <div class="pull-right">
                                <button type="submit" class="btn btn-outline-success btn-sm pull-right ">Iber</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection