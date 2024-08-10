<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        /* Styling CSS jika diperlukan */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Transactions Report</h1>
    <x-table :heads="$heads">
        @forelse ($transactions_PDF as $item)
            <tr wire:key="{{ $item->id }}"
                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->invoice }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->user->name }}
                </td>

                <td class="px-6 py-4">
                    {{ $item->product->name }}
                </td>
                <td class="px-6 py-4">
                    Rp. {{ number_format($item->transaction_total) }}
                </td>

                <td class="px-6 py-4">
                    {{ $item->qty }}
                </td>

                <td class="px-6 py-4">
                    {{ $item->transaction_status }}
                </td>

                <td class="px-6 py-4">
                    {{ $item->created_at->diffForHumans() }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Not Found</td>
            </tr>
        @endforelse
    </x-table>

    @livewireScripts
</body>

</html>
