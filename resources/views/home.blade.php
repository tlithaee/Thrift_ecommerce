<x-layout>
    <section class="lg:pt-16 pt-12 lg:pl-8 h-full">
        <!-- Hero Section -->
        <div
            class="rounded-2xl bg-orange-100 pt-10 overflow-hidden w-screen m-5 lg:m-0 2xl:py-16 xl:py-8 lg:rounded-tl-2xl lg:rounded-bl-2xl lg:w-full">
            <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-14 items-center lg:grid-cols-12 lg:gap32">
                    <div class="w-full xl:col-span-5 lg:col-span-6 pt-5 2xl:ml-8 xl:ml-8 lg:ml-8">
                        {{-- <div class="flex items-center text-sm font-medium text-gray-500 justify-center lg:justify-start">
                            <span class="bg-orange-500 py-1 px-3 rounded-2xl text-xs font-medium text-white mr-3">#1</span>
                            Gourmet Food Delivery
                        </div> --}}
                        <h1 class="py-8 text-center text-gray-900 font-bold font-manrope text-5xl lg:text-left leading-[70px]">
                            Embrace next level fashion with <span class="text-orange-500">Thrift.</span>
                        </h1>
                        <p class="text-gray-500 text-lg text-center lg:text-left">
                            Thrift connects you to quality, secondhand fashion — less waste, more style.
                        </p>
                        <div
                            class="relative my-10 flex items-center gap-y-3 h-auto md:h-16 flex-col md:flex-row justify-between rounded-full md:shadow-[0px 15px 30px -4px rgba(16, 24, 40, 0.03)] border border-transparent">
                            <a href="/menus" class="bg-orange-500 hover:bg-orange-500 text-white py-3 px-6 rounded-lg font-medium">Browse Menu</a>
                        </div>
                    </div>
                    <div class="w-full xl:col-span-7 lg:col-span-6 block">
                        <div class="w-full sm:w-auto lg:w-[30rem] xl:ml-16 hidden md:block">
                            <img src="https://plus.unsplash.com/premium_photo-1713820020922-9c5af848f7ff?q=80&w=3870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D
                            alt="Dashboard image" class="rounded-lg object-cover w-full h-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            alert("{{ session('success') }}");
        });
    </script>
    @endif

    <!-- About Section -->
    <section id="about" class="py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h3 class="text-4xl font-bold mb-4 text-orange-800">About Us</h3>
                    <p class="text-lg mb-10 text-gray-700 text-justify">
                        We believe great style doesn’t have to come at the cost of the planet — or your wallet. Our mission is to make sustainable fashion simple, affordable, and exciting. We carefully curate pre-loved clothing and accessories that deserve a second life, giving you access to unique finds that reflect your individuality.
                        Every item is handpicked with care, ensuring quality and style go hand in hand.
                    </p>
                    <p class="text-lg mb-10 text-orange-800 underline text-justify underline-offset-4">
                        By choosing Thrift, you're not just shopping — you're joining a movement toward conscious consumerism, where fashion meets responsibility. Look good. Feel good. Do good.
                    </p>
                    <a href="#contact" class="bg-orange-500 hover:bg-orange-500 text-white py-3 px-6 rounded-lg font-medium">Contact Us</a>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?q=80&w=3944&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="About Us Image" class="rounded-lg shadow-lg object-cover w-full h-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-12 bg-orange-50 rounded-2xl">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-4xl font-extrabold text-center mb-10 text-orange-800">Get in Touch with Thrift.</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    <p class="text-lg mb-6 text-gray-700 leading-relaxed">Have questions or want to place an order? Feel free to contact us using the details below or send a message directly through our contact form.</p>
                    <ul class="text-lg text-gray-700 space-y-4">
                        <li><strong class="text-orange-500">Address:</strong> Jalan Kewirausahaan No. 123, Jakarta</li>
                        <li><strong class="text-orange-500">Phone:</strong> +62 812-3456-xxxx</li>
                        <li><strong class="text-orange-500">Email:</strong> info@thriftpoint.com</li>
                    </ul>
                </div>
                <div>
                    <form class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-semibold text-gray-700">Message</label>
                            <textarea id="message" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"></textarea>
                        </div>
                        <button type="button" onclick="sendEmail()" class="bg-orange-500 hover:bg-orange-500 text-white py-3 px-6 rounded-lg font-medium">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function sendEmail() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;

            const mailtoLink = `mailto:info@artisaneats.com?subject=Message%20from%20${encodeURIComponent(name)}&body=Halo%20ArtisanEats,%0A%0Aaku%20${encodeURIComponent(name)}.%0A%0A${encodeURIComponent(message)}%0A%0AFrom,%0A${encodeURIComponent(name)}%0A${encodeURIComponent(email)}`;

            window.location.href = mailtoLink;
        }
    </script>

</x-layout>