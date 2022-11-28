@extends('layouts.admin.app')

@section('page_name')
Bildiriş barada
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
                            <div class="col-lg-9 col-md-8">{{$product->name}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Suraty</div>
                            @foreach($product->image as $img)
                            <div class="col"><img src="{{ asset('storage/'.$img->image) }}" height="80" width="80"></div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Yurdy</div>
                            <div class="col-lg-9 col-md-8">{{$product->country}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Barada</div>
                            <div class="col-lg-9 col-md-8">{{$product->about}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Barada rus dili</div>
                            <div class="col-lg-9 col-md-8">{{$product->ru}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Marka</div>
                            <div class="col-lg-9 col-md-8">{{$product->mark->name ?? "Not found"}}</div>
                        </div>

                        <h5 class="card-title">Iberen hakda maglumat</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Ady</div>
                            <div class="col-lg-9 col-md-8">{{$event->user->name ?? "Not found"}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Telefon/nom</div>
                            <div class="col-lg-9 col-md-8">{{$event->user->phone ?? "Not found"}}</div>
                        </div>
                


                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
</section>
@endsection