@extends('layouts.admin.app')

@section('page_name')
VIP-ler
@endsection

@section('main_section')
<div>
    <div class="d-flex justify-content-start">

        <button class="btn btn-outline-success me-2" id="check_event" data-bs-toggle="modal" data-bs-target="#cmmodal"  disabled>
            <i class="bi bi-check"></i>Üýtget
        </button>

        <form name="del_event_form" action="{{route('admin.vip.remove')}}" method="post">
            @csrf
            <input name="msgdel" id="del_val" hidden value="">
            <button type="submit" class="btn btn-outline-danger" id="del_event" disabled>
                <i class="bi bi-trash"></i>VIP Aýyr
            </button>
        </form>
    </div>

    <br>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title"><input type="checkbox" class="select-all-event checkbox" name="select-all-event" /> Ählisini saýla</h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="active">
                                    </th>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Suraty</th>
                                    <th scope="col">Ulanyjy belgisi</th>
                                    <th scope="col">Goýulan wagty</th>
                                    <th scope="col">Tassyklanan wagty</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">VIP wagty</th>
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
                                    <td><img src="{{ asset('storage/'.$event->public_image) }}" height="70" width="70"></td>
                                    <td>{{$event->user->phone ?? "Not found"}}</td>
                                    <td>{{$event->created_at}}</td>
                                    <td>{{$event->updated_at==$event->created_at ? "Tassyklanmadyk" : $event->updated_at}}</td>

                                    <td class="st{{$event->id}}">
                                        @if($event->status==0)
                                        <span class="badge bg-warning">prosesde</span>
                                        @else
                                        <span class="badge bg-success">Tassyklanan</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{$event->in_to}}
                                    </td>
                                    <td>

                                        <form action="{{route('admin.events.destroy',$event)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-outline-success btn-sm single_check" onclick="example({{$event->id}})"><i class="bi bi-check"></i></a>
                                            <a href="{{route('admin.events.show',$event)}}" class="btn btn-outline-info btn-sm "><i class="bi bi-eye"></i></a>
                                            <button type="submit" class="btn btn-outline-danger btn-sm" id="delete_confirm"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>

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



<div class="modal fade" id="cmmodal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.vip.change')}}" id="markform" method="post" name="vip_event_form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">VIP wagty üýtget</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="to">Çenli</label>
                        <input type="datetime-local" class="form-control" name="in_to" id="to">
                    </div><br>
                </div>

                <input name="vip" id="vip_val" value="" hidden>

                <div class="modal-footer">
                    <button type="submit" id="savemark" class="btn btn-outline-success">Goş</button>
                    <button type="button" class="btn btn-outline-secondary close-btn" data-bs-dismiss="modal" aria-label="Close">Çyk</button>

                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/js/vip.js')}}"></script>
@endsection