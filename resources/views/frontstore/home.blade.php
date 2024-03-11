<x-layout>
    @if (session('success'))
        <x-toasts.popup text="{{ session('success') }}" />
    @endif

    <x-errors.form />

    <x-nav.navbar />

    <div class="max-w-[1080px] mx-auto my-24">
        <div class="grid grid-cols-4 gap-4">
            @forelse ($products as $product)
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="p-4 rounded-t-lg" src="https://source.unsplash.com/480x480?watch"
                            alt="product image" />
                    </a>
                    <div class="px-4 pb-4">
                        <a href="#">
                            <h5 class="font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}
                            </h5>
                        </a>
                        <div class="flex items-center mb-1">
                            @php
                                $description = $product->description;
                                if (strlen($description) > 20) {
                                    $description = substr($description, 0, 55) . '...';
                                }
                            @endphp
                            <span class="text-sm leading-4">{{ $description }}</span>
                        </div>
                        <p class="text-sm text-gray-700 mb-2.5 underline">Stock: {{ $product->stock }}</p>
                        <div class="flex items-center justify-between pt-4">
                            <span class="text-xl font-bold text-gray-900 dark:text-white">${{ $product->price }}</span>
                            <button id="open-modal-create-transaction" data-product-id="{{ $product->id }}"
                                data-product-name="{{ $product->name }}" data-product-price="{{ $product->price }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buy</button>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-neutral-600 p-3">No product</p>
            @endforelse ()
        </div>
    </div>

    <div id="modal-create-transaction" class="hidden">
        <x-modals.modal-transaction id="close-modal-create-transaction" title="Create Transaction"
            action="{{ route('transaction.store') }}" method="POST" button="Add Transaction" />
    </div>

    <script>
        const openModalCreateTransaction = document.querySelectorAll('#open-modal-create-transaction');
        const modalCreate = document.getElementById('modal-create-transaction');
        const closeModalCreateTransaction = document.getElementById('close-modal-create-transaction');

        openModalCreateTransaction.forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.dataset.productId;
                const productName = button.dataset.productName;
                const productPrice = button.dataset.productPrice;

                modalCreate.querySelector('#product_id').value = productId
                modalCreate.querySelector('#name').value = productName;
                modalCreate.querySelector('#total_amount').value = productPrice;
                modalCreate.querySelector('#quantity').value = 1;
                const quantity = modalCreate.querySelector('#quantity');
                quantity.addEventListener('input', function() {
                    const quantityValue = parseFloat(quantity.value);
                    const newAmount = parseFloat(productPrice) * quantityValue;
                    modalCreate.querySelector('#total_amount').value = newAmount
                })

                modalCreate.classList.remove('hidden')
                modalCreate.classList.add('flex')
            })

        })

        closeModalCreateTransaction.addEventListener('click', () => {
            modalCreate.classList.remove('flex')
            modalCreate.classList.add('hidden')
        })
    </script>
</x-layout>
