@extends('layouts.admin.app')

@section('page_name')
Bildiriş barada
@endsection

@section('main_section')
<section class="section profile">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Vertical Pills Tabs</h5>

                <!-- Vertical Pills Tabs -->
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @if($about!=null)
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"  aria-selected="true" >Maglumat</button>
                        @endif
                        @if($about!=null)
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"}}>Üýtget</button>
                        @endif
                        @if($about==null)
                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"    aria-selected="false"}}>Döret</button>
                        @endif
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <form action="{{route('admin.about.update' $about->)}}" id="markform1" enctype="multipart/form-data" method="POST" class="row g-3">
                                @csrf

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Ady</label>
                                        <input type="text" class="form-control" id="name" placeholder="Ady" name="name" value="{{$about->name}}">
                                    </div><br>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="about">Barada</label>
                                        <textarea class="form-control" id="about" placeholder="Barada" name="about" value="{{$about->text}}">{{$about->text}}</textarea>
                                    </div><br>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-outline-success btn-sm pull-right ">Üýtget</button>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <form action="{{route('admin.about.create')}}" id="markform1" enctype="multipart/form-data" method="POST" class="row g-3">
                                @csrf
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Ady</label>
                                        <input type="text" class="form-control" id="name" placeholder="Ady" name="name" >
                                    </div><br>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="about">Barada</label>
                                        <textarea class="form-control" id="about" placeholder="Barada" name="text"></textarea>
                                    </div><br>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-outline-success btn-sm pull-right ">Goş</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
</section>
@endsection