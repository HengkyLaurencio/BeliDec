@if (session('success'))
    <div id="notification" class="fixed pointer-events-none object-right z-50 inset-0">
        <div class="flex items-start justify-end">
            <div class=" bg-white rounded-lg mt-1 text-left w-80">
                <div class="flex flex-row">
                    <div class="flex items-center justify-center h-12 w-12 m-3 rounded-full bg-green-100">
                        <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="flex flex-col w-60 justify-center text-center">
                        <h3 class="text-lg text-center leading-4 font-medium text-gray-900" id="notification-message">
                            Success
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('notification').style.display = 'none';
            @php
            session()->forget('success');
            @endphp
        }, 3000);
    </script>
@endif

@if (session('error'))
    <div id="notification" class="fixed pointer-events-none object-right z-50 inset-0">
        <div class="flex items-start justify-end">
            <div class=" bg-gray-100 rounded-lg mt-1 text-left w-80">
                <div class="flex flex-row">
                    <div class="flex items-center justify-center h-12 w-12 m-3 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div class="flex flex-col w-60 justify-center text-center">
                        <h3 class="text-lg text-center leading-4 font-medium text-red-600" id="notification-message">
                            Error
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                {{ session('error') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('notification').style.display = 'none';
            @php
            session()->forget('error');
            @endphp
        }, 3000);
    </script>
@endif

@if ($errors->any())
    <div id="notification" class="fixed pointer-events-none object-right z-50 inset-0">
        <div class="flex items-start justify-end">
            <div class="bg-gray-100 rounded-lg mt-1 text-left w-80">
                <div class="flex flex-row">
                    <div class="flex items-center justify-center h-12 w-12 m-3 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div class="flex flex-col w-60 justify-center text-center">
                        <h3 class="text-lg text-center leading-4 font-medium text-red-600" id="notification-message">
                            Error
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('notification').style.display = 'none';
        }, 3000);
    </script>
@endif
