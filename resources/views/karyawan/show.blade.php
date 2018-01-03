@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li class="active">Karyawan</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
					<h2 class="panel-title">Karyawan</h2>
					</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-md-6">
							ID Karyawan
						</div>
						<div class="col-md-6">
							{{$karyawan->id}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							Nama Karyawan
						</div>
						<div class="col-md-6">
							{{$karyawan->nama_kar}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							Alamat
						</div>
						<div class="col-md-6">
							{{$karyawan->alamat}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							Jenis kelamin
						</div>
						<div class="col-md-6">
							{{$karyawan->jk}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							No Hp
						</div>
						<div class="col-md-6">
							{{$karyawan->no_hp}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							Bagian
						</div>
						<div class="col-md-6">
							{{$karyawan->bagian}}
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
@endsection