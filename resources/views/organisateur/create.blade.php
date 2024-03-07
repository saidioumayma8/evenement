<x-app-layout>
    <x-slot name="header">
        <!-- Your header content goes here -->
    </x-slot>

    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="container">
        <h2>Create Event</h2>
        <form action="{{ route('organisateur.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="lieu">Lieu:</label>
                <input type="text" name="lieu" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="durai">Duration:</label>
                <input type="time" name="durai" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="prix">Price:</label>
                <input type="number" name="prix" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="image">Image URL:</label>
                <input type="text" name="image" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="isvalide">Is Valid:</label>
                <select name="isvalide" class="form-control" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
