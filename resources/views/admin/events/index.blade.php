@extends('layouts.admin.app')

@section('page_name')
Bildirişler
@endsection

@section('main_section')
<div>
<<<<<<< HEAD
=======
    @include('admin.marks.create')<br>
>>>>>>> 6859abc7f3cd909acd8e9bfe6a955f117cb07821
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Bildirişler</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Suraty</th>
<<<<<<< HEAD
                                    <th scope="col">Ulanyjy ady </th>
                                    <th scope="col">Email</th>
=======
                                    <th scope="col">Ulanyjy belgisi</th>
>>>>>>> 6859abc7f3cd909acd8e9bfe6a955f117cb07821
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$event->name}}</td>
                                    <td><img src="{{ asset('storage/'.$event->image) }}" height="70" width="70"></td>
<<<<<<< HEAD
                                    <td>{{$event->user->name}}</td>
                                    <td>{{$$event->user->email}}</td>
=======
                                    <td>{{$event->user->phone}}</td>
>>>>>>> 6859abc7f3cd909acd8e9bfe6a955f117cb07821
                                    <td>
                                    <form action="{{route('admin.events.destroy',$event)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <a href="{{route('admin.events.show',$event)}}" class="btn btn-outline-info btn-sm "><i class="bi bi-eye"></i></a>
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
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 6859abc7f3cd909acd8e9bfe6a955f117cb07821
