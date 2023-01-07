@extends('layouts.admin.app')

@section('page_name')
Dükanlar
@endsection

@section('main_section')
<div>
    <div class="d-flex justify-content-start">
        <form class="me-2" name="confirm_shop_form" action="{{route('admin.shops.multi_confirm')}}" method="post">
            @csrf
            <input name="confirm_shop" id="confirm_shop" hidden value="">
            <button class="btn btn-outline-success" id="confirm_shop_btn" type="submit" disabled>
                <i class="bi bi-check"></i>Tassykla
            </button>
        </form>

        <form name="delete_shop_form" action="{{route('admin.shops.multi_destroy')}}" method="post">
            @csrf
            <input name="delete_shop" id="delete_shop" hidden value="">
            <button type="submit" class="btn btn-outline-danger" id="delete_shop_btn" disabled>
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

                        <h5 class="card-title">Dükanlar</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="active">
                                        <input type="checkbox" class="select-all-shop checkbox" name="select-all-shop" />
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
                                @foreach($shops as $shop)
                                <tr>
                                    <td class="active">
                                        <input type="checkbox" class="select-item-shop checkbox" id="saled" name="select-item-shop" value="{{$shop->id}}" onclick="check_shop();" />
                                    </td>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$shop->name}}</td>
                                    <td><img src="{{ asset('storage/'.$shop->image) }}" height="70" width="70"></td>
                                    <td>{{$shop->phone}}</td>
                                   
                                    <td class="st{{$shop->id}}">  
                                        @if($shop->status==0)
                                        <span class="badge bg-warning">prosesde</span>
                                        @else
                                        <span class="badge bg-success">Tassyklanan</span>
                                        @endif
                                    </td>
                                    
                                    
                                    <td>
                                        <form action="{{route('admin.shops.destroy',$shop)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('admin.shops.show',$shop)}}" class="btn btn-outline-info btn-sm "><i class="bi bi-eye"></i></a>
                                            <a class="btn btn-outline-success btn-sm " onclick="example({{$shop->id}})"><i class="bi bi-check"></i></a>
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

@section('js')
<script src="{{asset('assets/js/shop.js')}}"></script>
<script>
    function example(id) {
        $.ajax({
            data: {
                _token: "{{csrf_token()}}",
                'id': id,
                'ajax': 'true'
            },
            url: "{{route('admin.shops.check')}}/" + id,
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