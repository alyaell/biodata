@extends('adminlte')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Guru Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Ini adalah Halaman Data Guru</h3>
        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
              @if($message = Session::get('success'))
              <div class="alert alert-success">{{$message}}</div>
              @endif
              <a href="{{route('guru.create')}}" class="btn btn-success">Tambah Data</a>
              <br></br>
              <table class="table table-sriped table-bordered">
                <tr>
                  <th>Id</th>
                  <th>Nip</th>
                  <th>Nama Guru</th>
                  <th>Mapel</th>
                  <th>Aksi</th>
                </tr>

                @foreach ($guruM as $guru)
                
                <tr>
                  <td>{{ $guru->id }}</td>
                  <td>{{ $guru->nip }}</td>
                  <td>{{ $guru->namaguru }}</td>
                  <td>{{ $guru->mapel }}</td>
                  <td>
                        <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-xs btn-warning">Edit<a>
                        <form action="{{ route('guru.destroy', $guru->id)}}" 
                         method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-xs btn-danger">Hapus</button>
                        </form>
                  </td>
                </tr>
                @endforeach
              </table>
                <br>
      </div>
    </div>
 

  </section>
  @endsection