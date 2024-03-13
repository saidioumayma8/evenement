
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

    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f0f0;">
        <div style="max-width: 600px; width: 100%; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <h2 style="color: #333; text-align: center; margin-bottom: 20px;">Create Event</h2>
            <form action="{{ route('organisateur.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="margin-bottom: 15px;">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
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
                    <input type="file" name="image" class="form-control" required>
                </div>

                {{-- <div class="form-group">
                    <label for="isvalide">Is Valid:</label>
                    <select name="isvalide" class="form-control" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div> --}}
                <button type="submit" style="background-color: #dc3434; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%;">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>

