<x-app-layout>

    <x-slot name="header">
        <!-- Your header content goes here -->
    </x-slot>

    <x-slot name="slot">
        @if (isset($events) && !empty($events))
            <div class="event-card">
                @foreach($events as $event)
                <div class="bg-gray-50 border border-gray-200 rounded p-6">

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
                            </ul>
                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i>{{ $event->lieu }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <a href="{{ route('organisateur.create') }}">Add Event</a>
            </div>
        @else
            <div class="flex flex-col items-center justify-center h-screen">
                <h1>You don't have an event. Please add your event information.</h1>
                <a href="{{ route('organisateur.create') }}">Add Event</a>
            </div>
        @endif
    </x-slot>

</x-app-layout>
