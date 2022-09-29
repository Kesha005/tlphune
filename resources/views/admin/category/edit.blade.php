<div wire:ignore.self class="modal fade" id="cedit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit.prevent="update" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Üýtget</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                    <button type="button"  wire:prevent="cancel()" class="btn btn-outline-secondary close-btn" data-bs-dismiss="modal" aria-label="Close">Çyk</button>
                    <button type="submit" class="btn btn-outline-success">Üýtget</button>
                </div>
            </form>
        </div>

    </div>
</div>