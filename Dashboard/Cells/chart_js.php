<p class="md:text-3xl">Perguntas X Categorias</p>
<div id="before-category-graphic-chart-loaded" class="grid place-items-center p-8 before-page-init">
    <div class="w-14 h-14">
        <?= view_cell('Components/SpinnerCell') ?>
    </div>
</div>
<div id="after-category-graphic-chart-loaded" class="mb-24 max-w-2xl">
    <canvas id="category-graphic-chart" class="hidden"></canvas>
</div>

<script>

    const createCategoriesChart = (graphicData) => {
        const ctx = document.getElementById("category-graphic-chart").getContext("2d")
        const data = {
            labels: graphicData.categories,
            datasets: [
                {
                    label: "Perguntas",
                    data: graphicData.questions,
                    backgroundColor: "#38bdf8",
                    borderColor: "#3b82f6",
                    borderWidth: 2
                },
            ]
        }

        const chart = new Chart(ctx, {
            type: 'bar',
            data: data,
        })
    }

    const transformCategories = (data) => {
        let categories = []
        let quantity = []

        data.forEach(item => {
            categories.push(item.category)
            quantity.push(item.questions)
        })

        return { "categories": categories, "questions": quantity }
    }

    const fluxChart = async () => {
        const response = await getCategoryRelatedQuestionsQuantity()

        if (!response) {
            $('#before-category-graphic-chart-loaded').addClass('hidden')
            $('#after-category-graphic-chart-loaded').removeClass('hidden')
            $('#after-category-graphic-chart-loaded').html('')
            $('#after-category-graphic-chart-loaded').html(`
                <div id="alert-additional-content-2"
                class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                role="alert">
                    Houve um erro tente novamente recarregando a página
                </div>
            `)

            return
        }

        const graphicData = transformCategories(response.data)
        createCategoriesChart(graphicData)

        $('#before-category-graphic-chart-loaded').addClass('hidden')
        $('#after-category-graphic-chart-loaded').removeClass('hidden')

    }

    fluxChart()

</script>