@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li class="active">Edit Supplier</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
					<h2 class="panel-title">Supplier</h2>
					</div>
				<div class="panel-body">
					{!! Form::model($supplier, ['url' => route('supplier.update', $supplier->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('supplier._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection