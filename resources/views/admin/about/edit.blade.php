<form action="{{route('admin.about.update',$about->id)}}" id="markform1" enctype="multipart/form-data" method="post" class="row g-3">
    @csrf
    @method ('PUT')
    <div class="col-md-6">
        <div class="form-group">
            <label for="about">Barada</label>
            <textarea class="form-control" id="about" placeholder="Barada" name="text" value="{{$about->text}}">{{$about->text}}</textarea>
        </div><br>
    </div>
    <div class="pull-right">
        <button type="submit" class="btn btn-outline-success btn-sm pull-right ">Üýtget</button>
    </div>

</form>