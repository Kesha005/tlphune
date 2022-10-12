@extends('layouts.admin.app')

@section('page_name')
Bildirişler
@endsection

@section('main_section')
<div>
    <div class="d-flex justify-content-start">
        <form class="me-2" name="check_event_form" action="{{route('admin.events.multi_check')}}" method="post">
            @csrf
            <input name="msgdel" id="check_val" hidden value="">
            <button class="btn btn-outline-success" id="check_event" type="submit" disabled>
                <i class="bi bi-check"></i>Tassykla
            </button>
        </form>

        <form name="del_event_form" action="{{route('admin.events.multi_del')}}" method="post">
            @csrf
            <input name="msgdel" id="del_val" hidden value="">
            <button type="submit" class="btn btn-outline-danger" id="del_event" disabled>
                <i class="bi bi-trash"></i>Aýyr
            </button>
        </form>
    </div>

    <br>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Bildirişler</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="active">
                                        <input type="checkbox" class="select-all-event checkbox" name="select-all-event" />
                                    </th>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Suraty</th>
                                    <th scope="col">Ulanyjy belgisi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                <tr>
                                    <td class="active">
                                        <input type="checkbox" class="select-item-event checkbox" id="saled" name="select-item-event" value="{{$event->id}}" onclick="check_event();" />
                                    </td>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$event->name}}</td>
                                    <td><img src="{{ asset('storage/'.$event->image) }}" height="70" width="70"></td>
                                    <td>{{$event->user->phone}}</td>
                                    @if($event->status==0)
                                    <td> <span class="badge bg-warning">prosesde</span></td>
                                    @else
                                    <td> <span class="badge bg-success">Tassyklanan</span></td>
                                    @endif
                                    <td>
                                        <form action="{{route('admin.events.destroy',$event)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('admin.events.show',$event)}}" class="btn btn-outline-info btn-sm "><i class="bi bi-eye"></i></a>
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