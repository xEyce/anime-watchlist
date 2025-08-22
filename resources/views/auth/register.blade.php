<x-layout>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <h2>Register</h2>
        <label for="username">
            Username:
            <input type="text" name="name" required value={{ old('name') }}>
        </label>

        <label for="email">
            Email:
            <input type="email" name="email" required value={{ old('name') }} >
        </label>

        <label for="password">
            Password:
            <input type="password" name="password" required>
        </label>

        <label for="password_confirmation" required>
            Re-enter password:
            <input type="password" name="password_confirmation">
        </label>

        <button type="submit">Register</button>

        <!-- validation errors -->
        @if($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
    

</x-layout>