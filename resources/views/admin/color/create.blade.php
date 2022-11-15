<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cmmodal">
    <i class="bi bi-plus"></i>Täze
</button><br>
<div class="modal fade" id="cmmodal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admin.color.store')}}" enctype="multipart/form-data" id="markform" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Reňk goş</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label for="version">TM</label>
                        <input type="text" class="form-control" id="version" placeholder="Ady" name="tm">
                    </div><br>

                    <div class="form-group">
                        <label for="version1">EN</label>
                        <input type="text" class="form-control" id="version1" placeholder="Ady" name="en">
                    </div><br>

                    <div class="form-group">
                        <label for="version2">RU</label>
                        <input type="text" class="form-control" id="version2" placeholder="Ady" name="ru">
                    </div><br>


                    <div class="form-group">
                        <label for="image">Saýla</label>
                        <input type="color" class="form-control" id="image" name="code" placeholder="APK">
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