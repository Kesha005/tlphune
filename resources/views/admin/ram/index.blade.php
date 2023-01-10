@extends('layouts.admin.app')

@section('page_name')

Ramlar
@endsection

@section('main_section')

<div>
    <a type="button" class="btn btn-outline-success" href="{{route('admin.ram.create')}}">
        <i class="bi bi-plus"></i>Täze
    </a><br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Ramlar</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady(Tipi)</th>
                                    <th scope="col">Ululygy</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rams as $ram)
                                <tr id="etrap_id{{ $ram->id }}">
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$ram->type}}</td>
                                    <td>{{$ram->size}}</td>
                                    <td>
                                        <form method="POST" action="{{route('admin.ram.destroy',$ram->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('admin.ram.edit',$ram->id)}}" class="btn btn-outline-warning btn-sm "><i class="bi bi-pen"></i></a>
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

<script>

</script>
@endsection