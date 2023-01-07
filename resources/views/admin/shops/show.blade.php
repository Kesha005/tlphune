@extends('layouts.admin.app')

@section('page_name')
Dükan barada
@endsection

@section('main_section')
<section class="section profile">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Dükan barada</button>
                    </li>

                    <li class="nav-item">
                        <form action="{{route('admin.shops.destroy',$shop->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Poz</button>
                        </form>

                    </li>


                </ul>
                <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">Maglumat</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Ady</div>
                            <div class="col-lg-9 col-md-8">{{$shop->name}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Suraty</div>
                            @foreach($shop->images as $img)
                            <div class="col"><img src="{{ asset('storage/'.$img->image) }}" height="80" width="80"></div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Ýeri</div>
                            <div class="col-lg-9 col-md-8">{{$shop->etrap->name}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Barada</div>
                            <div class="col-lg-9 col-md-8">{{$shop->about}}</div>
                        </div>


                        <h5 class="card-title">Iberen hakda maglumat</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Ady</div>
                            <div class="col-lg-9 col-md-8">{{$shop->user->name ?? "Not found"}}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Telefon/nom</div>
                            <div class="col-lg-9 col-md-8">{{$shop->user->phone ?? "Not found"}}</div>
                        </div>



                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Goýulan wagty</div>
                            <div class="col-lg-9 col-md-8">{{$shop->created_at}}</div>
                        </div>


                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Tassyklanan wagty</div>
                            <div class="col-lg-9 col-md-8">{{$shop->updated_at==$shop->created_at ? "Tassyklanmadyk" : $shop->updated_at}}</div>
                        </div>


                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
</section>
@endsection