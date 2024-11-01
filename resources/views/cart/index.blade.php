<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black font-inter text-5xl text-gray-800 leading-tight">
            {{ __('Carts') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8" x-data="cartHandler()">
        @auth
        <template x-if="cartItems.length > 0">
            <div class="rounded-lg overflow-hidden mb-4">
                <div class="flex items-center p-4">
                    <div class="flex-1">
                        <span class="text-3xl font-semibold">Product</span>
                    </div>
                    <div class="w-24 text-center">
                        <span class="text-3xl font-semibold">Price</span>
                    </div>
                    <div class="w-24 text-center">
                        <span class="text-3xl font-semibold">Quantity</span>
                    </div>
                </div>
            </div>
        </template>
        <div>
            <ul>
                <template x-for="item in cartItems" :key="item.id">
                    <li class="cart-item shadow-md rounded-lg bg-white overflow-hidden mb-4">
                        <a class="block">
                            <div class="flex items-center p-4">

                                <div class="flex-shrink-0 w-24 pt-5 flex items-center justify-center mb-4">
                                    <img class="h-24 object-contain"
                                        :src="item.product.product_photo ? 'storage/' + item.product.product_photo : '{{ asset('storage/default_photo.png') }}'"
                                        alt="Product Image">
                                </div>

                                <div class="flex-1">
                                    <span class="text-3xl font-semibold" x-text="item.product.name"></span>
                                    <div class="text-xl text-gray-600" x-text="item.product.description"></div>
                                    <template x-if="item.product.discount">
                                        <div class="text-xl text-gray-600">
                                            Discount: <span x-text="item.product.discount.discount_percentage"></span>%
                                            Expire date: <span x-text="item.product.discount.end_date"></span>
                                        </div>
                                    </template>
                                </div>
                                <div class="w-24 text-center text-2xl">
                                    <div class="text-gray-600" x-text="'$' + discountedPrice(item)"></div>
                                </div>
                                <div class="w-24 text-center">
                                    <input min="1" :max="item.product.stock" type="number" x-model="item.quantity"
                                        @change="updateQuantity(item.id, item.quantity)" class="text-2xl"
                                        style="width: 60px; border: 1px solid #d1d5db; border-radius: 0.375rem; padding: 0.25rem 0.5rem;">
                                </div>
                            </div>
                            <div class="w-24 text-xl text-center mb-1 flex ml-1">
                                <form :action="'{{ route('cart.remove', '') }}' + '/' + item.id" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="text-gray-500 px-4 py-2 rounded-md text-m transition-transform transform hover:scale-105 hover:text-red-500"
                                        type="submit">Remove</button>
                                </form>
                            </div>
                        </a>
                    </li>
                </template>


                <template x-if="cartItems.length > 0">
                    <div>
                        <div class="rounded-lg p-4 mt-4 flex justify-end">
                            <div class="text-3xl font-bold">Total Price: $<span x-text="totalPrice"></span></div>
                        </div>

                        <div class="rounded-lg p-4 mt-4 flex justify-end">
                            <form class="inline-block">
                                @csrf
                                <button @click.prevent="placeOrder($event)"
                                    class="btn btn-primary bg-blue-500 text-2xl text-white px-4 py-2 rounded-md font-semibold"
                                    type="submit">Place Order</button>
                            </form>
                        </div>
                    </div>
                </template>
                <template x-if="cartItems.length <= 0">
                    <div class="flex justify-center items-center p-4">
                        <div class="mt-6 text-center ">
                            <p class="text-gray-600 text-2xl">You have no product in cart yet.</p>
                            <a href="{{ url('products') }}" class="text-blue-600 hover:underline text-2xl">Continue
                                Shopping</a>
                        </div>
                    </div>
                </template>
            </ul>
        </div>
        @endauth
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function cartHandler() {
        return {
            cartItems: @json($cartItems),
            get totalPrice() {
                return total = this.cartItems.reduce((total, item) => {
                    const price = item.product.discount ?
                        Math.floor(item.product.price * (1 - (item.product.discount.discount_percentage /
                            100)) * 100) / 100 :
                        item.product.price;
                    return total + (price * item.quantity);
                }, 0).toFixed(2);

            },
            discountedPrice(item) {
                const discount = item.product.discount;
                const price = item.product.price;
                if (discount) {
                    return Math.floor(item.product.price * (1 - (item.product.discount.discount_percentage / 100)) *
                        100) / 100;
                } else {
                    return item.product.price
                }
                return price.toFixed(2);
            },
            placeOrder() {
                $.ajax({

                    url: `{{ route('cart.placeOrder') }}`,

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

</x-app-layout>