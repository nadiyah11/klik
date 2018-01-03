@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li class="active">Edit Barang</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
					<h2 class="panel-title">Barang</h2>
					</div>
				<div class="panel-body">
					{!! Form::model($barang, ['url' => route('barang.update', $barang->id),'method'=>'put', 'class'=>'form-horizontal','enctype' => 'multipart/form-data']) !!}
					@include('barang._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection