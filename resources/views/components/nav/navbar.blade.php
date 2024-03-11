<nav class="w-full fixed top-0 bg-white shadow-sm">
    <ul class="flex justify-center items-center space-x-14 py-4 font-semibold">
        <li>
            <a href="/product">Products</a>
        </li>
        <li>
            <a href="/profile">Profile</a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="post" class=" mx-2 flex justify-end">
                @csrf
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Logout</button>
            </form>
        </li>
    </ul>
</nav>
