@extends('layouts.admin.app')

@section('page_name')

Gadagan edilen ulanyjylar
@endsection

@section('main_section')

<div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Gadagan edilen ulanyjylar</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Telefon/nom</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        <form method="post" action="{{route('admin.users.destroy',$user)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            <a class="btn btn-outline-success btn-sm"><i class="bi bi-check"></i></a>
                                        </form>
                                        
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