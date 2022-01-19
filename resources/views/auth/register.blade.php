@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 mt-5 py-5 ">
                <div>
                    <h1>Register Panel</h1>
                </div>
                <div class="mt-4">
                    <form action="{{Route("register")}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="">
                            <span class="text-danger">@error('name')
                                {{$message}}
                            @enderror</span> 
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" value="">
                            <span class="text-danger">@error('email')
                                {{$message}}
                            @enderror</span> 
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value="">
                            <span class="text-danger">@error('password')
                                {{$message}}
                            @enderror</span> 
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" name="remember_token" for="exampleCheck1">Check me out</label>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
