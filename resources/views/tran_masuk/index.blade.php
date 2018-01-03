@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Pemasukan</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="btn btn-primary" href="/tran_masuk/create">Tambah Data</a>
					</div>

					<div class="panel-body">
						<table class="table">
						<thead>
							<tr>
								<th>No </th>
								<th>Tanggal Masuk</th>
								<th>Pencatat</th>
								<th>Supplier</th>
								<th>Nama Barang</th>
								<th>Harga Satuan</th>
								<th>Stock Masuk</th>
								<th>Total</th>
								<th colspan="3">Action</th>
							</tr>
						</thead>
						@php $no=1; @endphp
						<tbody>
							
							@foreach($tran_masuk as $data)
							<tr>
							<td>{{$no++}}</td>
							<td>{{$data->tgl_masuk}}</td>
							<td>{{$data->User->name}}</td>
							<td>{{$data->Supplier->nama_per}}</td>
							<td>{{$data->Barang->nama_bar}}</td>
							<td>{{$data->hargas}}</td>
							<td>{{$data->jumlahs}}</td>
							<td>{{$data->total}}</td>

							<td>
								<a class="btn btn-warning" href="/tran_masuk/{{$data->id}}/edit">Edit</a>
								<td>
									<a class="btn btn-primary" href="/tran_masuk/{{$data->id}}">Detail</a>
								</td>
								<td>
									<form action="{{route('tran_masuk.destroy', $data->id )}}" method="post">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" >
										<input class="btn btn-danger" type="submit" value="Delete" >
										{{csrf_field()}}
									</form>
								</td>
							</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection