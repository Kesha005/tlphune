<form action="{{route('admin.limit.update')}}" id="markform1" enctype="multipart/form-data" method="POST" class="row g-3">
    @csrf
    <div class="col-md-4">
        <div class="form-group">
            <label for="name">Günlük bildiriş  sany</label>
            <input type="text" class="form-control" id="name" placeholder="limit bahasy" name="limit" value="{{$limit->limit}}">
        </div><br>
    </div>
    <div class="pull-right">
        <button type="submit" class="btn btn-outline-success btn-sm pull-right ">Iber</button>
    </div>
</form>