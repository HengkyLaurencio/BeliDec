<x-shop-template>  
      <main class="px-6 md:px-12 lg:px-24 xl:px-1 py-10">
          <div class="overflow-x-auto">
              <table class="w-full dark:bg-primary-100 rounded-lg overflow-hidden">
                  <thead class="bg-primary-600 dark:bg-primary-200">
                      <tr>
                          <th class="px-6 py-4 text-center border-r border-b">Product Name</th>
                          <th class="px-6 py-4 text-center border-r border-b w-48">Quantity</th>
                          <th class="px-6 py-4 text-center border-r border-b">Total Price</th>
                          <th class="px-6 py-4 text-center border-r">Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($orderData as $index => $order)
                      <tr class=" hover:bg-primary-100">
                          <td class="border-r border-b px-6 py-4 text-center">{{ $order->product->name }}</td>
                          <td class="border-r border-b px-6 py-4 text-center">{{ $order->quantity }}</td>
                          <td class="border-r border-b px-6 py-4 text-center w-48">Rp {{ number_format($order->price * $order->quantity, 0, ',', '.') }}</td> <!-- Adjusted width -->
                          <td class="border-r border-b px-6 py-4 text-center">{{ $order->order->status }}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </main>
  </x-shop-template>