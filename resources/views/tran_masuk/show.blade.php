@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li class="active">Pemasukan</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
					<h2 class="panel-title">Pemasukan</h2>
					</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-md-6">
							ID Pemasukan
						</div>
						<div class="col-md-6">
							{{$tran_masuk->id}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							Tanggal Masuk
						</div>
						<div class="col-md-6">
							{{$tran_masuk->tgl_masuk}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							Pencatat
						</div>
						<div class="col-md-6">
							{{$tran_masuk->User->name}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							Perusahaan
						</div>
						<div class="col-md-6">
							{{$tran_masuk->Supplier->nama_per}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							Nama Barang
						</div>
						<div class="col-md-6">
							{{$tran_masuk->Barang->nama_bar}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							Harga Satuan
						</div>
						<div class="col-md-6">
							{{$tran_masuk->hargas}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							Stock Pemasukan
						</div>
						<div class="col-md-6">
							{{$tran_masuk->jumlahs}}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							Jumlah Seluruh
						</div>
						<div class="col-md-6">
							<!-- {{$tran_masuk->jumlahs}} -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection