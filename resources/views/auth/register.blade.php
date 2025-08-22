<x-layout>
    <div class="max-w-md mx-auto mt-8 bg-white p-6 rounded-xl shadow">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Register</h2>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" name="name" required value="{{ old('name') }}"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" required value="{{ old('email') }}"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" name="password" required
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Re-enter password:</label>
                <input type="password" name="password_confirmation" required
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
            </div>

            <button type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
                Register
            </button>
        </form>

        <!-- validation errors -->
        @if($errors->any())
            <ul class="mt-4 p-3 bg-red-100 rounded-lg">
                @foreach($errors->all() as $error)
                    <li class="text-red-600 text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</x-layout>
