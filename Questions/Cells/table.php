<p>Digite o termo de busca para encontrar as perguntas desejadas.</p>
<form class=" mx-auto">
    <label for="param_search"
        class="cursor-pointer mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 cursor-pointer">

            <i class="mdi mdi-magnify text-xl text-gray-500 dark:text-gray-400"></i>
        </div>
        <input type="text" id="param_search"
            class="block w-full py-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="procure a palavra" required />

    </div>
</form>
<div id="before-table-loaded" class="hidden">
    <div class="grid place-items-center p-8 before-page-init">
        <div class="w-14 h-14">
            <?= view_cell('Components/SpinnerCell') ?>
        </div>
    </div>
</div>
<div id="table-loaded" class="hidden">
    <div class="mx-auto relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        index
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody id="question">

            </tbody>
        </table>
    </div>
</div>

<div class="not-found-message hidden text-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
    role="alert">
    Nenhuma pergunta foi encontrada com o parametro de buscar
</div>

<script>
    const baseUrl = "<?= base_url() ?>"

    const insertDataIntoView = (data) => {
        $("#question").html('')

        $.each(data, (index, item) => {
            $("#question").append(`
            <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       ${index + 1}
                </th>
               
                <td class="px-6 py-4  overflow-auto">
                ${item.question}
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-4">
                        <a  href="${baseUrl}perguntas/${item.id}/editar" class="font-medium text-green-500 dark:text-blue-500 hover:text-blue-700">
                            <i class="mdi mdi-pencil text-xl"></i>
                        </a>
                        <a  href="${baseUrl}perguntas/${item.id}/delete" class="font-medium text-red-600 dark:text-blue-500 hover:text-blue-700">
                        <i class="mdi mdi-trash-can-outline text-xl"></i>
                        </a>
                    </div>
                </td>
            </tr>
        `)
        })


        $('#before-table-loaded').addClass('hidden')
        $('.not-found-message').addClass('hidden')
        $('#table-loaded').removeClass('hidden')
    }

    const flux = async () => {
        const results = await searchQuestion($("#param_search").val()) //utils/function.js

        if (!results) {
            $('#before-table-loaded').addClass('hidden')
            $('#table-loaded').addClass('hidden')
            $('.not-found-message').removeClass('hidden')

            return
        }

        insertDataIntoView(results)
    }

    $("#param_search").on("input", () => {

        $('#before-table-loaded').removeClass('hidden')
        $('#table-loaded').addClass('hidden')

        if ($("#param_search").val() == "" || $("#param_search").val() == null) {
            $('#before-table-loaded').addClass('hidden')
            $('#table-loaded').addClass('hidden')
            return
        }

        if ($("#param_search").val()) {
            flux()
        }



    })


</script>