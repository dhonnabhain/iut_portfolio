<div class="bg-white border border-gray-900 px-4 py-3 flex justify-between">
    <div>
        <?= $skill['name'] ?>

        <p class="text-gray-600">
            Level <span class="font-medium"><?= $skill['level'] ?></span>
        </p>
    </div>

    <div class="self-center">
        <a href="/admin/skills/edit?domain=<?= $domain['id'] ?>&skill=<?= $skill['id'] ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
            <i class="fas fa-pen"></i>
        </a>
        <a href="/admin/skills/delete?skill=<?= $skill['id'] ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 cursor-pointer">
            <i class="fas fa-trash"></i>
        </a>
    </div>
</div>