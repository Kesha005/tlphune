@extends('layouts.admin.app')

@section('page_name')

Modeller
@endsection

@section('main_section')

<div>
    @include('admin.products.create')<br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Modeller</h5>
                        <table class="table datatable" id="marktable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Suraty</th>
                                    <th scope="col">Kategoriýa</th>
                                    <th scope="col">Marka </th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody id="tbodymark">
                                @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$product->name}}</td>
                                    <td><img src="{{ asset('storage/'.$product->image[0]) }}" height="70" width="70"></td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->mark->name}}</td>
                                    <td>
                                    <form action="{{route('admin.products.destroy',$product)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('admin.products.show',$product)}}" class="btn btn-outline-info btn-sm "><i class="bi bi-eye"></i></a>
                                        <a href="{{route('admin.products.edit',$product)}}" class="btn btn-outline-warning btn-sm "><i class="bi bi-pen"></i></a>
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
