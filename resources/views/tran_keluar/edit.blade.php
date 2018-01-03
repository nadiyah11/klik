@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li class="active">Edit Pengeluaran</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
					<h2 class="panel-title">Pengeluaran</h2>
					</div>
				<div class="panel-body">
					{!! Form::model($tran_keluar, ['url' => route('tran_keluar.update', $tran_keluar->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('tran_keluar._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection