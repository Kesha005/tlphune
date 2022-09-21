<div>
    @include('admin.category.create')<br>
    @include('admin.category.edit')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Bölümler</h5>
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
                                @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>{{$category->name}}</td>
                                    <td><img src="{{ asset('storage/'.$category->image) }}" height="70" width="70"></td>
                                    <td>
                                        <button  data-bs-toggle="modal" data-bs-target="#cedit" wire:click="edit({{ $category->id }})" class="btn btn-outline-info btn-sm"><i class="bi bi-pen"></i></button>
                                        <button wire:click="delete({{ $category->id }})" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>

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