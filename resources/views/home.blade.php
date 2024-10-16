<x-layout>
    <section id="hero" class="py-20 bg-cover bg-center" style="background-image: url('/mnt/data/image.png');">
        <div class="bg-gray-200 py-20">
            <div class="max-w-4xl mx-auto text-center text-green-800">
                <h1 class="text-5xl font-bold mb-4">ArtisanEats</h1>
                <p class="text-2xl font-semibold mb-10">Serve Best Foods and Chefs</p>
                <a href="/menus" class="bg-green-600 hover:bg-green-500 text-white py-3 px-6 rounded-lg font-medium">Browse Menu</a>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
                alert("{{ session('success') }}");
            @endif
        });
    </script>
    <section id="about" class="py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h3 class="text-4xl font-bold mb-4 text-green-800">About Us</h3>
                    <p class="text-lg mb-6">Welcome to Artisan Eats! Enjoy our Food</p>
                    <a href="#contact" class="bg-green-600 hover:bg-green-500 text-white py-3 px-6 rounded-lg font-medium">Hubungi Kami</a>
                </div>
                <div>
                    <img src="https://plus.unsplash.com/premium_photo-1701699257600-ae4bcc6d04c2?q=80&w=3870&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="About Us Image" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-20 bg-gray-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-4xl font-bold text-center mb-10 text-green-800">Contact</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    <p class="text-lg mb-6">If you have any questions or would like to make a reservation, please contact us using the information below or send a message through the form.</p>
                        <ul class="text-lg">
                            <li class="mb-4"><strong>Address:</strong> Jalan Makanan Enak No. 123, Jakarta</li>
                            <li class="mb-4"><strong>Phone:</strong> +62 812-3456-xxxx</li>
                            <li class="mb-4"><strong>Email:</strong> info@artisaneats.com</li>
                        </ul>
                </div>
                <div>
                    <form class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea id="message" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"></textarea>
                        </div>
                        <button type="submit" class="bg-green-600 hover:bg-green-500 text-white py-3 px-6 rounded-lg font-medium">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>