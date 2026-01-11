<x-layouts.auth title="Login">
    <div class="flex flex-col gap-6">
        {{-- Header --}}
        <div class="text-center">
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ __('Log in to your account') }}
            </h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Enter your email and password below to log in') }}
            </p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-wira-dark-900 dark:text-green-400"
                role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-wira-dark-700 dark:text-red-400"
                role="alert">
                <ul class="space-y-1 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-5">
            @csrf

            {{-- Email Address --}}
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('Email address') }}
                </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-wira-dark-500 focus:border-wira-dark-500 block w-full p-2.5 dark:bg-wira-dark-700 dark:border-wira-dark-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wira-dark-400 dark:focus:border-wira-dark-400"
                    placeholder="email@example.com" required autofocus autocomplete="email" />
            </div>

            {{-- Password --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('Password') }}
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm font-medium text-wira-dark-500 hover:underline dark:text-wira-dark-400"
                            wire:navigate>
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>
                <input type="password" name="password" id="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-wira-dark-500 focus:border-wira-dark-500 block w-full p-2.5 dark:bg-wira-dark-700 dark:border-wira-dark-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wira-dark-400 dark:focus:border-wira-dark-400"
                    placeholder="••••••••" required autocomplete="current-password" />
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                    class="w-4 h-4 text-wira-dark-500 bg-gray-100 border-gray-300 rounded focus:ring-wira-dark-500 dark:focus:ring-wira-dark-500 dark:ring-offset-wira-dark-900 focus:ring-2 dark:bg-wira-dark-700 dark:border-wira-dark-600" />
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ __('Remember me') }}
                </label>
            </div>

            {{-- Submit Button --}}
            <button type="submit" id="login-button"
                class="w-full text-white bg-wira-dark-500 hover:bg-wira-dark-600 focus:ring-4 focus:outline-none focus:ring-wira-dark-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-wira-dark-500 dark:hover:bg-wira-dark-600 dark:focus:ring-wira-dark-700">
                {{ __('Log in') }}
            </button>
        </form>

        {{-- Register Link --}}
        @if (Route::has('register'))
            <p class="text-sm text-center text-gray-500 dark:text-gray-400">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}"
                    class="font-medium text-wira-dark-500 hover:underline dark:text-wira-dark-400" wire:navigate>
                    {{ __('Sign up') }}
                </a>
            </p>
        @endif
    </div>
</x-layouts.auth>
