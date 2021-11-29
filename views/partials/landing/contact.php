<div class="bg-gradient-to-r from-indigo-600 via-cyan-500 to-blue-500 p-8">
    <div class="mb-14 text-center space-y-3">
        <h2 class="text-4xl font-semibold tracking-thight text-white">Want to talk?</h2>
        <p class="text-white text-2xl font-light">I haven't bitten anyone yet</p>
    </div>

    <form method="POST" action="/contact" class="space-y-8 max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 pt-8 rounded-lg">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nom</label>
            <div class="mt-1">
                <input type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 dark:border-gray-800 rounded-md dark:bg-gray-700 dark:text-gray-100" placeholder="" aria-describedby="name">
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
            <div class="mt-1">
                <input type="email" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 dark:border-gray-800 rounded-md dark:bg-gray-700 dark:text-gray-100" placeholder="you@example.com" aria-describedby="email-description">
            </div>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-100" id="email-description">No spam, only response to your message, I promiss 😋</p>
        </div>

        <div>
            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Message</label>
            <div class="mt-1">
                <textarea rows="4" name="message" id="message" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 dark:border-gray-800 rounded-md dark:bg-gray-700 dark:text-gray-100"></textarea>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Ok, let's talk 😁
            </button>
        </div>
    </form>
</div>