<div class="w-screen h-screen flex flex-col items-center justify-center space-">
    <div class="flex flex-col space-y-16">
        <div class="flex divide-x divide-gray-500 divide-1 text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <h1 class=" text-indigo-600 pr-8">404</h1>
            <div class="pl-8">
                <p class="pb-1">Oh no! This page doesn't exists </p>
                <p class="text-xl text-gray-500 font-normal tracking-normal">Is the URL correct? <span class="font-bold text-indigo-500"><?= $_SERVER['REQUEST_URI'] ?></span></p>
            </div>
        </div>

        <a href="/" class="self-center flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10 space-x-4">
            <i class="fas fa-chevron-left"></i>

            <span>Go to home?</span>
        </a>
    </div>
</div>