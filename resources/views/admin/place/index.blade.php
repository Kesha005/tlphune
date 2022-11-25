@extends('layouts.admin.app')

@section('page_name')

Welaýatlar
@endsection

@section('main_section')

<div>
@include('admin.place.create')<br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Welaýatlar</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($welayats as $welayat)
                                <tr id="welayat_id{{ $welayat->id }}">
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$welayat->name}}</td>
                                    <td>
                                        <form method="POST" action="{{route('admin.place.destroy',$welayat->id)}}">
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