<?php
// if (isset($_SESSION['flash'])) {
//     require __DIR__ . '/../../../partials/admin/domains/cannotUpdate.php';
// }
// 
?>


<div class="bg-white overflow-hidden shadow rounded-lg xl:w-1/3 mx-auto">
    <div class="px-4 py-5 sm:p-6">
        <form action="/admin/skills/update?domain=<?= $domain['id'] ?>&skill=<?= $skill['id'] ?>" method="POST" class="space-y-8 divide-y divide-gray-200">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Skill
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            😶‍🌫️
                        </p>
                    </div>

                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="name" id="name" value="<?= $skill['name'] ?>" class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="level" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Level
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select name="level" class="w-full">
                                    <option <?= $skill['level'] === 'bad' ? 'selected' : '' ?> value="bad">Bad</option>
                                    <option <?= $skill['level'] === 'medium' ? 'selected' : '' ?> value="medium">Medium</option>
                                    <option <?= $skill['level'] === 'good' ? 'selected' : '' ?> value="good">Good</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <a href="/admin" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>