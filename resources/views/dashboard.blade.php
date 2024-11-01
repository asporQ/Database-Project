<x-app-layout>
    <div class="relative main sample-header-section">
        <img src="{{ asset('bg.png') }}" alt="Background Image" class="h-screen w-full object-cover sample-header">
        <div class="absolute inset-0  bg-opacity-50 flex flex-col items-center justify-center mt-48 space-y-4">
            <h1 class="text-white text-5xl md:text-6xl font-bold drop-shadow-lg animate__animated animate__fadeInDown">
                Cheers to the Good Times!
            </h1>
            <span class="text-yellowy text-6xl animate__animated animate__fadeInUp animate__delay-1s font-semibold">SO
                FAR SO
                GOOD</span>
            <a href="#discover" class="mt-8 animate__animated animate__bounceIn animate__infinite smooth-scroll"
                onclick="event.preventDefault(); document.querySelector('#discover').scrollIntoView({ behavior: 'smooth', block: 'start' });">
                <svg class="w-8 h-8 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Section 1: Discover Our Selection -->
    <div id="discover" class="py-16 bg-white-800 sample-section">
        <div class="container mx-auto px-4">
            <h2 class="text-5xl font-bold text-center mt-5 mb-12 animate__animated animate__fadeIn">Discover Our
                Selection
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class=" p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeInLeft">
                    <h3 class="text-xl font-semibold mb-4">Craft Beers</h3>
                    <p class="text-gray-600">Explore our wide range of artisanal brews from local and international
                        craft breweries. From hoppy IPAs to smooth stouts, we have something for every beer enthusiast.
                    </p>
                </div>
                <div
                    class=" p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeInUp animate__delay-1s">
                    <h3 class="text-xl font-semibold mb-4">Fine Wines</h3>
                    <p class="text-gray-600">Indulge in our carefully curated selection of wines from renowned vineyards
                        around the world. Whether you prefer red, black, or sparkling, we have the perfect bottle for
                        your palate.</p>
                </div>
                <div
                    class=" p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeInRight animate__delay-2s">
                    <h3 class="text-xl font-semibold mb-4">Premium Spirits</h3>
                    <p class="text-gray-600">Discover our collection of top-shelf spirits, including rare whiskeys,
                        smooth vodkas, and artisanal gins. Elevate your cocktail game or enjoy them neat – the choice is
                        yours.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Featured Products -->
    <div class="py-16 ">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 animate__animated animate__fadeIn">Featured Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div
                    class="bg-white-700 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeIn">
                    <img src="{{ asset('Heineken-Lager.png') }}" alt="Heineken"
                        class="w-full h-48 object-cover rounded-md mb-4" style="object-fit: contain;">
                    <h3 class="text-3xl font-semibold mb-2">Heineken Lager</h3>
                    <p class="text-gray-600 mb-4 text-xl">A hoppy delight with citrus notes</p>
                    <a href="{{ url('products') }}"
                        class="text-xl bg-yellowy text-black px-4 py-2 rounded-full hover:bg-yellow-600 transition duration-300">Go
                        to Product</a>
                </div>
                <div
                    class="bg-white-700 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeIn animate__delay-1s">
                    <img src="{{ asset('pngtree-jack-daniels-bottle-png-image_10751958.png') }}" alt="pngtree-jack"
                        class="w-full h-48 object-cover rounded-md mb-4" style="object-fit: contain;">
                    <h3 class="text-3xl font-semibold mb-2">Jack Daniel's</h3>
                    <p class="text-gray-600 mb-4 text-xl">A classic Tennessee whiskey with a smooth and rich flavor</p>
                    <a href="{{ url('products') }}"
                        class="text-xl bg-yellowy text-black px-4 py-2 rounded-full hover:bg-yellow-600 transition duration-300">Go
                        to Product</a>
                </div>
                <div
                    class="bg-white-700 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeIn animate__delay-2s">
                    <img src="{{ asset('Jose Cuervo Gold Tequila.png') }}" alt="Jose Cuervo Gold Tequila"
                        class="w-full h-48 object-cover rounded-md mb-4" style="object-fit: contain;">
                    <h3 class="text-3xl font-semibold mb-2">Jose Cuervo Gold Tequila</h3>
                    <p class="text-gray-600 mb-4 text-xl">A smooth and rich tequila with a hint of vanilla and caramel
                    </p>
                    <a href="{{ url('products') }}"
                        class="text-xl bg-yellowy text-black px-4 py-2 rounded-full hover:bg-yellow-600 transition duration-300">Go
                        to Product</a>
                </div>
                <div
                    class="bg-white-700 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeIn animate__delay-3s">
                    <img src="{{ asset('CloudConvert 4211 4.png') }}" alt="CloudConvert 4211"
                        class="w-full h-48 object-cover rounded-md mb-4" style="object-fit: contain;">
                    <h3 class="text-3xl font-semibold mb-2">CloudConvert 4211</h3>
                    <p class="text-gray-600 mb-4 text-xl">A premium whiskey with a rich and smoky flavor</p>
                    <a href="{{ url('products') }}"
                        class="text-xl bg-yellowy text-black px-4 py-2 rounded-full hover:bg-yellow-600 transition duration-300">Go
                        to Product</a>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="{{ url('products') }}"
                    class="text-xl bg-yellowy text-black px-6 py-3 rounded-full font-semibold hover:bg-yellow-600 transition duration-300">More
                    Products</a>
            </div>
        </div>
    </div>

    <!-- Section 3: Our Story -->
    <div class="py-16 bg-white-800 text-black">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-2/3 mb-8 md:mb-0 animate__animated animate__fadeInLeft">
                    <img src="{{ asset('OIP.png') }}" alt="Our Story" class="rounded-lg shadow-lg">
                </div>
                <div class="md:w-2/3 md:pl-12 animate__animated animate__fadeInRight">
                    <h2 class="text-4xl font-bold mb-6">Our Story</h2>
                    <p class="text-2xl mb-6 animate__animated animate__fadeIn animate__delay-1s">
                        Founded in 1995, our passion for quality drinks has driven us to curate the finest selection of
                        beers, wines, and spirits. We've traveled the world to bring you the best flavors and
                        experiences.
                    </p>
                    <a href="#"
                        class="text-xl bg-yellowy text-gray-900 px-6 py-3 rounded-full font-semibold hover:bg-yellow-400 transition duration-300 inline-block animate__animated animate__pulse animate__infinite">Learn
                        More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 4: Customer Reviews -->
    <div class="py-16 bg-white-800">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 animate__animated animate__fadeIn">What Our Customers Say
            </h2>
            <div class="text-xl grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md animate__animated animate__fadeInLeft">
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
                <div class="bg-white p-6 rounded-lg shadow-md animate__animated animate__fadeInUp animate__delay-1s">
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
                <div class="bg-white p-6 rounded-lg shadow-md animate__animated animate__fadeInRight animate__delay-2s">
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
    <footer class=" text-black py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="animate__animated animate__fadeInLeft">
                    <h3 class="text-2xl font-semibold mb-4">About Us</h3>
                    <p class="text-xl text-black">Your premier destination for fine alcoholic beverages.</p>
                </div>
                <div class="animate__animated animate__fadeInUp animate__delay-1s">
                    <h3 class="text-2xl font-semibold mb-4">Quick Links</h3>
                    <ul class="text-xl text-black">
                        <li class="mb-2"><a href="#" class="hover:text-black transition duration-300">Home</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-black transition duration-300">Shop</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-black transition duration-300">About</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-black transition duration-300">Contact</a></li>
                    </ul>
                </div>
                <div class="animate__animated animate__fadeInRight animate__delay-2s">
                    <h3 class="text-2xl font-semibold mb-4">Contact Us</h3>
                    <p class="text-xl text-black">123 Beer Street, Alcohol City, Cirrhosis<br>Winevillage, BV
                        12345<br>Phone:+123-456-7890<br>Email:
                        info@alcoholic.com</p>
                </div>
                <div class="animate__animated animate__fadeInUp animate__delay-3s">
                    <h3 class="text-2xl font-semibold mb-4">Newsletter</h3>
                    <p class="text-xl text-black mb-4">Subscribe to our newsletter for the latest updates and offers.
                    </p>
                    <form class="flex">
                        <input type="email" placeholder="Your email"
                            class="bg-white text-black px-4 py-2 rounded-l-full focus:outline-none">
                        <button type="submit"
                            class="bg-yellowy text-gray-900 px-4 py-2 rounded-r-full hover:bg-yellow-400 transition duration-300">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-center text-black animate__animated animate__fadeIn">
            </div>
        </div>
    </footer>


</x-app-layout>