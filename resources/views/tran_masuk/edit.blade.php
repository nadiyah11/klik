@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li class="active">Edit Pemasukan</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
					<h2 class="panel-title">Pemasukan</h2>
					</div>
				<div class="panel-body">
					{!! Form::model($tran_masuk, ['url' => route('tran_masuk.update', $tran_masuk->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('tran_masuk._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection