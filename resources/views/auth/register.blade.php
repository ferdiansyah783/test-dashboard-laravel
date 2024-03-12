<x-layout>
    <x-slot:title>Register Page</x-slot:title>

    <div class="flex justify-center items-center w-full h-screen">
        <div class="max-w-md w-full bg-white p-8 mt-4 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-4 text-center">Register</h2>
            <form action="register" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
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
                <div class="mb-4">
                    <label for="role_id" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                    <select id="role_id" name="role_id"
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="2">Customer</option>
                        <option value="1">Seller</option>
                    </select>
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
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Register</button>
                </div>
            </form>
            <p class="text-center text-gray-500 text-sm">Already have an account? <a href="/login"
                    class="text-blue-500 hover:text-blue-700">Login</a></p>
        </div>
    </div>
</x-layout>
