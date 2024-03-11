<div class="flex transition-all duration-300 ease-in-out bg-black/10 w-full h-screen fixed top-0 left-0 justify-center items-center">
    <div class="w-[28rem] mx-auto mt-10 bg-white rounded-md p-8 shadow-md">
        <h2 class="text-2xl font-semibold mb-6">{{ $title }}</h2>
        <form id="form-modal" action="{{ $action }}" method="POST">
            @csrf
            @method($method)
            <div class="mb-3">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Product Name:</label>
                <input type="text" id="name" name="name"
                    class="w-full border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                    placeholder="Enter product name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description:</label>
                <textarea id="description" name="description"
                    class="w-full border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500" rows="4"
                    placeholder="Enter product description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="block text-gray-700 font-semibold mb-2">Price:</label>
                <input type="number" id="price" name="price"
                    class="w-full border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                    placeholder="Enter product price" min="0" step="0.01" required>
            </div>
            <div class="mb-5">
                <label for="stock" class="block text-gray-700 font-semibold mb-2">Stock:</label>
                <input type="number" id="stock" name="stock"
                    class="w-full border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                    placeholder="Enter product stock" min="0" step="0.01" required>
            </div>
            <div class="flex justify-end gap-x-3">
                <button id="{{ $id }}" type="button" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">{{ $button }}</button>
            </div>
        </form>
    </div>
</div>