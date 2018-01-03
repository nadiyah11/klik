<div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
	{!! Form::label('logo', 'Gambar', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::file('logo', null, ['class'=>'form-control']) !!}
		{!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('nama_bar') ? ' has-error' : '' }}">
	{!! Form::label('nama_bar', 'Barang', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_bar', null, ['class'=>'form-control']) !!}
		{!! $errors->first('nama_bar', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('merk') ? ' has-error' : '' }}">
	{!! Form::label('merk', 'Merk Barang', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('merk', null, ['class'=>'form-control']) !!}
		{!! $errors->first('merk', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
	{!! Form::label('stock', 'Stock Barang', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::number('stock', null, ['class'=>'form-control']) !!}
		{!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>