<p class="md:text-3xl ">Resumo geral</p>
<div id="before-resume-resources-loaded" class="grid place-items-center p-8 before-page-init">
    <div class="w-14 h-14">
        <?= view_cell('Components/SpinnerCell') ?>
    </div>
</div>
<div id="after-resume-resources-loaded" class="hidden">
    <div id="resume_resources" class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-8 mb-16"></div>
</div>

<script>
    const baseUrl = "<?= base_url() ?>"

    const insertData = (resources) => {
        $.each(resources, (index, value) => {
            $("#resume_resources").append(`
                <div class="w-full py-3  lg:p-6 ${value.bg} rounded-lg shadow ">
                    <div class="flex flex-col lg:flex-row items-center justify-between">
                        <div class="grid place-items-center">
                            <p class="mb-3 font-normal text-white  uppercase">${value.title}</p>
                             <h5 class="mb-2 text-4xl font-semibold tracking-tight text-white">${value.quantity}</h5>
                        </div>
                        <i class="${value.icon} hidden lg:block text-6xl  text-white"></i>
                    </div>
                    <a href="<?= base_url() ?>${value.title}" class="grid grid-cols-2 font-medium items-center text-white hover:underline">
                        <span class="hidden lg:block ">ir para ${value.title}</span> 
                        <span class="block text-right lg:hidden">Ver</span> 
                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                        </svg>
                    </a>
                </div>
                `)
        })
    }

    const transformResumeResources = (resources) => {
        const icons = [
            "mdi mdi-progress-wrench",
            "mdi mdi-shape-plus",
            "mdi mdi-cloud-question-outline"
        ]

        const backgrounds = [
            "bg-gradient-to-r from-blue-400 to-cyan-400",
            "bg-gradient-to-r from-red-500 to-orange-500",
            "bg-gradient-to-r from-fuchsia-600 to-pink-600"
        ]

        const data = resources.data.map((item, index) => {
            resource = {
                "title": item.name,
                "quantity": item.quantity,
                "icon": icons[index],
                "bg": backgrounds[index],
            }

            return resource
        })

        return data
    }

    const getAndInsertResumeResource = async () => {
        const resumeResources = await getResumeResources()
        insertData(transformResumeResources(resumeResources))

        if (!resumeResources) {
            $('#before-resume-resources-loaded').addClass('hidden')
            $('#after-resume-resources-loaded').removeClass('hidden')
            $('#after-resume-resources-loaded').html('')
            $('#after-resume-resources-loaded').html('Houve um erro tente novamente')
        }

        $('#before-resume-resources-loaded').addClass('hidden')
        $('#after-resume-resources-loaded').removeClass('hidden')
    }

    getAndInsertResumeResource()
</script>