<x-app-layout>
    <x-slot name="header" class="top-32">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 flex justify-center">
            <h2 class="mt-16 font-bold font-inter text-5xl text-center text-gray-800">CONTACT US</h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-12 overflow-auto min-h-screen">
        <!-- Grid layout for map and contact info -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Google Map (Left Column) -->
            <div class="google-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2960.046394876951!2d-75.86798792390368!3d42.10647717121758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89dae5f9b8f2d593%3A0xfee80a9962e66ee!2sNew%20York%20State%20Inebriate%20Asylum!5e0!3m2!1sth!2sth!4v1727876436244!5m2!1sth!2sth"
                    width="100%" height="450"
                    style="border:0; border-radius: 12px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Contact Information (Right Column) -->
            <div class="contact-info bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-4xl font-bold text-center text-gray-700 mb-8">Get in Touch</h3>
                <div class="space-y-6">
                    <div class="flex items-center">
                        <span class="font-semibold text-xl text-gray-600 mr-4">Phone:</span>
                        <span class="text-gray-700 text-xl">+123-456-7890</span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold text-xl text-gray-600 mr-4">Email:</span>
                        <a href="mailto:info@alcoholic.com"
                            class="text-blue-600 hover:underline text-xl">info@sofarsogoodshop.com</a>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold text-xl text-gray-600 mr-4">Facebook:</span>
                        <a href="https://www.facebook.com/" target="_blank"
                            class="text-blue-600 hover:underline text-xl">facebook.com/sofarsogoodshop</a>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold text-xl text-gray-600 mr-4">Address:</span>
                        <span class="text-gray-700 text-xl">123 Beer Street, Alcohol City, Cirrhosis</span>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold text-xl text-gray-600 mr-4">Twitter:</span>
                        <a href="https://twitter.com/" target="_blank"
                            class="text-blue-600 hover:underline text-xl">twitter.com/sofarsogoodshop</a>
                    </div>
                    <div class="flex items-center">
                        <span class="font-semibold text-xl text-gray-600 mr-4">Instagram:</span>
                        <a href="https://www.instagram.com/" target="_blank"
                            class="text-blue-600 hover:underline text-xl">instagram.com/sofarsogoodshop</a>
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