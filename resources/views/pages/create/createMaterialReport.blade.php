@foreach ($bundle->materials as $material)
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label for="material_id">{{$material->name}}</label>
            <input type="text" name="material_id[{{$material->id}}][]" required id="material_id" class="form-control" autocomplete="off" aria-describedby="helpId">
        </div>
    </div>
@endforeach