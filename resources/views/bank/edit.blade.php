@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Karyawan</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/bank/' . $bank->id) }}" method="post">
                        {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <input type="text" name="nama_bank" class="form-control {{ $errors->has('nama_bank') ? 'is-invalid':'' }}" value="{{ $bank->nama_bank}}" placeholder="Masukkan nama lengkap anda">
                                <p class="text-danger">{{ $errors->first('nama_bank') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Kode bank</label>
                                <input type="text" name="kode_bank" class="form-control {{ $errors->has('kode_bank') ? 'is-invalid':'' }}" value="{{ $bank->kode_bank}}" placeholder="Masukkan nama lengkap anda">
                                <p class="text-danger">{{ $errors->first('nama_bank') }}</p>
                            </div>
                           
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection