<div class="px-16 mt-8 flex justify-end">
    <h2 class="text-6xl font-semibold tracking-thight text-gray-800 ">Things I <span class="text-indigo-500">do</span></h2>
</div>

<div class="grid grid-cols-4 gap-8 px-8 mx-auto py-16">
    <?php foreach ($themes as $theme) : ?>
        <div x-data="{open: false}" :class="{'col-span-4': open}" class="bg-white border border-gray-200 px-6 py-4 rounded shadow-lg hover:shadow-xl hover:border-indigo-500 transition duration-100">
            <h3 class="text-4xl text-gray-800 text-center font-semibold">
                <?= $theme['name'] ?>
            </h3>

            <div class="flex justify-between">
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

            <div class="my-6">
                <?php foreach ($theme['wordsCloud']  as $word) : ?>
                    <p class="inline text-lg font-medium"><?= $word ?></p>
                <?php endforeach; ?>
                ...
            </div>

            <button @click="open = true" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                See more ?
            </button>

            <div x-show="open">
                hey?
            </div>
        </div>
    <?php endforeach; ?>
</div>