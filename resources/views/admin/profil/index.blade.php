@extends('layouts.admin.app')

@section('page_name')

Profil
@endsection

@section('main_section')

<div>
    <section class="section profile">
       
  
          <div class="col-xl-12">
  
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">
  
                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Umumy</button>
                  </li>
  
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Üýtget</button>
                  </li>
  
  
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Açar sözi üýtget</button>
                  </li>
  
                </ul>
                <div class="tab-content pt-2">
  
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">Admin hakda maglumat</h5>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Ady</div>
                      <div class="col-lg-9 col-md-8">{{$user->name}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                    </div>
  
                  </div>
  
                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
  
                    <!-- Profile Edit Form -->
                    <form  action="{{route('admin.profile.update',$user)}}" method="post" >
                        @csrf
                        @method('PUT')
                       @if(session('status'))

                       <div class="alert alert-success">
                        {{session('status')}}
                       </div>

                       @elseif(session('error'))

                       <div class="alert alert-danger">
                        {{session('error')}}
                       </div>
                       @endif

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Ady</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="name" type="text" class="form-control" id="fullName" value="{{$user->name}}">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="email" class="form-control" id="Email" value="{{$user->email}}">
                        </div>
                      </div>
  
  
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Üýtget</button>
                      </div>
                    </form>
  
                  </div>
  
                
  
                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form method="post" action="{{route('admin.profile.update.password',$user)}}">
                        @csrf
                        @method('PUT')
  
                      <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Häzirki açar sözi</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Täze açar sözi</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                      </div>
  
  
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Üýtget</button>
                      </div>
                    </form><!-- End Change Password Form -->
  
                  </div>
  
                </div><!-- End Bordered Tabs -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
</div>
@endsection