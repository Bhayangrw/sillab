<div class="form-group">
	<label>Harga</label>
	@foreach($data['harga'] as $harga)
		<input class="form-control" id="harga" name="harga" type="number" value="{{$harga->Harga}}">
	@endforeach
</div>