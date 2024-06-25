<div id="before-list-categories-loaded" class="grid place-items-center p-8 before-page-init">
    <div class="w-14 h-14">
        <?= view_cell('Components/SpinnerCell') ?>
    </div>
</div>
<div id="after-list-categories-loaded" class="hidden">
    <div id="categories_list" class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-8 mb-16"></div>
</div>

<script>
    const baseUrl = "<?= base_url() ?>"
    const techId = <?= esc($tech_id) ?>

    const insertDataIntoView = (data) => {
        $.each(data, (index, item) => {
            $("#categories_list").append(`
                <div class="max-w-sm flex flex-col lg:flex-row justify-between p-3 lg:p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${item.category}</h5>
                    </a>
                    <a href="${baseUrl}quiz/perguntas/${item.id}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Jogar
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            `)
        })
        $('#before-list-categories-loaded').addClass('hidden')
        $('#after-list-categories-loaded').removeClass('hidden')

    }

    const flux = async () => {
        const categories = await getCategoriesByTech(techId) //utils/quiz.js

        if (!categories) {
            $('#before-list-categories-loaded').addClass('hidden')
            $('#after-list-categories-loaded').html(`
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                Não há dados para ser mostrado, tente novamente
            </div>
            `)
            $('#after-list-categories-loaded').removeClass('hidden')

            return
        }

        insertDataIntoView(categories.data)
    }

    flux()

</script>