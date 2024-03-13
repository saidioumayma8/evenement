<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1> Events List</h1>
            @foreach($events as $event)
              <div>
                <table border="1">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Durai</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th>Is Valid</th>
                        <th>User ID</th>
                    </tr>
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->lieu }}</td>
                        <td>{{ $event->durai }}</td>
                        <td>{{ $event->prix }}Dh</td>
                        <td>
                            @if($event->image!==null)
                              <img class="w-20 h-20" src="/storage/{{$event->image}}" alt="">
                            @else
                                No image file
                            @endif
                        </td>
                        <td><a href="{{ route("valid",$event->id) }}">valid</a></td>
                        <td>{{ Auth::id() }}</td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</x-admin-layout>
