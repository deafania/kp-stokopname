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
                    <h1 class="ml-2">Input User</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <div class="card" style="width: 100%;">
                
                <div class="card-body pl-4">

                    <div class="d-flex">
                        <div class="col-md-3 mr-5">
                            <div class="mw-100 bg-dark" style="height: 300px">
                            </div>
                        </div>
                    
                        <div class="col-md-5">
                            <div>
                                <div class="form-group">
                                    <label for="usr">Username</label>
                                    <input type="text" class="form-control" id="usr" name="username" disabled>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="usr">Nama User</label>
                                    <input type="text" class="form-control" id="usr" name="username">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="usr">Hak Akses</label>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>--- PILIH HAK AKSES ---</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Operator</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="usr">Hak Akses</label>
                                    <div>
                                        <input type="radio" id="admin" name="hak_akses" value="admin">
                                        <label for="admin" class="text-muted mr-3">Admin</label>
                                        <input type="radio" id="operator" name="hak_akses" value="operator">
                                        <label for="operator" class="text-muted">Operator</label>
                                    </div>
                                </div>
                            </div>
        
                            <div class="d-flex">
                                <button class="btn btn-primary mr-3">Simpan</button>
                                <button class="btn btn-light">Batal</button>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
            

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection