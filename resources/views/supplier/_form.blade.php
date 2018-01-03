<div class="form-group{{ $errors->has('nama_per') ? ' has-error' : '' }}">
	{!! Form::label('nama_per', 'Nama Perusahaan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_per', null, ['class'=>'form-control']) !!}
		{!! $errors->first('nama_per', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>