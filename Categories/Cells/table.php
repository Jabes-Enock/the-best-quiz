<div id="before-table-loaded" class="grid place-items-center p-8 before-page-init">
    <div class="w-14 h-14">
        <?= view_cell('Components/SpinnerCell') ?>
    </div>
</div>
<div id="table-loaded" class="hidden">
    <div class="mx-auto relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        index
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        visível no quiz
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody id="categories">

            </tbody>
        </table>
    </div>
</div>


<script>
    const baseUrl = "<?= base_url() ?>"

    const insertDataIntoView = (data) => {
        $.each(data, (index, item) => {
            $("#categories").append(`
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           ${index + 1}
                    </th>
                    <td class="px-6 py-4">
                        ${item.category}
                    </td>
                    <td class="px-6 py-4">
                            ${item.is_visible == true ? "<i class='mdi mdi-check-decagram text-2xl text-green-500'></i>" : "<span class='mdi mdi-block-helper text-2xl text-red-500'></span>"}
                        </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-4">
                            <a  href="${baseUrl}categorias/${item.id}/editar" class="font-medium text-green-500 dark:text-blue-500 hover:text-blue-700">
                                <i class="mdi mdi-pencil text-xl"></i>
                            </a>
                            <a  href="${baseUrl}categorias/${item.id}/delete" class="font-medium text-red-600 dark:text-blue-500 hover:text-blue-700">
                            <i class="mdi mdi-trash-can-outline text-xl"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            `)
        })


        $('#before-table-loaded').addClass('hidden')
        $('#table-loaded').removeClass('hidden')
    }

    const flux = async () => {
        const categories = await getCategories() //utils/function.js

        if (!categories) {
            $('#before-table-loaded').addClass('hidden')
            $('#table-loaded').html(`
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    Não há dados para ser mostrado, tente novamente ou adicione uma nova categoria
                </div>
            `)
            $('#table-loaded').removeClass('hidden')

            return
        }

        insertDataIntoView(categories)
    }

    flux()

</script>