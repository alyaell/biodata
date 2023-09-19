@extends('adminlte')
@section('content')
    <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Peserta Didik Pages</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li> --}}
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
        <h3 class="card-title">Edit Peserta Didik</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <a href="{{ route('pesertadidik.index') }}" class="btn btn-default">Kembali</a>
        <br><br>
        
        <form action="{{ route('pesertadidik.update', $peserta->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>NIS</label>
            <input name="nis" type="text" class="form-control" placeholder="..." value="{{ $peserta->nis }}">
            @error('nis')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input name="namalengkap" type="text" class="form-control" placeholder="..." value="{{ $peserta->namalengkap }}">
            @error('namalengkap')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control">
                <option>-Pilih Jenis Kelamin-</option>

                @if ($peserta->jk == 'L') 
                <option value="L">Laki-Laki</option>
                <option value="P" selected>Perempuan</option>
                @endif

                @if ($peserta->jk == 'P')
                <option value="L">Laki-Laki</option>
                <option value="P" selected>Perempuan</option>
                @endif
            </select>
            @error('jk')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label>Nilai</label>
            <input name="nilai" type="number" class="form-control" placeholder="..." value="{{ $peserta->nilai}}">
            @error('nilai')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <input type="submit" name="submit"
        class="btn btn-success" value="edit" />
        </form>
      </div>

  </section>
  <!-- /.content -->
@endsection