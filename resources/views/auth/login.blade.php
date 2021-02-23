@extends('layouts.app')

@section('content')
    <div class="flex flex-col grid md:grid-cols-7 pt-16 px-6">
        <div class="md:col-start-3 md:col-span-3">
            <div class="bg-gray-800 rounded-t-md justify-center p-4 ">
                <p class="text-2xl text-white font-bold text-center">LOGIN</p>
            </div>
            <div class="bg-white p-6 rounded-b-md">
                @if (session('status'))
                    <div class="bg-red-500 p-3 mb-3 rounded-md text-white text-center">
                        {{ session('status') }}
                    </div>

                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label for="email" class="sr-only">Email Address</label>
                        <input type="text" name="email" id="email" placeholder="Email Address"
                            class="bg-gray-100 border-l-8 border-gray-600 w-full p-3 rounded-sm @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}">

                        @error('email')
                            <span class="text-red-500 mt-2 text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="email" class="sr-only">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="bg-gray-100 border-l-8 border-gray-600 w-full p-3 rounded-sm @error('password') border-red-500 @enderror">

                        @error('Password')
                            <span class=" text-red-500 mt-2 text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember" class="mr-2">
                            <label for="remember">Remember me</label>
                        </div>
                    </div>

                    <div class="mb-2">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white rounded w-full px-3 py-3">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
