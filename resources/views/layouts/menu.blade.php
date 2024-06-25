<div class="flex justify-center bg-primary-700 dark:bg-primary-90">
    <div class="mx-8 px-4 rounded-xl hover:bg-primary-600">
        <a href="{{ route('getUser') }}" class="flex flex-col justify-center">
            <span class="material-symbols-outlined text-4xl flex justify-center">
                person
            </span>
            <label class="flex justify-center text-base">Users</label>
        </a>
    </div>
    <div class="mx-8 px-4 rounded-xl hover:bg-primary-600">
        <a href="{{ route('getProducts') }}" class="flex flex-col justify-center">
            <span class="material-symbols-outlined text-4xl flex justify-center">
                inventory_2
            </span>
            <label class="flex justify-center text-base">Products</label>
        </a>
    </div>
    <div class="mx-8 px-4 rounded-xl hover:bg-primary-600">
        <a href="{{ route('getShop') }}" class="flex flex-col justify-center">
            <span class="material-symbols-outlined text-4xl flex justify-center">
                shop
            </span>
            <label class="flex justify-center text-base">Shops</label>
        </a>
    </div>
    <div class="mx-8 px-4 rounded-xl hover:bg-primary-600">
        <a href="{{ route('getCartItems') }}" class="flex flex-col justify-center">
            <span class="material-symbols-outlined text-4xl flex justify-center">
                shopping_cart
            </span>
            <label class="flex justify-center text-base">Carts</label>
        </a>
    </div>
    <div class="mx-8 px-4 rounded-xl hover:bg-primary-600">
        <a href="{{ route('viewOrder') }}" class="flex flex-col justify-center">
            <span class="material-symbols-outlined text-4xl flex justify-center">
                list_alt
            </span>
            <label class="flex justify-center text-base">Orders</label>
        </a>
    </div>
    <div class="mx-8 px-4 rounded-xl hover:bg-primary-600">
        <a href="{{ route('index') }}" class="flex flex-col justify-center">
            <span class="material-symbols-outlined text-4xl flex justify-center">
                reviews
            </span>
            <label class="flex justify-center text-base">Reviews</label>
        </a>
    </div>
</div>
