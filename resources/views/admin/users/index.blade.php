@extends('layouts.admin.app')

@section('page_name')

Ulanyjylar
@endsection

@section('main_section')

<div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Ulanyjylar</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomeri</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        <a href="{{route('admin.users.ban',$user)}}" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection