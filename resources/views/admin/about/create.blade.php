<form action="{{route('admin.about.store')}}" id="markform1"  method="post" class="row g-3">
    @csrf



    <div class="col-md-6">
        <div class="form-group">
            <label for="about">Barada</label>
            <textarea class="form-control" id="about" placeholder="Barada" name="text" ></textarea>
        </div><br>
    </div>
    <div class="pull-right">
        <button type="submit" class="btn btn-outline-success btn-sm pull-right ">Goş</button>
    </div>

</form>