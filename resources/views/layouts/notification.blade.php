@if (session('success'))
    <div id="notification" class="fixed z-50 inset-0">
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
            sessionStorage.removeItem('success');
        }, 3000);
    </script>
@endif

@if (session('error'))
    <div class="text-sm font-medium text-red-600">
        {{ session('error') }}
    </div>
@endif
