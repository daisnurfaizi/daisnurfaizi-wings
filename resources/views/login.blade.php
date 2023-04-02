<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/Darkmode.css') }}">


</head>

<body>


    {{-- <template> --}}
    {{-- <form action="{{ route('cekLogin') }}" method="POST"> --}}
    <div x-data="{ mode: 'dark' }" class="flex justify-center items-center h-screen"
        :class="{
            'bg-gray-800 ': mode === 'dark',
            'bg-gray-100': mode === 'light'
        }">
        <div class="absolute top-0 right-0 p-2">
            <label class="text-sm text-gray-500" for="dark-mode-toggle">Light mode</label>
            <input type="checkbox" id="dark-mode-toggle" class="ml-2"
                @change="mode = mode === 'dark' ? 'light' : 'dark'" />
        </div>
        <div class="w-full max-w-sm">
            <div class="bg-gray-50 rounded-lg shadow-lg p-6"
                :class="{
                    'bg-gray-900 bg-opacity-75': mode === 'dark',
                    'bg-white': mode === 'light'
                }">
                <div class="flex justify-center items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-20 h-20">
                </div>
                <h3 class="text-xl font-medium "
                    :class="{
                        'text-gray-100': mode === 'dark',
                        'text-gray-900': mode === 'light'
                    }">
                    Login </h3>
                <form class="space-y-6" action="{{ route('cekLogin') }}" method="POST">
                    @csrf
                    <div>
                        <label for="username" class="text-sm font-medium"
                            :class="{
                                'text-gray-100': mode === 'dark',
                                'text-gray-900': mode === 'light'
                            }">Your
                            Account</label>
                        <input type="text" name="username" id="username"
                            class="bg-gray-900 border border-gray-800 text-gray-100 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-400 dark:text-gray-900"
                            placeholder="Your  ID" required />
                    </div>
                    <div>
                        <label for="password" class="text-sm font-medium "
                            :class="{
                                'text-gray-100': mode === 'dark',
                                'text-gray-900': mode === 'light'
                            }">Your
                            password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-900 border border-gray-800 text-gray-100 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-400 dark:text-gray-900"
                            required />
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 transition ease-in-out duration-150">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- </form> --}}
    {{-- </template> --}}








</body>

</html>
