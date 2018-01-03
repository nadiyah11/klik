@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li class="active">Edit Karyawan</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
					<h2 class="panel-title">Karyawan</h2>
					</div>
				<div class="panel-body">
					{!! Form::model($karyawan, ['url' => route('karyawan.update', $karyawan->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('karyawan._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection