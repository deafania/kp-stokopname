@extends('layouts.backend')

@section('content')
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <h1 class="ml-2">Edit User</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                
                   <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if (session()->has('success'))
                        <div class="card-header">
                            <h5 class="card-title text-success">{{ session()->get('success') }}</h5>
                        </div>
                        @endif
                        <div class="card-body pl-4">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                    <input type="text" name="name" id="nama" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" required="required">

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="foto">Foto Profil</label>
                                    <input type="file" name="picture" id="foto" class="form-control @error('picture') is-invalid @enderror">
                                        <small class="text-muted">Pilih foto baru untuk mengganti yang lama</small>
                                    @error('picture')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" required="required">

                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="pass">Password</label>
                                    <input type="password" name="password" id="pass" class="form-control @error('password') is-invalid @enderror">
                                   <small class="text-muted">Kosongkan password jika tidak ingin mengganti</small>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role">Hak Akses</label>
                                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="operator" @if (old('role', $user->role) == 'operator') selected @endif>Operator</option>
                                    <option value="admin" @if (old('role', $user->role) == 'admin') selected @endif>Admin</option>
                                </select>

                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group text-right">
                                <input type="submit" value="Simpan" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection