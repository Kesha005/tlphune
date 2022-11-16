@extends('layouts.admin.app')

@section('page_name')
Model barada
@endsection

@section('main_section')
<section class="section profile">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">Maglumat</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Ady</div>
                            <div class="col-lg-9 col-md-8">{{$model->name}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Suraty</div>
                            @foreach($model->image as $img)
                            <div class="col"><img src="{{ asset('storage/'.$img->image) }}" height="80" width="80"></div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Yurdy</div>
                            <div class="col-lg-9 col-md-8">{{$model->country}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Barada</div>
                            <div class="col-lg-9 col-md-8">{{$model->about}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Barada rus dili</div>
                            <div class="col-lg-9 col-md-8">{{$model->ru}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Barada iňlis dili</div>
                            <div class="col-lg-9 col-md-8">{{$model->en}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Marka</div>
                            <div class="col-lg-9 col-md-8">{{$model->mark->name ?? "Not found"}}</div>
                        </div>

                


                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
</section>
@endsection