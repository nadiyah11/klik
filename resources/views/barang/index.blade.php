@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Barang</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="btn btn-primary" href="/barang/create">Tambah Data</a>
					</div>

					<div class="panel-body">
						<table class="table">
						<thead>
							<tr>
								<th>No </th>
								<th>Gambar Barang </th>
								<th>Nama Barang </th>
								<th>Merk Barang </th>
								<th>Stock Barang </th>
								<th colspan="3">Action</th>
							</tr>
						</thead>
						@php $no=1; @endphp
						<tbody>
							
							@foreach($barang as $data)
							<tr>
							<td>{{$no++}}</td>
							<td><img src="{{asset('img/'.$data->logo.'')}}" height="100" width="100"></td>
							<td>{{$data->nama_bar}}</td>
							<td>{{$data->merk}}</td>
							<td>{{$data->stock}}</td>

							<td>
								<a class="btn btn-warning" href="/barang/{{$data->id}}/edit">Edit</a>
								<td>
									<a class="btn btn-primary" href="/barang/{{$data->id}}">Show</a>
								</td>
								<td>
									<form action="{{route('barang.destroy', $data->id )}}" method="post">
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