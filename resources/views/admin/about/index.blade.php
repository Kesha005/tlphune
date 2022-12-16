@extends('layouts.admin.app')

@section('page_name')
Dörediji  barada
@endsection

@section('main_section')
<section class="section profile">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dörediji barada maglumat</h5>

                <!-- Vertical Pills Tabs -->
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Maglumat</button>

                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" }}>Üýtget</button>

                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false" }}>Döret</button>

                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            @if(($about->text)!=null))
                            {{$about->text}}
                            @else
                            Maglumat ýok
                            @endif
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            @if(($about->text)!=null)
                            @include('admin.about.edit')
                            @else
                            Maglumat giriziň
                            @endif
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            @if(($about->text)==null)
                            @include('admin.about.create')
                            @else
                            Maglumat girizilen üýtgedip bilersiňiz
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
</section>
@endsection