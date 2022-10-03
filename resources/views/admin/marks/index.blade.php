@extends('layouts.admin.app')

@section('page_name')
Markalar
@endsection

@section('main_section')
<div>
    @include('admin.marks.create')<br>
<<<<<<< HEAD
    @include('admin.marks.edit')
=======
>>>>>>> a28ae097858eb3651dc13d450a3cb7693ae1c766
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Markalar</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
<<<<<<< HEAD
                                    <th scope="col">ID</th>
=======
                                    <th scope="col">No</th>
>>>>>>> a28ae097858eb3651dc13d450a3cb7693ae1c766
                                    <th scope="col">Ady</th>
                                    <th scope="col">Suraty</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($marks as $mark)
                                <tr>
<<<<<<< HEAD
                                    <th scope="row">{{$mark->id}}</th>
                                    <td>{{$mark->name}}</td>
                                    <td><img src="{{ asset('storage/'.$mark->image) }}" height="70" width="70"></td>
                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <button  data-bs-toggle="modal" data-bs-target="#cedit" wire:click="edit({{ $mark->id }})" class="btn btn-outline-info btn-sm"><i class="bi bi-pen"></i></button>
                                        <button data-id="{{ $mark->id }}" id="deletemark" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
=======
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
>>>>>>> a28ae097858eb3651dc13d450a3cb7693ae1c766
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
<<<<<<< HEAD
<script>
$("#deletemark").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "users/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
        }
    });
   
});
</script>
=======
>>>>>>> a28ae097858eb3651dc13d450a3cb7693ae1c766
