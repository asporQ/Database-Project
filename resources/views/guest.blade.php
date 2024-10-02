<x-app-layout>
    <div class="relative main">
        <img src="{{ asset('bg.png') }}" alt="Background Image" class="h-screen w-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center space-y-4">
            <h1 class="text-white text-4xl md:text-6xl font-bold drop-shadow-lg animate__animated animate__fadeInDown">
                Cheers to the Good Times!
            </h1>
            <span class="text-ye text-xl font-light animate__animated animate__fadeInUp animate__delay-1s">SO FAR SO
                GOOD</span>
            <a href="#discover" class="mt-8 animate__animated animate__bounce animate__infinite">
                <svg class="w-8 h-8 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Section 1: Discover Our Selection -->
    <div id="discover" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 animate__animated animate__fadeIn">Discover Our Selection
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-black p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeInLeft">
                    <h3 class="text-xl font-semibold mb-4">Craft Beers</h3>
                    <p class="text-gray-600">Explore our wide range of artisanal brews from local and international
                        craft breweries. From hoppy IPAs to smooth stouts, we have something for every beer enthusiast.
                    </p>
                </div>
                <div
                    class="bg-black p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeInUp animate__delay-1s">
                    <h3 class="text-xl font-semibold mb-4">Fine Wines</h3>
                    <p class="text-gray-600">Indulge in our carefully curated selection of wines from renowned vineyards
                        around the world. Whether you prefer red, black, or sparkling, we have the perfect bottle for
                        your palate.</p>
                </div>
                <div
                    class="bg-black p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeInRight animate__delay-2s">
                    <h3 class="text-xl font-semibold mb-4">Premium Spirits</h3>
                    <p class="text-gray-600">Discover our collection of top-shelf spirits, including rare whiskeys,
                        smooth vodkas, and artisanal gins. Elevate your cocktail game or enjoy them neat – the choice is
                        yours.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Featured Products -->
    <div class="py-16 bg-black">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 animate__animated animate__fadeIn">Featured Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-gray-100 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('Heineken-Lager.png') }}" alt="Heineken"
                        class="w-full h-48 object-cover rounded-md mb-4" style="object-fit: contain;">
                    <h3 class="text-lg font-semibold mb-2">Heineken Lager</h3>
                    <p class="text-gray-600 mb-4">A hoppy delight with citrus notes</p>
                    <a href="{{ url('products') }}"
                        class="bg-yellowy text-black px-4 py-2 rounded-full hover:bg-yellow-600 transition duration-300">Go
                        to Product</a>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('pngtree-jack-daniels-bottle-png-image_10751958.png') }}" alt="pngtree-jack"
                        class="w-full h-48 object-cover rounded-md mb-4" style="object-fit: contain;">
                    <h3 class="text-lg font-semibold mb-2">Jack Daniel's</h3>
                    <p class="text-gray-600 mb-4">A classic Tennessee whiskey with a smooth and rich flavor</p>
                    <a href="{{ url('products') }}"
                        class="bg-yellowy text-black px-4 py-2 rounded-full hover:bg-yellow-600 transition duration-300">Go
                        to Product</a>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('Jose Cuervo Gold Tequila.png') }}" alt="Jose Cuervo Gold Tequila"
                        class="w-full h-48 object-cover rounded-md mb-4" style="object-fit: contain;">
                    <h3 class="text-lg font-semibold mb-2">Jose Cuervo Gold Tequila</h3>
                    <p class="text-gray-600 mb-4">A smooth and rich tequila with a hint of vanilla and caramel</p>
                    <a href="{{ url('products') }}"
                        class="bg-yellowy text-black px-4 py-2 rounded-full hover:bg-yellow-600 transition duration-300">Go
                        to Product</a>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('CloudConvert 4211 4.png') }}" alt="CloudConvert 4211"
                        class="w-full h-48 object-cover rounded-md mb-4" style="object-fit: contain;">
                    <h3 class="text-lg font-semibold mb-2">CloudConvert 4211</h3>
                    <p class="text-gray-600 mb-4">A premium whiskey with a rich and smoky flavor</p>
                    <a href="{{ url('products') }}"
                        class="bg-yellowy text-black px-4 py-2 rounded-full hover:bg-yellow-600 transition duration-300">Go
                        to Product</a>
                </div>

            </div>
        </div>
    </div>

    <!-- Section 3: Our Story -->
    <div class="py-16 bg-gray-800 text-black">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="{{ asset('OIP.png') }}" alt="Our Story" class="rounded-lg shadow-lg">
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <h2 class="text-3xl font-bold mb-6 animate__animated animate__fadeIn">Our Story</h2>
                    <p class="text-lg mb-6 animate__animated animate__fadeIn animate__delay-1s">
                        Founded in 1995, our passion for quality drinks has driven us to curate the finest selection of
                        beers, wines, and spirits. We've traveled the world to bring you the best flavors and
                        experiences.
                    </p>
                    <a href="#"
                        class="bg-yellowy text-gray-900 px-6 py-3 rounded-full font-semibold hover:bg-yellow-400 transition duration-300 inline-block animate__animated animate__pulse animate__infinite">Learn
                        More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 4: Customer Reviews -->
    <div class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 animate__animated animate__fadeIn">What Our Customers Say
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('R.png') }}" alt="Customer 1" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Jane Smith</h4>
                            <div class="text-yellowy">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Amazing selection of craft beers. The staff is incredibly knowledgeable
                        and helped me find the perfect IPA!"</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('R.png') }}" alt="Customer 2" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Michael Brown</h4>
                            <div class="text-yellowy">★★★★★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"The wine selection is top-notch. I found some rare bottles that I couldn't
                        find anywhere else."</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('R.png') }}" alt="Customer 3" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Emily Johnson</h4>
                            <div class="text-yellowy">★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Great place for premium spirits. The staff recommended an excellent
                        whiskey that I absolutely loved."</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg-gray-900 text-black py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">About Us</h3>
                    <p class="text-gray-400">Your premier destination for fine alcoholic beverages.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="text-gray-400">
                        <li class="mb-2"><a href="#" class="hover:text-black transition duration-300">Home</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-black transition duration-300">Shop</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-black transition duration-300">About</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-black transition duration-300">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <p class="text-gray-400">123 Brewery Lane<br>Winevillage, BV 12345<br>Phone: (123)
                        456-7890<br>Email: info@example.com</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <p class="text-gray-400 mb-4">Subscribe to our newsletter for the latest updates and offers.</p>
                    <form class="flex">
                        <input type="email" placeholder="Your email"
                            class="bg-gray-800 text-black px-4 py-2 rounded-l-full focus:outline-none">
                        <button type="submit"
                            class="bg-yellowy text-gray-900 px-4 py-2 rounded-r-full hover:bg-yellow-400 transition duration-300">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-400">
                <p>&copy; 2024 so far so good Shop. All rights reserved.</p>
            </div>
        </div>
    </footer>
</x-app-layout>