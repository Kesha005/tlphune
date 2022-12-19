@extends('layouts.admin.app')

@section('page_name')

Hatlar
@endsection

@section('main_section')

<div>
    <form name="delmsg" action="{{route('admin.messages.multi_del')}}" method="post">
        @csrf
        <input name="msgdel" id="msgdel" hidden value="">
         <button type="submit" class="btn btn-outline-danger" id="msgbtn" disabled>
            <i class="bi bi-trash"></i>Aýyr
        </button>
    </form><br>
    
    

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Hatlar</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="active">
                                        <input type="checkbox" class="select-all checkbox" name="select-all" />
                                    </th>
                                    <th scope="col">No</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($msgs as $msg)
                                <tr>
                                    <td class="active">
                                        <input type="checkbox" class="select-item checkbox" id="saled" name="select-item" value="{{$msg->id}}" onclick="check();" />
                                    </td>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$msg->name}}</td>
                                    <td>{{$msg->email}}</td>
                                    <td>
                                        <form method="POST" action="{{route('admin.messages.destroy',$msg)}}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('admin.messages.show',$msg)}}" class="btn btn-outline-info btn-sm "><i class="bi bi-eye"></i></a>
                                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </form>


                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $msgs->links() !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script src="{{asset('assets/js/msg_check.js')}}"></script>
@endsection