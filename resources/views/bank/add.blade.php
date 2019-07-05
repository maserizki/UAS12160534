@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data bank</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/bank') }}" method="post">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Kode Bank</label>
                                <input type="text" name="kode_bank" class="form-control {{ $errors->has('kode_bank') ? 'is-invalid':'' }}" placeholder="Masukkan kode anda">
                                <p class="text-danger">{{ $errors->first('kode_bank') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Bank</label>
                                <input type="text" name="nama_bank" class="form-control {{ $errors->has('nama_bank') ? 'is-invalid':'' }}" placeholder="Masukkan nama lengkap anda">
                                <p class="text-danger">{{ $errors->first('nama_bank') }}</p>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection