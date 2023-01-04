@extends('layouts.admin.app')

@section('page_name')

Reklama
@endsection

@section('main_section')

<div>
    <a type="button" class="btn btn-outline-success" href="{{route('admin.adds.create')}}">
        <i class="bi bi-plus"></i>Täze
    </a><br><br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Reklamalar</h5>
                        <table class="table datatable" id="marktable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Ýeri</th>
                                    <th scope="col">Suraty</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody id="tbodymark">
                                @foreach($adds as $add)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$add->name}}</td>
                                    <td>{{$add->location}}</td>
                                    <td><img src="{{ asset('storage/'.$add->image) }}" height="70" width="70"></td>
                                    <td>
                                    <form action="{{route('admin.adds.destroy',$add->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <a href="{{route('admin.adds.edit',$add->id)}}" class="btn btn-outline-info btn-sm "><i class="bi bi-pen"></i></a>
                                        <button type="submit" class="btn btn-outline-danger btn-sm" id="delete_confirm"><i class="bi bi-trash"></i></button>
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

