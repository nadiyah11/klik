@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Karyawan</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="btn btn-primary" href="/karyawan/create">Tambah Data</a>
					</div>

					<div class="panel-body">
						<table class="table">
						<thead>
							<tr>
								<th>No </th>
								<th>Nama Lengkap</th>
								<th>ALamat</th>
								<th>Jenis Kelamin</th>
								<th>No Hp</th>
								<th>Bagian</th>
								<th colspan="3">Action</th>
							</tr>
						</thead>
						@php $no=1; @endphp
						<tbody>
							
							@foreach($karyawan as $data)
							<tr>
							<td>{{$no++}}</td>
							<td>{{$data->nama_kar}}</td>
							<td>{{$data->alamat}}</td>
							<td>{{$data->jk}}</td>
							<td>{{$data->no_hp}}</td>
							<td>{{$data->bagian}}</td>

							<td>
								<a class="btn btn-warning" href="/karyawan/{{$data->id}}/edit">Edit</a>
								<td>
									<a class="btn btn-primary" href="/karyawan/{{$data->id}}">Detail</a>
								</td>
								<td>
									<form action="{{route('karyawan.destroy', $data->id )}}" method="post">
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