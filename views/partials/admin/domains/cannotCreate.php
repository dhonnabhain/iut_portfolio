<div class="rounded-md bg-red-50 p-4 xl:w-1/3 mx-auto">
    <div class="flex">
        <div class="flex-shrink-0">
            <i class="far fa-times-circle text-red-400"></i>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-red-800">
                Oops, cannot create this domain 😓
            </h3>

            <p class="text-sm text-red-700"> <?= $_SESSION['flash'] ?></p>
        </div>
    </div>
</div>