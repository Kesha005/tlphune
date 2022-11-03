<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modelmodal">
    <i class="bi bi-plus"></i>Täze
</button><br>
<div class="modal fade" id="modelmodal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
             <form action="{{route('admin.products.store')}}" enctype="multipart/form-data" id="markform" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Model goş</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label for="name">Ady</label>
                        <input type="text" class="form-control" id="name" placeholder="Ady" name="name">
                    </div><br>

                    <div class="form-group">
                        <label for="image">Surat</label>
                        <input type="file" class="form-control" id="image" name="image[]" placeholder="Surat" multiple>
                    </div>

                    <div class="form-group">
                    <label for="category">Kategoriýa</label>
                        <select name="category_id" class="form-control" id="category">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" class="form-control">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div><br>

                    <div class="form-group">
                    <label for="mark_id">Marka</label>
                        <select name="mark_id" class="form-control" id="mark_id">
                            @foreach($marks as $mark)
                            <option value="{{$mark->id}}" class="form-control">{{$mark->name}}</option>
                            @endforeach
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label for="country">Ýurt</label>
                        <input type="text" class="form-control" id="country" placeholder="Yurt" name="country">
                    </div><br>

                    <div class="form-group">
                        <label for="about">Barada</label>
                        <textarea  class="form-control" id="about" placeholder="Barada" name="about"></textarea>
                    </div><br>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary close-btn" data-bs-dismiss="modal" aria-label="Close">Çyk</button>
                    <button type="submit" id="savemark" class="btn btn-outline-success">Goş</button>
                </div>
            </form>
        </div>

    </div>
</div>