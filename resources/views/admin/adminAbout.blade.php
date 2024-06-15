<x-adminApp-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('O nas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex">
                        <!-- Left section with address and contact -->
                        <div class="w-1/2 pr-4">
                            <h3 class="text-lg font-semibold mb-2">Adres:</h3>
                            <p>Ul. Kościelna 7</p>
                            <p>34-100 Wadowice</p>
                            <br>
                            <h3 class="text-lg font-semibold mb-2">Kontakt:</h3>
                            <p>Telefon: +48 213 721 372</p>
                            <p>Email: itbank@gmail.com</p>
                        </div>

                        <!-- Right section with Google Maps iframe -->
                        <div class="w-1/2">
                            <iframe
                                width="100%"
                                height="400"
                                frameborder="0"
                                style="border:0"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d321.3534806223682!2d19.493660136862633!3d49.883259455990164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471688c6bc9624e1%3A0x1bfa026bdcc08b08!2sMuzeum%20Dom%20Rodzinny%20Ojca%20%C5%9Awi%C4%99tego%20Jana%20Paw%C5%82a%20II%20w%20Wadowicach!5e0!3m2!1spl!2spl!4v1718473382266!5m2!1spl!2spl"
                                allowfullscreen
                                aria-hidden="false"
                                tabindex="0"
                            ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-adminApp-layout>