<div>
    @include('admin.marks.create')<br>
    @include('admin.marks.edit')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Markalar</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Ady</th>
                                    <th scope="col">Suraty</th>
                                    <th scope="col">Funksiýa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($marks as $mark)
                                <tr>
                                    <th scope="row">{{$mark->id}}</th>
                                    <td>{{$mark->name}}</td>
                                    <td><img src="{{ asset('storage/'.$mark->image) }}" height="70" width="70"></td>
                                    <td>
                                        <button  data-bs-toggle="modal" data-bs-target="#cedit" wire:click="edit({{ $mark->id }})" class="btn btn-outline-info btn-sm"><i class="bi bi-pen"></i></button>
                                        <button wire:click="delete({{ $mark->id }})" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>

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
