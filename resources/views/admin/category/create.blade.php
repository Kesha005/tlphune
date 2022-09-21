<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#basicModal">
    <i class="bi bi-plus"></i>Täze
</button><br>
<div wire:ignore.self class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="submit" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Bölüm goş</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ady</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ady" wire:model="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div><br>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Surat</label>
                        <input type="file" class="form-control" id="exampleFormControlInput2" wire:model="image" placeholder="Surat">
                        @error('image') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary close-btn" data-bs-dismiss="modal" aria-label="Close">Çyk</button>
                    <button type="submit" class="btn btn-outline-success">Goş</button>
                </div>
            </form>
        </div>

    </div>
</div>