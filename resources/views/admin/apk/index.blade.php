@extends('layouts.admin.app')

@section('page_name')
APK
@endsection

@section('main_section')
<div>
    @include('admin.apk.create')<br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">APK-lar</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Vesion</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($apks as $apk)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$apk->version}}</td>
                                    <td>
                                    <form action="{{route('admin.apk.destroy',$apk)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <a href="{{route('admin.apk.download',$apk)}}" class="btn btn-outline-info btn-sm "><i class="bi bi-download"></i></a>
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
