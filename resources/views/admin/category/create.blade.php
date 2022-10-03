<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#basicModal">
    <i class="bi bi-plus"></i>Täze
</button><br>
<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
             <form action="{{route('admin.categories.store')}}" enctype="multipart/form-data" id="markform" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Bölüm goş</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
<<<<<<< HEAD
=======


>>>>>>> a28ae097858eb3651dc13d450a3cb7693ae1c766
                    <div class="form-group">
                        <label for="name">Ady</label>
                        <input type="text" class="form-control" id="name" placeholder="Ady" name="name">
                    </div><br>
                    <div class="form-group">
                        <label for="image">Surat</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Surat">
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary close-btn" data-bs-dismiss="modal" aria-label="Close">Çyk</button>
                    <button type="submit" id="savemark" class="btn btn-outline-success">Goş</button>
                </div>
            </form>
        </div>

    </div>
</div>