@extends('layouts.admin.app')

@section('page_name')

Ramlar
@endsection

@section('main_section')

<div>
    <a type="button" class="btn btn-outline-success" href="{{route('admin.memory.create')}}">
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
                                @foreach($memories as $memory)
                                <tr id="etrap_id{{ $memory->id }}">
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$memory->type}}</td>
                                    <td>{{$memory->size}}</td>
                                    <td>
                                        <form method="POST" action="{{route('admin.memory.destroy',$memory->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('admin.memory.edit',$memory->id)}}"
                                                class="btn btn-outline-warning btn-sm "><i class="bi bi-pen"></i></a>
                                            <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                                    class="bi bi-trash"></i></button>
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