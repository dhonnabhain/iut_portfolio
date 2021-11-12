<tr class="bg-white">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-indigo-900">
        <?= $theme['id'] ?>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-500">
        <?= $theme['name'] ?>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <?= $theme['domains_count'] ?>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <?= $theme['skills_count'] ?>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
        <a href="/admin/themes/edit?theme=<?= $theme['id'] ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
            <i class="fas fa-pen"></i>
        </a>

        <!-- <a href="/admin/domains/create?theme=<?= $theme['id'] ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
            <i class="fas fa-plus mr-3"></i> Domain
        </a> -->

        <a href="/admin/themes/delete?theme=<?= $theme['id'] ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 cursor-pointer">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>