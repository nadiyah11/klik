@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Supplier</li>
				</ul>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="btn btn-primary" href="/supplier/create">Tambah Data</a>
					</div>

					<div class="panel-body">
						<table class="table">
						<thead>
							<tr>
								<th>No </th>
								<th>Nama Perusahaan </th>
								<th colspan="3">Action</th>
							</tr>
						</thead>
						@php $no=1; @endphp
						<tbody>
							
							@foreach($supplier as $data)
							<tr>
							<td>{{$no++}}</td>
							<td>{{$data->nama_per}}</td>

							<td>
								<a class="btn btn-warning" href="/supplier/{{$data->id}}/edit">Edit</a>
								<td>
									<a class="btn btn-primary" href="/supplier/{{$data->id}}">Show</a>
								</td>
								<td>
									<form action="{{route('supplier.destroy', $data->id )}}" method="post">
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