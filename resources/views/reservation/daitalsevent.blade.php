<!DOCTYPE html>
<html lang="en">
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
        <title>LaraGigs | Find Laravel Jobs & Projects</title>
    </head>
    <body class="mb-48">
       

        <main>
            <!-- Search -->
            <form action="">
                <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                    <div class="absolute top-4 left-3">
                        <i
                            class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                        ></i>
                    </div>
                    <input
                        type="text"
                        name="search"
                        class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                        placeholder="Search Laravel Gigs..."
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
            {{-- <a href="{{ route('dashboard') }}" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a> --}}
            <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                    @if ($event)

                    <div class="flex">
                        <img class="w-50 h-20" src="storage/{{ $event->image }}" alt="">

                        <div>
                            <h3 class="text-2xl">
                                <a href="show.html">{{ $event->title }}</a>
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
                    <div>

                        <div class="text-lg space-y-6">
                            <p>
                                {{ $event->description }}
                            </p>

                        @auth
                        <form action="{{ route('events.reserve') }}" method="POST" >
@csrf
                            <input type="text" value="{{ $event->id }}" name="eventsid"><button
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            >
                            reserve</button
                            ></form>

                        @endauth

                        </div>
                    </div>
                </div>
                @else
    <p>No events found.</p>
@endif
                </div>
            </div>
        </main>

    </body>
</html>
