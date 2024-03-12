<x-layout>
    <x-slot:title>Profile Page</x-slot:title>

    <div class="mb-24">
        <x-nav.navbar />
    </div>

    <div class="w-full h-screen flex flex-col items-center">
        <div class="max-w-sm w-full h-52 bg-white rounded-lg dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10">
                <img class="w-28 h-28 mb-3 rounded-full shadow-lg" src="https://source.unsplash.com/480x480?people"
                    alt="Bonnie image" />
                <h5 class="mb-1 text-2xl font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</h5>
                <span class="text-gray-500 dark:text-gray-400">{{ auth()->user()->role->name }}</span>
            </div>
        </div>

        <h2 class="underline text-xl">My order</h2>

        <div class="p-10 grid grid-cols-4 gap-4 max-w-[1080px] mx-auto">
            @forelse ($transactions as $transaction)
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="p-4 rounded-t-lg" src="https://source.unsplash.com/480x480?watch"
                            alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="font-semibold text-lg tracking-tight text-gray-900 dark:text-white">{{ $transaction->product->name }}</h5>
                        </a>
                        <div class="flex items-center mb-3">
                            @php
                                $description = $transaction->product->description;
                                if (strlen($description) > 20) {
                                    $description = substr($description, 0, 55) . '...';
                                }
                            @endphp
                            <span class="text-sm leading-4">{{ $description }}</span>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-gray-600 dark:text-white">{{ $transaction->quantity }} product</span>
                            <p class="text-orange-500">${{ $transaction->total_amount }}</p>
                        </div>
                        <div class="flex items-center justify-center">
                            <button id="open-modal-transaction-detail"
                                data-product-name="{{ $transaction->product->name }}"
                                data-quantity="{{ $transaction->quantity }}"
                                data-total-amount="{{ $transaction->total_amount }}"
                                data-refrence-number="{{ $transaction->reference_number }}"
                                data-created-at="{{ $transaction->created_at }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</button>
                        </div>
                    </div>
                </div>
            @empty
                <p>You dont have transaction</p>
            @endforelse
        </div>
    </div>

    <div id="modal-transaction-detail" class="hidden">
        <x-modals.transaction-detail />
    </div>

    <script>
        const openModalTransactionDetail = document.querySelectorAll('#open-modal-transaction-detail');
        const modalTransactionDetail = document.getElementById('modal-transaction-detail');
        const closeModalTransactionDetail = document.getElementById('close-modal-transaction-detail');

        openModalTransactionDetail.forEach(button => {
            button.addEventListener('click', () => {
                const productName = button.dataset.productName;
                const quantity = button.dataset.quantity;
                const totalAmount = button.dataset.totalAmount;
                const refrenceNumber = button.dataset.refrenceNumber;
                const createdAt = button.dataset.createdAt;

                console.log(refrenceNumber);

                modalTransactionDetail.querySelector('#product_name').value = productName;
                modalTransactionDetail.querySelector('#quantity').value = quantity;
                modalTransactionDetail.querySelector('#total_amount').value = totalAmount;
                modalTransactionDetail.querySelector('#refrence-number').value = refrenceNumber;
                modalTransactionDetail.querySelector('#created_at').value = createdAt;

                modalTransactionDetail.classList.remove('hidden')
                modalTransactionDetail.classList.add('flex')
            })

        })

        closeModalTransactionDetail.addEventListener('click', () => {
            modalTransactionDetail.classList.remove('flex')
            modalTransactionDetail.classList.add('hidden')
        })
    </script>
</x-layout>
