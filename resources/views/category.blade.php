<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mx-auto px-4 py-24 overflow-auto">
                        <h2 class="text-3xl font-bold mb-8 text-center">Top 4 Best Sales 2024</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                            <div
                                class="bg-white-700 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeIn">
                                <img src="{{ asset('Heineken-Lager.png') }}" alt="Heineken"
                                    class="w-full h-64 object-cover rounded-md mb-4" style="object-fit: contain;">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">Heineken Lager</h3>
                                    <p class="text-gray-600 mb-4">A hoppy delight with citrus notes</p>
                                    <div class="heineken-lager">
                                        <h2 class="font-size: 24px; font-weight: bold; margin-top: 10px;">The Classic
                                            Choice</h2>
                                        <p class="font-size: 16px; color: #666; margin-bottom: 20px;">We chose Heineken
                                            Lager because it's a timeless classic that never goes out of style. Brewed
                                            with precision and passion, this Dutch pilsner is a masterclass in balance
                                            and refinement.</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-white-700 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeIn animate__delay-1s">
                                <img src="{{ asset('pngtree-jack-daniels-bottle-png-image_10751958.png') }}"
                                    alt="pngtree-jack" class="w-full h-32 object-cover rounded-md mb-4"
                                    style="object-fit: contain;">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">Jack Daniel's</h3>
                                    <p class="text-gray-600 mb-4">A classic Tennessee whiskey with a smooth and rich
                                        flavor</p>
                                    <div class="jack-daniels">
                                        <h2 class="font-size: 24px; font-weight: bold; margin-top: 10px;">The Tennessee
                                            Trailblazer</h2>
                                        <p class="font-size: 16px; color: #666; margin-bottom: 20px;">Jack Daniel's is a
                                            whiskey that needs no introduction. This iconic Tennessee whiskey is a
                                            testament to the power of tradition and innovation.</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-white-700 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeIn animate__delay-2s">
                                <img src="{{ asset('Jose Cuervo Gold Tequila.png') }}" alt="Jose Cuervo Gold Tequila"
                                    class="w-full h-48 object-cover rounded-md mb-4" style="object-fit: contain;">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">Jose Cuervo Gold Tequila</h3>
                                    <p class="text-gray-600 mb-4">A smooth and rich tequila with a hint of vanilla and
                                        caramel</p>
                                    <div class="jose-cuervo">
                                        <h2 class="font-size: 24px; font-weight: bold; margin-top: 10px;">The Spirit of
                                            Mexico</h2>
                                        <p class="font-size: 16px; color: #666; margin-bottom: 20px;">Jose Cuervo Gold
                                            Tequila is a spirit that embodies the vibrant energy of Mexico. With its
                                            smooth, rich flavor and hint of vanilla and caramel, this tequila is perfect
                                            for sipping on its own or mixing into your favorite cocktails.</p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-white-700 p-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300 animate__animated animate__fadeIn animate__ delay-3s">
                                <img src="{{ asset('CloudConvert 4211 4.png') }}" alt="CloudConvert 4211"
                                    class="w-full h-48 object-cover rounded-md mb -4" style="object-fit: contain;">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">CloudConvert 4211</h3>
                                    <p class="text-gray-600 mb-4">A premium whiskey with a rich and smoky flavor</p>
                                    <div class="cloudconvert">
                                        <h2 class="font-size: 24px; font-weight: bold; margin-top: 10px;">The Premium
                                            Whiskey</h2>
                                        <p class="font-size: 16px; color: #666; margin-bottom: 20px;">CloudConvert 4211
                                            is a premium whiskey that's perfect for those who appreciate a rich, smoky
                                            flavor. With its complex notes of vanilla, caramel, and oak, this whiskey is
                                            a true delight for the senses.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class=" py-6 mt-12">
        <div class="container mx-auto text-center text-black">
            <p>&copy; 2024 so far so good Shop. All rights reserved.</p>
        </div>
    </footer>
</x-app-layout>

<style>
.heineken-lager {
    background-color: #f7f7f7;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.heineken-lager img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px 10px 0 0;
}

.heineken-lager h2 {
    font-size: 24px;
    font-weight: bold;
    margin-top: 10px;
}

.heineken-lager p {
    font-size: 16px;
    color: #666;
    margin-bottom: 20px;
}

.jack-daniels {
    background-color: #f7f7f7;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.jack-daniels img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px 10px 0 0;
}

.jack-daniels h2 {
    font-size: 24px;
    font-weight: bold;
    margin-top: 10px;
}

.jack-daniels p {
    font-size: 16px;
    color: #666;
    margin-bottom: 20px;
}

.jose-cuervo {
    background-color: #f7f7f7;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.jose-cuervo img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px 10px 0 0;
}

.jose-cuervo h2 {
    font-size: 24px;
    font-weight: bold;
    margin-top: 10px;
}

.jose-cuervo p {
    font-size: 16px;
    color: #666;
    margin-bottom: 20px;
}

.cloudconvert {
    background-color: #f7f7f7;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.cloudconvert img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 10px 10px 0 0;
}

.cloudconvert h2 {
    font-size: 24px;
    font-weight: bold;
    margin-top: 10px;
}

.cloudconvert p {
    font-size: 16px;
    color: #666;
    margin-bottom: 20px;
}
</style>