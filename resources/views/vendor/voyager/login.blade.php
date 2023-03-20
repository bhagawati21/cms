@extends('partials.layout')

@section('title')
    {{ __('Login') }}
@endsection

<!-- Top Bar -->
@section('content')
<section class="top-bar">

    <!-- Brand -->
    <span class="brand">Laravel CMS</span>

    <nav class="flex items-center ltr:ml-auto rtl:mr-auto">

        <!-- Dark Mode -->
        <label class="switch switch_outlined" data-toggle="tooltip" data-tippy-content="Toggle Dark Mode">
            <input id="darkModeToggler" type="checkbox">
            <span></span>
        </label>
        <!-- Home button -->
        <a href="/" class="btn btn_primary uppercase ltr:ml-5 rtl:mr-5">Home</a>
        <!-- Register -->
        <!-- <a href="auth-register.html" class="btn btn_primary uppercase ltr:ml-5 rtl:mr-5">Register</a> -->
    </nav>
</section>

<div class="container flex items-center justify-center mt-20 py-10">
    <div class="w-full md:w-1/2 xl:w-1/3">
        <div class="mx-5 md:mx-10">
            <h2 class="uppercase">Welcome Back!</h2>
            <h4 class="uppercase">Login Here</h4>
        </div>
        <form class="card mt-5 p-5 md:p-10" action="{{ route('voyager.login') }}" method="POST">
            @if(!$errors->isEmpty())
                <div class="mb-2 font-bold" style="color: #CF0A0A;">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ csrf_field() }}
            <div class="mb-5">
                <label class="label block mb-2" for="email">Email</label>
                <input id="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="mb-5">
                <label class="label block mb-2" for="password">Password</label>
                <label class="form-control-addon-within">
                    <input id="password" name="password" type="password" class="form-control border-none" placeholder="Password" required>
                    <span class="flex items-center ltr:pr-4 rtl:pl-4">
                        <button type="button"
                            class="text-gray-300 dark:text-gray-700 la la-eye text-xl leading-none"
                            data-toggle="password-visibility"></button>
                    </span>
                </label>
            </div>
            <div class="mb-5" id="rememberMeGroup">
                <input type="checkbox" name="remember" id="remember" value="1"><label for="remember"> {{ __('voyager::generic.remember_me') }}</label>
            </div>
            <div class="flex items-center">
                <!-- <a href="" class="text-sm uppercase">Forgot Password?</a> -->
                <button type="submit" class="btn btn_primary uppercase">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection