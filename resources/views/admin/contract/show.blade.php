@extends('layouts.admin.app')

@section('page_name')
Şertnama barada
@endsection

@section('main_section')
<section class="section profile">
    <div class="row">

    </div>

    <div class="col-xl-12">

        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Şertanama barada</button>
                    </li>

                    <li class="nav-item">
                        <form action="{{route('admin.contract.destroy',$contract)}}" method="post">
                            @csrf
                            @method('DELETE')
                             <button type="submit" class="btn btn-outline-danger">Poz</button>
                        </form>
                       
                    </li>


                </ul>
                <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                        <h5 class="card-title">Şertanama hakda maglumat</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Ady</div>
                            <div class="col-lg-9 col-md-8">{{$contract->name}}</div>
                        </div>

                        
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Tipi</div>
                            <div class="col-lg-9 col-md-8">{{$contract->type}}</div>
                        </div>


                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Mazmuny</div>
                            <div class="col-lg-9 col-md-8">{{$contract->text}}</div>
                        </div>
                        


                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
</section>
@endsection