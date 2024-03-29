<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                <head>
                    <meta charset="UTF-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    <link rel="icon" href="images/favicon.ico" />
                    <link
                        rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
                        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
                        crossorigin="anonymous"
                        referrerpolicy="no-referrer"
                    />
                    <script src="https://cdn.tailwindcss.com"></script>
                    <script>
                        tailwind.config = {
                            theme: {
                                extend: {
                                    colors: {
                                        laravel: "#ef3b2d",
                                    },
                                },
                            },
                        };
                    </script>
                    <title>Evento | Find Laravel Jobs & Projects</title>
                </head>
                <body class="mb-48">
                    <nav class="flex justify-between items-center mb-4">
                        <a href="index.html"
                            ><img class="w-24" src="images/logo.png" alt="" class="logo"
                        /></a>
                        <ul>
                            {{-- <li>
                                <a href="register.html" class="hover:text-laravel"
                                    ><i class="fa-solid fa-user-plus"></i> Register</a
                                >
                            </li>
                            <li>
                                <a href="login.html" class="hover:text-laravel"
                                    ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                                    Login</a
                                >
                            </li> --}}
                            @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    {{-- <li>
                                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                    </li> --}}
                                    @else
                                    <li>
                                        <a href="{{ route('login') }}" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>Log in</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}" class="hover:text-laravel"><i class="fa-solid fa-user-plus">Register</a>
                                        </li>
                                    @endif
                                @endauth
                            </div>
                        @endif
                        </ul>
                    </nav>
                    <!-- Search -->
                    <form action="{{ route('organisateur.index') }}" method="GET">
                        <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                            <div class="absolute top-4 left-3">
                                <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                            </div>
                            <input
                                type="text"
                                name="search"
                                class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                                placeholder="Search for an event..."
                            />
                            <div class="absolute top-2 right-2">
                                <button
                                    type="submit"
                                    class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
                                >
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Hero -->
                    <section
                        class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
                    >
                        <div
                            class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                            style="background-image: url('images/laravel-logo.png')"
                        ></div>

                        <div class="z-10">
                            <h1 class="text-6xl font-bold uppercase text-white">
                                <span class="text-black">Evento</span>
                            </h1>
                            <p class="text-2xl text-gray-200 font-bold my-4">
                                Find or post Laravel jobs & projects
                            </p>
                            <div>
                                <a
                                    href="register.html"
                                    class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                                    >Sign Up to List a Gig</a
                                >
                            </div>
                        </div>
                    </section>

                    <main>


                        <div
                            class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
                        >
                            <!-- Item 1 -->
                            @foreach($events as $event)
                            <div class="bg-gray-50 border border-gray-200 rounded p-6">

                                <div class="flex">
                                    <img class="w-50 h-20" src="storage/{{ $event->image }}" alt="">
                                    <div>
                                        <h3 class="text-2xl">
                                            <a href="{{ route('reservation.daitalsevent', $event->id) }}">{{ $event->title }}</a>
                                        </h3>
                                        <ul class="flex">


                                            <li
                                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                            >
                                                <a href="#"> {{ $event->date }}</a>
                                            </li>
                                            <li
                                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                            >
                                                <a href="#"> {{ $event->durai }}</a>
                                            </li>
                                            <li
                                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                            >
                                                <a href="#">{{ $event->prix }}Dh</a>
                                            </li>
                                            {{-- <li
                                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                            >
                                                <a href="#">Vue</a>
                                            </li> --}}
                                        </ul>
                                        <div class="text-lg mt-4">
                                            <i class="fa-solid fa-location-dot"></i>{{ $event->lieu }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </main>

                    {{-- <footer
                        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
                    >
                        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

                        <a
                            href="create.html"
                            class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                            >Post Job</a
                        >
                    </footer> --}}
                </body>
            </html>

            </div>
        </div>
    </div>
</x-app-layout>
