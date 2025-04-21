@extends('layouts.guest')

@section('content')

<head>
    <style>
        html, body {
            height: 100%;
            overflow: hidden;
            margin: 0;
        }

        .max-h-screen {
            max-height: 100vh;
        }

        .overflow-hidden {
            overflow: hidden !important;
        }
    </style>
</head>

<div class="text-center mt-8 mb-4">
    <h1 class="text-3xl font-bold text-black tracking-wide">Sales System PT Smart</h1>
</div>

<section class="max-h-screen overflow-hidden flex items-center justify-center bg-gray-100">
  <div class="w-full bg-white rounded-lg shadow sm:max-w-md xl:p-0">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl text-center">
              Sign in to your account
          </h1>
          
          @if ($errors->any())
              <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <form method="POST" action="{{ route('login') }}" class="space-y-4">
              @csrf
              <div>
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                  <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"  placeholder="name@company.com" required>
              </div>
              <div>
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                  <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" required>
              </div>
              <button type="submit" class="w-full text-white font-bold bg-blue-700 hover:bg-blue-800 transition duration-200 rounded-lg text-sm px-5 py-2.5 text-center mt-6">Sign in</button>
              <p class="text-sm font-light text-gray-500 text-center">
                  Don’t have an account yet? <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline">Sign up</a>
              </p>
          </form>
      </div>
  </div>
</section>
@endsection
