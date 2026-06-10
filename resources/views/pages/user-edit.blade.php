@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit User'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Edit User: {{ $user->username }}</h6>
                    <a href="{{ route('user-management') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body px-4 pt-4 pb-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text">{{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user-management.update', $user->id) }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" class="form-control-label">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" 
                                           type="text" 
                                           id="username" 
                                           name="username" 
                                           value="{{ old('username', $user->username) }}" 
                                           required>
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" 
                                           type="email" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email', $user->email) }}" 
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname" class="form-control-label">First Name</label>
                                    <input class="form-control @error('firstname') is-invalid @enderror" 
                                           type="text" 
                                           id="firstname" 
                                           name="firstname" 
                                           value="{{ old('firstname', $user->firstname) }}">
                                    @error('firstname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname" class="form-control-label">Last Name</label>
                                    <input class="form-control @error('lastname') is-invalid @enderror" 
                                           type="text" 
                                           id="lastname" 
                                           name="lastname" 
                                           value="{{ old('lastname', $user->lastname) }}">
                                    @error('lastname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address" class="form-control-label">Address</label>
                                    <input class="form-control @error('address') is-invalid @enderror" 
                                           type="text" 
                                           id="address" 
                                           name="address" 
                                           value="{{ old('address', $user->address) }}">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city" class="form-control-label">City</label>
                                    <input class="form-control @error('city') is-invalid @enderror" 
                                           type="text" 
                                           id="city" 
                                           name="city" 
                                           value="{{ old('city', $user->city) }}">
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country" class="form-control-label">Country</label>
                                    <input class="form-control @error('country') is-invalid @enderror" 
                                           type="text" 
                                           id="country" 
                                           name="country" 
                                           value="{{ old('country', $user->country) }}">
                                    @error('country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postal" class="form-control-label">Postal Code</label>
                                    <input class="form-control @error('postal') is-invalid @enderror" 
                                           type="text" 
                                           id="postal" 
                                           name="postal" 
                                           value="{{ old('postal', $user->postal) }}">
                                    @error('postal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="about" class="form-control-label">About</label>
                            <textarea class="form-control @error('about') is-invalid @enderror" 
                                      id="about" 
                                      name="about" 
                                      rows="3">{{ old('about', $user->about) }}</textarea>
                            @error('about')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection