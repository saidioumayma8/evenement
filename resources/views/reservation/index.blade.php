<x-app-layout>

<x-slot name="slot">
    {{-- <div class="cart">
        <h1>{{ $event->title }}</h1>
        <p>{{ $event->description }}</p>
        <p>Date: {{ $event->date }}</p>
        <p>Lieu: {{ $event->lieu }}</p>
        <p>Durai: {{ $event->durai }}</p>
        <p>Prix: {{ $event->prix }}</p>
        <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" style="max-width: 300px;">

        @if (!$event->is_reserved)
            <form action="{{ route('events.reserve', $event) }}" method="POST">
                @csrf
                <button type="submit">Reserve</button>
            </form>
        @else
            <p>This event is already reserved.</p>
        @endif
    </div> --}}
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
</x-slot>
</x-app-layout>
