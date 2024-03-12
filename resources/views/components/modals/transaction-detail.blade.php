<div class="flex transition-all duration-300 ease-in-out bg-black/10 w-full h-screen fixed top-0 left-0 justify-center items-center">
    <div class="w-[28rem] mx-auto mt-10 bg-white rounded-md p-8 shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Transaction Detail</h2>
        <form action="#" method="#">
            <div class="mb-3">
                <label for="product_name" class="block text-gray-700 font-semibold mb-2">Product Name:</label>
                <input type="text" id="product_name" name="product_name" readonly
                    class="w-full border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                    placeholder="Enter product name" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="block text-gray-700 font-semibold mb-2">Quantity:</label>
                <input type="number" id="quantity" name="quantity" readonly
                    class="w-full border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                    placeholder="Enter product quantity" min="0" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="total_amount" class="block text-gray-700 font-semibold mb-2">Amount:</label>
                <input type="number" id="total_amount" name="total_amount" readonly
                    class="w-full border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                    placeholder="Enter product name" required>
            </div>
            <div class="mb-3">
                <label for="refrence-number" class="block text-gray-700 font-semibold mb-2">Reference Number:</label>
                <input type="text" id="refrence-number" name="refrence-number" readonly
                    class="w-full border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                    placeholder="Enter product name" required>
            </div>
            <div class="mb-3">
                <label for="created_at" class="block text-gray-700 font-semibold mb-2">Created At:</label>
                <input type="text" id="created_at" name="created_at" readonly
                    class="w-full border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                    placeholder="Enter product name" required>
            </div>
            <div class="flex justify-end gap-x-3">
                <button id="close-modal-transaction-detail" type="button" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">Close</button>
            </div>
        </form>
    </div>
</div>