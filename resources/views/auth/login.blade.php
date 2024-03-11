<x-layout>
    <x-slot:title>Login Page</x-slot:title>

    <div class="flex justify-center items-center w-full h-screen">
        <div class="max-w-md w-full bg-white p-8 mt-4 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-4 text-center">Login</h2>
            <form action="login" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    @if ($errors->count())
                        @foreach ($errors->all() as $error)
                            <p class="text-sm text-red-500 my-2">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
                </div>
            </form>
            <p class="text-center text-gray-500 text-sm">Don't have an account? <a href="#"
                    class="text-blue-500 hover:text-blue-700">Register</a></p>
        </div>
    </div>
</x-layout>
