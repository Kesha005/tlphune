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


                    <div class="form-group">
                        <label for="name">TM</label>
                        <input type="text" class="form-control" id="name" placeholder="Ady" name="tm">
                    </div><br>

                    <div class="form-group">
                        <label for="name1">Ru</label>
                        <input type="text" class="form-control" id="name1" placeholder="Ru" name="ru">
                    </div><br>

                    <div class="form-group">
                        <label for="name2">EN</label>
                        <input type="text" class="form-control" id="name2" placeholder="En" name="en">
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