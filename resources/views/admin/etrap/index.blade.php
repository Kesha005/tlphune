@extends('layouts.admin.app')

@section('page_name')

Etraplar
@endsection

@section('main_section')

<div>
@include('admin.etrap.create')<br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Etraplar</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">welaýat</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($etraps as $etrap)
                                <tr id="etrap_id{{ $etrap->id }}">
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$etrap->name}}</td>
                                    <td>{{$etrap->welayat->name}}</td>
                                    <td>
                                        <form method="POST" action="{{route('admin.etrap.destroy',$etrap->id)}}">
                                            @csrf
                                            @method('DELETE')
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