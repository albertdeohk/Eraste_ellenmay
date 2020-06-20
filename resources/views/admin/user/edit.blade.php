@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" 
                        name="name"
                        class="form-control @error('name') is-invalid @enderror" 
                        placeholder="masukan nama" 
                        value="{{ $user->name }}">
                        
                    @error('name')
                    <p class="text-danger">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" 
                        name="email"
                        class="form-control @error('email') is-invalid @enderror" 
                        placeholder="masukan nama" 
                        value="{{ $user->email }}">
                        
                    @error('email')
                    <p class="text-danger">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" 
                        name="password"
                        class="form-control @error('password') is-invalid @enderror" 
                        placeholder="masukan password">
                        
                    @error('password')
                    <p class="text-danger">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" 
                        name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        placeholder="masukan password konfirmasi">
                        
                    @error('password_confirmation')
                    <p class="text-danger">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection