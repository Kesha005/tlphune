@extends('layouts.admin.app')

@section('page_name')

Bölümler
@endsection

@section('main_section')

<div>
    @include('admin.category.create')<br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Bölümler</h5>
                        <table class="table datatable" id="marktable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Suraty</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody id="tbodymark">
                                @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$category->name}}</td>
                                    <td><img src="{{ asset('storage/'.$category->image) }}" height="70" width="70"></td>
                                    <td>
                                    <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <a href="{{route('admin.categories.edit',$category)}}" class="btn btn-outline-info btn-sm "><i class="bi bi-pen"></i></a>
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

