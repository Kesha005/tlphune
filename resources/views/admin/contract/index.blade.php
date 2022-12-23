@extends('layouts.admin.app')

@section('page_name')

Şertnamalar
@endsection

@section('main_section')

<div>
<a type="button" class="btn btn-outline-success" href="{{route('admin.contract.create')}}" >
    <i class="bi bi-plus"></i>Täze
</a><br><br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Şertnamalar</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Goýulan wagty</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contracts as $contract)
                                <tr class="us{{$contract->id}}">
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$contract->name}}</td>
                                    <td>{{$contract->created_at}}</td>
                                    <td>

                                        <div class="row">
                                            <div class=" col-md-2 col-lg-1 col-xs-1">
                                                <form method="post" action="{{route('admin.contract.destroy',[$contract])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a  class="btn btn-outline-info btn-sm" href="{{route('admin.contract.show',$contract->id)}}"><i class="bi bi-eye"></i></a>
                                                    <a  class="btn btn-outline-warning btn-sm" href="{{route('admin.contract.edit',$contract->id)}}"><i class="bi bi-pen"></i></a>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>

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