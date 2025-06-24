@extends('layouts.admin.master')
@section('title', 'Profile')
@section('content')
    <div class="main-content app-content">
        <div class="main-container mt-3 container-fluid">
            <div class="row" id="user-profile">
                <div class="col-lg-12">
                    <div class="card bg-light">
                      
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    <i class="fe fe-check me-2"></i>{{ session('success') }}
                                </div>
                            @endif

                            <form action="/admin/updateRegister" method="POST">
                                @csrf  
                                <div class="card mb-4">
                                    <div class="card-header  col-8 offset-2">
                                        <h3 class="card-title">User Profile</h3>
                                    </div>
                                    <div class="card-body col-8 offset-2">
                                        <!-- Name Field -->
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label">Full Name</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                                        placeholder="Full Name" value="{{ old('name', Auth::user()->name) }}" required>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Email Field -->
                                        <div class="form-group row mb-0">
                                            <label class="col-md-3 col-form-label">Email</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                 
                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                                        placeholder="Email" value="{{ old('email', Auth::user()->email) }}" required>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <!-- Current Password -->
                                        <div class="form-group row mt-3 mb-3">
                                            <label class="col-md-3 col-form-label">Current Password</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                     
                                                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" 
                                                        placeholder="Current Password">
                                                    @error('current_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- New Password -->
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label">New Password</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                                        placeholder="New Password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <small class="form-text text-muted">Minimum 8 characters</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Confirm Password -->
                                        <div class="form-group row mb-0">
                                            <label class="col-md-3 col-form-label">Confirm Password</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                   
                                                    <input type="password" name="password_confirmation" class="form-control" 
                                                        placeholder="Confirm Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                                
                                <!-- Submit Button -->
                                <div class="form-footer mt-2 mb-3">
                                    <div class="row"> 
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="fe fe-save me-2"></i>Update Profile
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection