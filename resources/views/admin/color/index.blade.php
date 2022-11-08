@extends('layouts.admin.app')

@section('page_name')
Reňkler
@endsection

@section('main_section')
<div>
    @include('admin.color.create')<br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Reňkler</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Reňk</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($colors as $color)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$color->name}}</td>
                                    <td>{{$color->name}}</td>
                                    <td>
                                    <form action="{{route('admin.color.destroy',$color)}}" method="POST">
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