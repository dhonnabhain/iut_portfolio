<?php
// if (isset($_SESSION['flash'])) {
//     require __DIR__ . '/../../../partials/admin/domains/cannotUpdate.php';
// }
// 
?>


<div class="bg-white overflow-hidden shadow rounded-lg xl:w-1/3 mx-auto">
    <div class="px-4 py-5 sm:p-6">
        <form action="/admin/domains/update?domain=<?= $domain['id'] ?>" method="POST" class="space-y-8 divide-y divide-gray-200">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Domain
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            A domain could have many skills. </br>
                            For example, a domain could be PHP, JavasScript, ... for a dev themes
                        </p>
                    </div>

                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="name" id="name" value="<?= $domain['name'] ?>" class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Skills
                                <a href="/admin/skills/create?domain=<?= $domain['id'] ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2 space-y-2">
                                <?php
                                foreach ($domain['skills'] as $skill) {
                                    require __DIR__ . '/../../../partials/admin/skills/card.php';
                                }
                                ?>
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