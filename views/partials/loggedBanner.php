<div class="sticky bg-gray-700 text-white top-0 z-50 w-full py-3 shadow-lg">
    <div class="max-w-7xl mx-auto flex justify-between text-sm">
        <a href="/admin" class="flex hover:text-indigo-300 transition duration-150">
            <i class="fas fa-external-link-alt self-center mr-2"></i>
            Go back to admin
        </a>


        <div class="flex space-x-4">
            <p>Logged as <?= $_SESSION['user']['login'] ?> (<?= $_SESSION['user']['email'] ?>)</p>
            <div>|</div>
            <a class="self-center hover:text-indigo-300 transition duration-150" href="/logout">
                Logout
                <i class="fas fa-sign-out-alt self-center ml-1"></i>
            </a>
        </div>
    </div>
</div>