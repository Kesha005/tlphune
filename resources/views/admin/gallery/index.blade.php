@extends('layouts.admin.app')

@section('page_name')

Galereýa
@endsection

@section('main_section')

<div>
    @include('admin.gallery.create')<br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Galereýa</h5>
                        <table class="table datatable" id="marktable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Suraty</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody id="tbodymark">
                                @foreach($images as $image)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td><img src="{{ asset('storage/'.$image->image) }}" height="70" width="70"></td>
                                    <td>
                                    <form action="{{route('admin.gallery.destroy',$image)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
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

