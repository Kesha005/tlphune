<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#basicModal">
    <i class="bi bi-plus"></i>Täze
</button><br>
<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
             <form action="{{route('admin.gallery.store')}}" enctype="multipart/form-data" id="markform" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Surat goş</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="image">Surat</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Surat">
                    </div>

                    <div class="form-group">
                        <label for="image1">Surat</label>
                        <input type="text" class="form-control" id="image1" name="url" placeholder="url">
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