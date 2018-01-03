@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Pengeluaran</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="btn btn-primary" href="/tran_keluar/create">Tambah Data</a>
					</div>

					<div class="panel-body">
						<table class="table">
						<thead>
							<tr>
								<th>No </th>
								<th>Tanggal Keluar</th>
								<th>Pencatat</th>
								<th>Nama Barang</th>
								<th>Stock Keluar</th>
								<th colspan="3">Action</th>
							</tr>
						</thead>
						@php $no=1; @endphp
						<tbody>
							
							@foreach($tran_keluar as $data)
							<tr>
							<td>{{$no++}}</td>
							<td>{{$data->tgl_keluar}}</td>
							<td>{{$data->User->name}}</td>
							<td>{{$data->Barang->nama_bar}}</td>
							<td>{{$data->jumlahk}}</td>

							<td>
								<a class="btn btn-warning" href="/tran_keluar/{{$data->id}}/edit">Edit</a>
								<td>
									<a class="btn btn-primary" href="/tran_keluar/{{$data->id}}">Detail</a>
								</td>
								<td>
									<form action="{{route('tran_keluar.destroy', $data->id )}}" method="post">
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