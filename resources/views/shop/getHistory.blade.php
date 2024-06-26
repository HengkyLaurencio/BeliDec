<x-shop-template>
<main class="px-6 md:px-12 lg:px-24 xl:px-48 py-4">
    <div class="overflow-x-auto">
      <table class="w-full bg-white dark:bg-primary-dark dark:text-text-dark">
        <thead class="bg-primary-200 dark:bg-gray">
          <tr>
            <th class="px-6 py-4 text-center dark:text-center">Product Name</th>
            <th class="px-6 py-4 text-center dark:text-center">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orderData as $index => $order)
            <tr class="{{ $index % 2 == 0 ? 'bg-even' : '' }} hover:bg-gray-100 dark:hover:bg-gray-600">
                <td class="px-6 py-4 text-left">{{ $order->product->name }}</td>
                <td class="px-6 py-4 text-left">{{ $order->order->status }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </main>
</x-shop-template>