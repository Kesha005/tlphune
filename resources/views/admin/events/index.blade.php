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
            <button class="btn btn-outline-success" id="check_event" type="submit" disabled >
                <i class="bi bi-check"></i>Tassykla
            </button>
        </form>

        <form class="me-2" name="del_event_form" action="{{route('admin.events.multi_del')}}" method="post">
            @csrf
            <input name="msgdel" id="del_val" hidden value="">
            <button type="submit" class="btn btn-outline-danger" id="del_event" disabled>
                <i class="bi bi-trash"></i>Aýyr
            </button>
        </form>
        <button class="btn btn-outline-info" id="vip_event" data-bs-toggle="modal" data-bs-target="#cmmodal" disabled>
            <i class="bi bi-trash"></i>VIP
        </button>
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
                                        
                                    <form action="{{route('admin.events.destroy',$event)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-outline-success btn-sm single_check" onclick="example({{$event->id}})"><i class="bi bi-check"></i></a>
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

<div class="modal fade" id="cmmodal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.vip.store')}}" enctype="multipart/form-data" id="markform" method="POST" name="vip_event_form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">VIP goş</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label for="to">Çenli</label>
                        <input type="datetime" class="form-control"   name="to">
                    </div><br>
                </div>

                <input name="vip" id="vip_val" value="" hidden> 

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary close-btn" data-bs-dismiss="modal" aria-label="Close">Çyk</button>
                    <button type="submit" id="savemark" class="btn btn-outline-success">Goş</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/js/event_check.js')}}"></script>

<script>
    function example(id) {
        $.ajax({
            data: {
                _token: "{{csrf_token()}}",
                'id':id,
                'ajax':'true'
            },
            url: "{{route('admin.events.check')}}/" + id,
            type: 'POST',
            dataType: 'JSON',
            
            success: function(response) {
                
                var id = response['dataId']
                console.log(response)
                html = `<span class="badge bg-success">Tassyklanan</span>`;
                $('.st' + id).html(html)
            }
        });
    }
</script>

@endsection