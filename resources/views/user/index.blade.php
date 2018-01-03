@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pengguna</div>

                <div class="panel-body">
                    {!! Form::open(['url','user.store','class'=>'form-horizontal']) !!}

                   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                       {!! Form::label('name','Nama',['class'=>'col-md-4 control-label']) !!}
                       <div class="col-md-6">
                           {!! Form::text('name', null, ['class'=>'form-control']) !!}
                           {!! $errors->first('name','<p class="help-block">:message</p>') !!}
                       </div>
                   </div>


                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                       {!! Form::label('email','Alamat Email', ['class'=>'col-md-4 control-label']) !!}
                       <div class="col-md-6">
                           {!! Form::email('email', null, ['class'=>'form-control']) !!}
                           {!! $errors->first('email','<p class="help-block">:message</p>') !!}
                       </div>
                   </div>



                 <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                      {!! Form::label('password','Password',['class'=>'col-md-4 control-label']) !!}
                      <div class="col-md-6">
                          {!! Form::password('password',['class'=>'form-control']) !!}
                          {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                      </div>
                  </div>    

                   <div class="form-group">
                       <div class="col-md-6 col-md-offset-4">
                           <button type="submit" class="btn btn-primary">
                               <i class="fa fa-btn fa-user"></i>Daftar
                           </button>
                       </div>
                   </div>
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="container">

  <center><h1>Data Pengguna</h1></center>
  <div class="panel panel-primary">
  <div class="panel-heading">Data Pengguna
  <div class="panel-title pull-right">
  <!-- <a href="user/create">Tambah Data</a></div> -->
    
  </div>

  <div class="panel-body">
  <div class="col-md-12">
  <table class="table" >
    <thead>
      <tr>
      @php $no=1; @endphp
        <th>No </th>
        <th>Nama</th>
        <th>Email</th>
        
        
        <th colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($user as $data)
      @if($loop->first)
      <tr>
      <td>{{$no++}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
      @else
      <tr>
      <td>{{$no++}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
        <!-- <td> -->
        <!-- <a class="btn btn-warning" href="/user/{{$data->id}}/edit">Edit</a> -->
        <!-- <td> -->
        <td>
          <form action="{{route('user.destroy', $data->id )}}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" >
            <input class="btn btn-danger" type="submit" value="Delete" >

            {{csrf_field()}}
          </form>

        </td>
        @endif
      </td>
      </tr>
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
