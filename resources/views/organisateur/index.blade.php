<x-app-layout>

    <x-slot name="header">
        <!-- Your header content goes here -->
    </x-slot>

    <x-slot name="slot">
        @if (isset($event) && !empty($event))
            <div class="event-card">
                <div class="event-card__body">
                    <div class="event-card__info">
                        <h2 class="event-card__title">{{ $event->title }}</h2>
                        <p class="event-card__description">{{ $event->description }}</p>
                        <div class="event-card__details">
                            <div class="event-card__date">{{ $event->date }}</div>
                            <div class="event-card__location">{{ $event->lieu }}</div>
                            <div class="event-card__duration">{{ $event->durai }}</div>
                            <div class="event-card__price">Price: {{ $event->prix }}</div>
                            <!-- Add more fields as needed -->
                        </div>
                    </div>
                    <div class="event-card__image">
                        <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image">
                    </div>
                </div>
            </div>
        @else
            <div class="flex flex-col items-center justify-center h-screen">
                <h1>You don't have an event. Please add your event information.</h1>
                <a href="{{ route('organisateur.create') }}">Add Event</a>
            </div>
        @endif
    </x-slot>

</x-app-layout>
