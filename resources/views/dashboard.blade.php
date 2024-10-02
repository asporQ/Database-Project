<x-app-layout>
    <div class="relative">
            <img src="{{ asset('bg.png') }}" alt="Background Image" class="w-full h-auto object-cover">
            <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-white text-4xl md:text-6xl font-bold drop-shadow-lg animate__animated animate__fadeInDown">
                Welcome to <span class=" text-ye font-black">SO FAR SO GOOD</span>
            </h1>
            </div>
        </div>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg animate__animated animate__fadeIn animate__delay-1s"
                id="intro1">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4 text-lg font-semibold">
                        <span class="text-yellow-500">{{ __("So far, so good!") }}</span>
                        {{ __("At Beer History Inc., we pride ourselves on delivering the finest selection of beers from around the world. Our commitment to quality and excellence ensures that every bottle you purchase is a testament to our passion for beer.") }}
                    </p>
                </div>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg mt-4 animate__animated animate__fadeIn animate__delay-2s"
                id="intro2">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4 text-lg font-semibold">
                        <span class="text-yellow-500">{{ __("Why buy beer with us?") }}</span>
                        {{ __("We offer a curated selection of beers that cater to all tastes and preferences. From classic lagers to innovative craft brews, our collection is designed to satisfy even the most discerning beer enthusiasts.") }}
                    </p>
                </div>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg mt-4 animate__animated animate__fadeIn animate__delay-3s"
                id="intro3">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4 text-lg font-semibold">
                        <span class="text-yellow-500">{{ __("Exceptional Quality") }}</span>
                        {{ __("Our beers are sourced from the best breweries around the globe, ensuring that you receive only the highest quality products. We believe that great beer starts with great ingredients and meticulous brewing processes.") }}
                    </p>
                </div>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg mt-4 animate__animated animate__fadeIn animate__delay-4s"
                id="intro4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4 text-lg font-semibold">
                        <span class="text-yellow-500">{{ __("Join Our Community") }}</span>
                        {{ __("When you buy beer with us, you're not just making a purchase; you're joining a community of beer lovers who appreciate the rich history and diverse flavors of this beloved beverage. Cheers to great beer!") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>