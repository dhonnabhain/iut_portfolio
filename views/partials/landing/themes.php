<div class="px-16 mt-8 flex justify-end">
    <h2 class="text-6xl font-semibold tracking-thight text-gray-800 ">Things I <span class="text-indigo-500">do</span></h2>
</div>

<div class="grid grid-cols-4 gap-8 px-8 mx-auto py-16">
    <?php foreach ($themes as $theme) : ?>
        <div x-data="{open: false}" :class="{'col-span-4': open}" class="bg-white border border-gray-200 px-6 py-4 rounded shadow-lg hover:shadow-xl hover:border-indigo-500 transition duration-100">
            <div class="flex justify-between">
                <h3 :class="{'text-center': !open" } class="text-3xl text-gray-800 font-semibold">
                    <?= $theme['name'] ?>
                </h3>
                <button x-show="open" @click="open = false" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div x-show="!open" class="flex justify-between">
                <div class="text-xl mt-14 text-center">
                    <div class="text-indigo-500 font-bold text-3xl">
                        <?= $theme['domainsCount'] ?>
                    </div>

                    <div><?= $theme['domainsCount'] > 1 ? 'domains' : 'domain' ?></div>
                </div>

                <div class="text-xl mt-14 text-center">
                    <div class="text-indigo-500 font-bold text-3xl">
                        <?= $theme['skillsCount'] ?>
                    </div>

                    <div><?= $theme['skillsCount'] > 1 ? 'skills' : 'skill' ?></div>
                </div>
            </div>

            <div x-show="!open" class="my-6">
                <?php foreach ($theme['wordsCloud']  as $word) : ?>
                    <p class="inline text-lg font-medium"><?= $word ?></p>
                <?php endforeach; ?>
                ...
            </div>

            <button x-show="!open" @click="open = !open" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                See more ?
            </button>

            <div x-show="open" class="mt-16">
                <div class="grid grid-cols-8 gap-y-6">
                    <?php foreach ($theme['domains']  as $domain) : ?>
                        <div class="col-span-2">
                            <p class="inline text-lg font-medium"><?= $domain['name'] ?></p>
                        </div>
                        <div class="grid grid-cols-6 col-span-6 flex flex-col">
                            <?php foreach ($domain['skills']  as $skill) : ?>
                                <div>
                                    <p class="font-medium text-gray-800 mb-3"><?= $skill['name'] ?></p>

                                    <?php
                                    $starsToShow = 1;
                                    switch ($skill['level']) {
                                        case 'bad':
                                            $starsToShow = 1;
                                            break;
                                        case 'medium':
                                            $starsToShow = 2;
                                            break;
                                        case 'good':
                                            $starsToShow = 3;
                                            break;
                                    }

                                    for ($i = 0; $i < $starsToShow; $i++) {
                                        require(__DIR__ . '/skillLevel.php');
                                    }
                                    ?>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>