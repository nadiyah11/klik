<div class="form-group{{ $errors->has('tgl_keluar') ? ' has-error' : '' }}">
	{!! Form::label('tgl_keluar', 'Tanggal Keluar', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::date('tgl_keluar', null, ['class'=>'form-control']) !!}
		{!! $errors->first('tgl_keluar', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {!! $errors->has('user_id') ? 'has-error' : '' !!}">
	{!! Form::label('user_id', 'Pencatat', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('user_id', [''=>'']+App\User::pluck('name','id')->all(), null,['class'=>'form-control']) !!}
		{!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {!! $errors->has('barang_id') ? 'has-error' : '' !!}">
	{!! Form::label('barang_id', 'Nama Barang', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('barang_id', [''=>'']+App\Barang::pluck('nama_bar','id')->all(), null,['class'=>'form-control']) !!}
		{!! $errors->first('barang_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('jumlahs') ? ' has-error' : '' }}">
	{!! Form::label('jumlahk', 'Barang Keluar', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::number('jumlahk', null, ['class'=>'form-control']) !!}
		{!! $errors->first('jumlahk', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>