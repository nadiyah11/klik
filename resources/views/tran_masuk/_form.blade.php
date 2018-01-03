<div class="form-group{{ $errors->has('tgl_masuk') ? ' has-error' : '' }}">
	{!! Form::label('tgl_masuk', 'Tanggal Masuk', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::date('tgl_masuk', null, ['class'=>'form-control']) !!}
		{!! $errors->first('tgl_masuk', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {!! $errors->has('user_id') ? 'has-error' : '' !!}">
	{!! Form::label('user_id', 'Pencatat', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('user_id', [''=>'']+App\User::pluck('name','id')->all(), null,['class'=>'form-control']) !!}
		{!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group {!! $errors->has('sup_id') ? 'has-error' : '' !!}">
	{!! Form::label('sup_id', 'Nama Perusahaan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('sup_id', [''=>'']+App\Supplier::pluck('nama_per','id')->all(),null,['class'=>'form-control']) !!}
		{!! $errors->first('sup_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group {!! $errors->has('barang_id') ? 'has-error' : '' !!}">
	{!! Form::label('barang_id', 'Nama Barang', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('barang_id', [''=>'']+App\Barang::pluck('nama_bar','id')->all(), null,['class'=>'form-control']) !!}
		{!! $errors->first('barang_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('hargas') ? ' has-error' : '' }}">
	{!! Form::label('hargas', 'Harga Satuan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::number('hargas', null, ['class'=>'form-control']) !!}
		{!! $errors->first('hargas', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('jumlahs') ? ' has-error' : '' }}">
	{!! Form::label('jumlahs', 'Stock Barang Masuk', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::number('jumlahs', null, ['class'=>'form-control']) !!}
		{!! $errors->first('jumlahs', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>