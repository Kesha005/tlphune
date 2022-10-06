<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cmmodal">
    <i class="bi bi-plus"></i>Täze
</button><br>
<div class="modal fade" id="cmmodal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.apk.create')}}" enctype="multipart/form-data" id="markform" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">APK goş</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label for="version">Version</label>
                        <input type="text" class="form-control" id="version" placeholder="version" name="version">
                    </div><br>
                    <div class="form-group">
                        <label for="image">APK</label>
                        <input type="file" class="form-control" id="image" name="apk" placeholder="APK">
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