<div id="before-list-techs-loaded" class="grid place-items-center p-8 before-page-init">
    <div class="w-14 h-14">
        <?= view_cell('Components/SpinnerCell') ?>
    </div>
</div>
<div id="after-list-techs-loaded" class="hidden">
    <div id="resume_technologies" class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-8 mb-16"></div>
</div>

<script>
    const baseUrl = "<?= base_url() ?>"

    const insertDataIntoView = (data) => {
        $.each(data, (index, item) => {
            $("#resume_technologies").append(`
                <a href="${baseUrl}quiz/${item.id}" class="w-full h-42 p-4 lg:p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-md md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">${item.technology}</h5>
                </a>
            `)
        })
        $('#before-list-techs-loaded').addClass('hidden')
        $('#after-list-techs-loaded').removeClass('hidden')

    }

    const flux = async () => {
        const techs = await getVisibleTechs() //utils/quiz.js

        if (!techs) {
            $('#before-list-techs-loaded').addClass('hidden')
            $('#after-list-techs-loaded').html(`
                <div class= "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role = "alert" >
                Não há dados para ser mostrado, tente novamente
            </ >
            `)
            $('#after-list-techs-loaded').removeClass('hidden')

            return
        }

        insertDataIntoView(techs.data)
    }

    flux()

</script>