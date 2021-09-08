@extends('layouts.app')

@section('content')
    {{ $status ?? '' }}
    <div class="flex flex-col grid grid-cols-8 py-6">
        <div class="col-start-2 col-span-6">
            <div class="bg-gray-800 rounded-t-md justify-center p-4 ">
                <p class="text-2xl text-white font-bold text-center">REGISTER CONVERT</p>
            </div>
            <div class="bg-white px-3 py-6 rounded-b-md">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2">
                        <div class="px-3">
                            <div class="mb-5">
                                <label for="name" class="sr-only">Name <span class="italic">(Surname first)</span></label>
                                <input type="text" name="name" id="name" placeholder="Name (Surname first)"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('name') border-red-500 @enderror"
                                    value="{{ old('name') }}">

                                @error('name')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="known_name" class="sr-only">Name known and called at home</label>
                                <input type="text" name="known_name" id="known_name"
                                    placeholder="Name known and called at home"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('known_name') border-red-500 @enderror"
                                    value="{{ old('known_name') }}">

                                @error('known_name')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="phone_no" class="sr-only">Phone Number</label>
                                <input type="text" name="phone_no" id="phone_no" placeholder="Phone Number"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('phone_no') border-red-500 @enderror"
                                    value="{{ old('phone_no') }}">

                                @error('phone_no')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="sex" class="sr-only">Gender</label>
                                <input type="text" name="sex" id="sex" placeholder="Sex"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('sex') border-red-500 @enderror"
                                    value="{{ old('sex') }}">

                                @error('sex')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="marital_status" class="sr-only">Marital Status</label>
                                <input type="text" name="marital_status" id="marital_status" placeholder="Marital Status"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('marital_status') border-red-500 @enderror"
                                    value="{{ old('marital_status') }}">

                                @error('sex')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="Age" class="sr-only">Age</label>
                                <input type="text" name="age" id="age" placeholder="Age"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('age') border-red-500 @enderror"
                                    value="{{ old('age') }}">

                                @error('age')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="email" class="sr-only">Email Address</label>
                                <input type="text" name="email" id="email" placeholder="Email Address"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('email') border-red-500 @enderror"
                                    value="{{ old('email') }}">

                                @error('email')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="want_to_worship" class="sr-only">Do you plan to continue worshipping with
                                    us?</label>
                                <input type="text" name="want_to_worship" id="want_to_worship"
                                    placeholder="Do you plan to continue worshipping with us?"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('want_to_worship') border-red-500 @enderror"
                                    value="{{ old('want_to_worship') }}">

                                @error('want_to_worship')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="px-3">
                            <div class="mb-5">
                                <label for="" class="sr-only">Residential Address</label>
                                <textarea rows="3" cols="50" placeholder="Residential Address..." name="residential_address"
                                    id="residential_address"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('residential_address') border-red-500 @enderror"
                                    value="{{ old('residential_address') }}"></textarea>
                                @error('residential_address')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="nearest_bus_stop" class="sr-only">Nearest bus stop to your home</label>
                                <input type="text" name="nearest_bus_stop" id="nearest_bus_stop"
                                    placeholder="Nearest bus stop to your home"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('nearest_bus_stop') border-red-500 @enderror"
                                    value="{{ old('nearest_bus_stop') }}">

                                @error('nearest_bus_stop')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="office_address" class="sr-only">Business or office address</label>
                                <textarea name="office_address" id="office_address" rows="3"
                                    placeholder="Business or office address"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('office_address') border-red-500 @enderror"
                                    value="{{ old('office_address') }}"></textarea>

                                @error('office_address')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="prayer_request" class="sr-only">Prayer Request</label>
                                <textarea name="prayer_request" id="prayer_request" placeholder="Prayer Request" rows="3"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('prayer_request') border-red-500 @enderror"
                                    value="{{ old('prayer_request') }}"></textarea>

                                @error('prayer_request')
                                    <span class="text-red-500 mt-2 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="date" class="sr-only">Date</label>
                                <input type="date" name="date" id="date" placeholder="Date"
                                    class="bg-gray-100 border-l-8  border-gray-600 w-full p-3 rounded-sm @error('date') border-red-500 @enderror"">

                                            @error('date')
                                                                    <span class=" text-red-500 mt-2 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @if ($status ?? '' == 1)
                        <div class="bg-green-500 text-white my-3 p-2 text-lg rounded-md" role="alert">
                            <strong>User Added Successfully</strong>
                        </div>
                    @else

                    @endif

                    <div class="my-2">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white rounded w-full px-3 py-3">Register</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
