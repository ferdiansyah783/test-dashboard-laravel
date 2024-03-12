<x-layout>
    <x-nav.navbar />

    <x-errors.form />

    <div class="w-full p-10 mt-20">
        <div class="w-full flex justify-between mb-5">
            <form action="{{ route('forntstore.transaction') }}" method="get" class="w-1/3">
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
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg mb-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            user
                        </th>
                        <th scope="col" class="px-6 py-3">
                            product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            reference number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $transaction->customer->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $transaction->product->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->reference_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->quantity }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->total_amount }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->created_at }}
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b w-full dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-full text-center text-2xl p-5" colspan="5">No transaction found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($transactions->lastPage() > 0)
            <nav class="w-full flex justify-center">
                <ul class="flex">
                    <li class="{{ $transactions->onFirstPage() ? 'disabled' : '' }} mr-3">
                        <a href="{{ $transactions->previousPageUrl() }}"
                            class="block px-3 py-1 rounded-md hover:bg-gray-200">Previous</a>
                    </li>

                    @for ($i = 1; $i <= $transactions->lastPage(); $i++)
                        <li class="{{ $transactions->currentPage() == $i ? 'bg-blue-500 text-white rounded-md' : '' }}">
                            <a href="{{ $transactions->url($i) }}"
                                class="block px-3 py-1 rounded-md hover:bg-gray-200">{{ $i }}</a>
                        </li>
                    @endfor

                    <button class="{{ $transactions->currentPage() == $transactions->lastPage() ? 'disabled' : '' }} ml-3">
                        <a href="{{ $transactions->nextPageUrl() }}"
                            class="block px-3 py-1 rounded-md hover:bg-gray-200">Next</a>
                    </button>
                </ul>
            </nav>
        @endif
    </div>
</x-layout>
