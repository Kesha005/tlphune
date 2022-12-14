@extends('layouts.admin.app')

@section('page_name')
Markalar
@endsection

@section('main_section')
<div>
    @include('admin.marks.create')<br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Markalar</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Suraty</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($marks as $mark)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$mark->name}}</td>
                                    <td><img src="{{ asset('storage/'.$mark->image) }}" height="70" width="70"></td>
                                    <td>
                                    <form action="{{route('admin.marks.destroy',$mark)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <a href="{{route('admin.marks.edit',$mark)}}" class="btn btn-outline-info btn-sm "><i class="bi bi-pen"></i></a>
                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
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
