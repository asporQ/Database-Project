<!DOCTYPE html>
<html lang="en" class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        .cart-item {
            transition: transform 0.2s;
        }

        .cart-item:hover {
            transform: scale(1.02);
        }

        .cart-item img {
            transition: opacity 0.2s;
        }

        .cart-item img:hover {
            opacity: 0.8;
        }

        .btn {
            transition: background-color 0.2s, transform 0.2s;
        }

        .btn:hover {
            background-color: #2563eb;
            transform: scale(1.05);
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }
    </style>
</head>

@include('layouts.navigation')

<body class="h-full bg-[#FCF7EC]">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="font-black font-inter text-4xl text-gray-800 leading-tight">
            {{ __('Carts') }}
        </h2>

        @auth
        @if($cartItems == [])
        <div class="  rounded-lg overflow-hidden mb-4">
            <div class="flex items-center p-4 ">
                <!-- <div class="w-24 h-24"></div> -->
                <div class="flex-1">
                    <span class="text-xl font-semibold">Product</span>
                </div>
                <div class="w-24 text-center">
                    <span class="text-xl font-semibold">Price</span>
                </div>
                <div class="w-24 text-center">
                    <span class="text-xl font-semibold">Quantity</span>
                </div>
            </div>
        </div>
        @endif
        <div x-data="cartHandler()">
            <ul>
                <template x-for="item in cartItems" :key="item.id">

                    <li class="cart-item shadow-md rounded-lg overflow-hidden mb-4">
                        <a class="block">
                            <div class="flex items-center p-4">
                                <div class="w-24 h-24 bg-gray-300 rounded-md mr-4"
                                    :style="'background-image: url(' + item.product.product_photo + '); background-size: cover; background-position: center;'">
                                </div>
                                <div class="flex-1">
                                    <span class="text-xl font-semibold" x-text="item.product.name"></span>
                                    <div class="text-sm text-gray-600" x-text="item.product.description"></div>
                                    <template x-if="item.product.discount">
                                        <div class="text-sm text-gray-600">
                                            Discount: <span x-text="item.product.discount.discount_percentage"></span>%
                                            (<span x-text="item.product.discount.start_date"></span> - <span
                                                x-text="item.product.discount.end_date"></span>)
                                        </div>
                                    </template>
                                </div>
                                <div class="w-24 text-center">
                                    <div class="text-gray-600" x-text="'$' + item.product.price"></div>
                                </div>
                                <div class="w-24 text-center">
                                    <input min="1" :max="item.product.stock" type="number" x-model="item.quantity"
                                        @change="updateQuantity(item.id, item.quantity)"
                                        style="width: 60px; border: 1px solid #d1d5db; border-radius: 0.375rem; padding: 0.25rem 0.5rem;">
                                </div>
                            </div>
                            <div class="w-24 text-center mb-1 flex ml-1">
                                <form :action="'{{ route('cart.remove', '') }}' + '/' + item.id" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="text-gray-500 px-4 py-2 rounded-md text-xs transition-transform transform hover:scale-105"
                                        type="submit">Remove</button>
                                </form>
                            </div>

                            {{-- <div class="w-24 text-center mb-1 flex ml-1">
                                <button @click="removeItem(item.product_id)"
                                    class="text-gray-500 px-4 py-2 rounded-md text-xs transition-transform transform hover:scale-105">Remove</button>
                            </div> --}}
                        </a>
                    </li>
                </template>

                <template x-if="cartItems.length > 0">
                    <div>
                        <div class="rounded-lg p-4 mt-4 flex justify-end">
                            <div class="text-xl font-bold">Total Price: $<span x-text="totalPrice"></span></div>
                        </div>
                        <div class="rounded-lg p-4 mt-4 flex justify-end">
                            <form class="inline-block">
                                @csrf
                                <button @click.prevent="alertMessage($event)"
                                    class=" btn btn-primary bg-blue-500 text-white px-4 py-2 rounded-md"
                                    type="submit">Place Order</button>
                            </form>

                        </div>
                    </div>
                </template>
                <template x-if="cartItems.length === 0">
                    <div class="flex items-center p-4">
                        <p class="text-gray-800 mt-4 text-bold">Your cart is empty.</p>
                    </div>
                </template>
            </ul>
        </div>

        <script>
            function cartHandler() {
            return {
                cartItems: @json($cartItems),
                get totalPrice() {
                    return this.cartItems.reduce((total, item) => total + (item.product.price * (1 - (item.product.discount.discount_percentage / 100))  * item.quantity), 0)
                    .toFixed(2);
                },
                alertMessage() {
                    $.ajax({
                        url: '{{ route('cart.placeOrder') }}', 
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',

                        },
                        success: function(response) {
                            if (response.success) {
                                alert(response.message);
                                window.location.href = '/orders'; 
                            }
                        },
                        error: function(response) {
                            alert(response.responseJSON.message);
                        }
                    });
                },
                updateQuantity(itemId, newQuantity) {
                    $.ajax({
                    url: `{{ url('cart/update') }}/${itemId}`,
                    method: 'PUT',
                    data: {
                        quantity: newQuantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: (response) => {
                        // console.log(response);
                    },
                    error: (xhr) => {
                        console.error(xhr.responseText);
                        alert('Error updating quantity: ' + xhr.responseJSON.message);
                    }
                });
                }
            }
        }
        </script>
        @endauth
    </div>
</body>

</html>