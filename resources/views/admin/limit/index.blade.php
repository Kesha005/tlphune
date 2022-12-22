@extends('layouts.admin.app')

@section('page_name')
Bildirişlere limit ber
@endsection

@section('main_section')
<div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Limit ber</h5>
                        @if($limit==null)
                        <form action="{{route('admin.limit.store')}}" id="markform1" enctype="multipart/form-data" method="POST" class="row g-3">
                            @csrf

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Günlük bildiriş  sany</label>
                                    <input type="text" class="form-control" id="name" placeholder="limit bahasy" name="limit">
                                </div><br>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-outline-success btn-sm pull-right ">Iber</button>
                            </div>
                        </form>
                        @else

                       @include('admin.limit.edit')
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection