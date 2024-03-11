<x-layout>
    @if (session('success'))
        <x-toasts.popup text="{{ session('success') }}" />
    @endif

    <x-nav.backstore-nav />

    <x-errors.form />

    <div class="w-full p-10 mt-20">
        <div class="w-full flex justify-between mb-5">
            <form action="{{ route('backstore') }}" method="get" class="w-1/3">
                <label for="search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search" name="search"
                        class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search" />
                    <button type="submit"
                        class="text-white absolute end-2 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>

            <button id="open-modal-create-product" class="px-5 py-1 bg-blue-500 text-white rounded-lg">tambah</button>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg mb-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $i => $product)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->stock }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-5 flex">
                                <button id="open-modal-update-product" data-product-id="{{ $product->id }}"
                                    data-product-name="{{ $product->name }}"
                                    data-product-description="{{ $product->description }}"
                                    data-product-price="{{ $product->price }}"
                                    data-product-stock="{{ $product->stock }}"
                                    class="font-medium inline text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                <button id="open-modal-delete-product" data-product-id="{{ $product->id }}"
                                    class="font-medium inline text-red-700 dark:text-red-600 hover:underline">Remove</button>
                            </td>
                        </tr>
                    @empty
                        <tr
                            class="bg-white border-b w-full dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-full text-center text-2xl p-5" colspan="5">No product found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($products->lastPage() > 0)
            <nav class="w-full flex justify-center">
                <ul class="flex">
                    <li class="{{ $products->onFirstPage() ? 'disabled' : '' }} mr-3">
                        <a href="{{ $products->previousPageUrl() }}"
                            class="block px-3 py-1 rounded-md hover:bg-gray-200">Previous</a>
                    </li>

                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <li class="{{ $products->currentPage() == $i ? 'bg-blue-500 text-white rounded-md' : '' }}">
                            <a href="{{ $products->url($i) }}"
                                class="block px-3 py-1 rounded-md hover:bg-gray-200">{{ $i }}</a>
                        </li>
                    @endfor

                    <button class="{{ $products->currentPage() == $products->lastPage() ? 'disabled' : '' }} ml-3">
                        <a href="{{ $products->nextPageUrl() }}"
                            class="block px-3 py-1 rounded-md hover:bg-gray-200">Next</a>
                    </button>
                </ul>
            </nav>
        @endif
    </div>

    <div id="modal-create-product" class="hidden">
        <x-modals.modal-product id="close-modal-create-product" title="Create Product"
            action="{{ route('product.store') }}" method="POST" button="Add Product" />
    </div>

    <div id="modal-update-product" class="hidden">
        <x-modals.modal-product id="close-modal-update-product" title="Update Product" action="/product/:product"
            method="PUT" button="Update Product" />
    </div>

    <div id="modal-delete-product" class="hidden">
        <x-modals.product-delete />
    </div>

    <script>
        const openModalCreateProduct = document.getElementById('open-modal-create-product');
        const modalCreate = document.getElementById('modal-create-product');
        const closeModalCreateProduct = document.getElementById('close-modal-create-product');

        openModalCreateProduct.addEventListener('click', () => {
            modalCreate.classList.remove('hidden')
            modalCreate.classList.add('flex')
        })

        closeModalCreateProduct.addEventListener('click', () => {
            modalCreate.classList.remove('flex')
            modalCreate.classList.add('hidden')
        })

        const openModalUpdateProduct = document.querySelectorAll('#open-modal-update-product');
        const modalUpdate = document.getElementById('modal-update-product');
        const closeModalUpdateProduct = document.getElementById('close-modal-update-product');

        openModalUpdateProduct.forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.dataset.productId;
                const productName = button.dataset.productName;
                const productDescription = button.dataset.productDescription;
                const productPrice = button.dataset.productPrice;
                const productStock = button.dataset.productStock;

                modalUpdate.querySelector('#name').value = productName;
                modalUpdate.querySelector('#description').value = productDescription;
                modalUpdate.querySelector('#price').value = productPrice;
                modalUpdate.querySelector('#stock').value = productStock;
                modalUpdate.querySelector('form').action = `/product/${productId}`

                modalUpdate.classList.remove('hidden')
                modalUpdate.classList.add('flex')
            })
        })

        closeModalUpdateProduct.addEventListener('click', () => {
            modalUpdate.classList.remove('flex')
            modalUpdate.classList.add('hidden')
        })

        const openModalDeleteProduct = document.querySelectorAll('#open-modal-delete-product');
        const modalDelete = document.getElementById('modal-delete-product');
        const closeModalDeleteProduct = document.getElementById('close-modal-delete-product');

        openModalDeleteProduct.forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.dataset.productId;
                modalDelete.querySelector('form').action = `/product/${productId}`
                console.log(modalDelete)

                modalDelete.classList.remove('hidden')
                modalDelete.classList.add('flex')
            })
        })

        closeModalDeleteProduct.addEventListener('click', () => {
            modalDelete.classList.remove('flex')
            modalDelete.classList.add('hidden')
        })
    </script>
</x-layout>
