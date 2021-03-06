@extends('layouts.backend')

@section('content')
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 d-flex justify-content-between">
                <div class="col-sm-6 d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    <h1 class="ml-2">Manajemen User</h1>
                </div><!-- /.col -->
                @hasrole('admin')
                <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah</a>
                @endhasrole
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <div class="row">
                @foreach ($users as $user)
           <div class="col-md-3 col-sm-12">
            <div class="card mr-3" style="width: 18rem;">
                <div class="position-relative">
                    @if ($user->picture == '')
                    <img class="card-img-top mw-100" src="https://cdn.jpegmini.com/user/images/slider_puffin_before_mobile.jpg" alt="Card image cap" style="height: 180px; object-fit: cover;">
                    @else
                    <img class="card-img-top mw-100" src="{{ asset('uploads/images/'. $user->picture) }}" alt="Card image cap" style="height: 180px; object-fit: cover;">
                    @endif

                    <div class="btn btn-sm btn-light" style="position: absolute; left: 12px; top: 12px;">{{ \Str::title($user->role) }}</div>
                    <span style="position: absolute; right: 12px; top: 12px; z-index: 10;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1  010 2z" />
                          </svg>
                    </span>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title"><strong>{{ $user->name }}</strong></h5>
                        <div class="btn btn-sm btn-success" style="padding: 0 15px 0 15px;">
                            <a href="{{ route('user.edit', $user->id) }}" class="text-white"><i class="fa fa-edit"></i> Edit</a>
                        </div>
                    </div>
                    <p class="card-title my-2 text-muted">{{ $user->email }}</p>

                   
                </div>
            </div>
           </div>
            @endforeach
            </div>
            
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection