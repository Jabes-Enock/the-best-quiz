<form class="max-w-sm mx-auto space-y-4">
    <div class="mb-5">
        <label for="technology" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Nova tecnologia
        </label>
        <input type="text" id="technology"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="tecnologia ou area de estudo" />
    </div>
    <div class="mb-5">
        <label for="is_visible" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Visivel
        </label>
        <select id="is_visible"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

            <option value="1">Exibir esta tecnologia na página</option>
            <option value="0">Esconder esta tecnologia</option>
        </select>
    </div>
    <button type="button" id="create_technology"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 ">
        <span class="before-request">Adicionar</span>
        <div class="during-request w-5 h-5 mx-auto hidden"><?= view_cell('Components/SpinnerCell') ?></div>
    </button>
</form>

<script>
    const baseUrl = "<?= base_url() ?>" // baseurl/

    const create = async () => {
        try {
            $('.before-request').addClass('hidden')
            $('.during-request').removeClass('hidden')

            const response = await axiosInstance.post(`${baseUrl}api/technologies`, {
                "technology": $("#technology").val(),
                "is_visible": $("#is_visible").val(),
            })

            if (response.data.message) {
                Swal.fire({
                    title: "Falha ao criar recurso",
                    text: response.data.message,
                    icon: "error"
                }).then(value => Swal.clickConfirm(
                    $("#technology").val('')
                ))

                $('.before-request').removeClass('hidden')
                $('.during-request').addClass('hidden')
                return
            }

            if (response.data) {
                const message = handleResponseTechnologies(response.data)
                Swal.fire({
                    title: "Falha ao criar recurso",
                    text: message,
                    icon: "error"
                }).then(value => Swal.clickConfirm(
                    $("#technology").val('')
                ))

                $('.before-request').removeClass('hidden')
                $('.during-request').addClass('hidden')
                return
            }

            if (response.status === 201) {
                Swal.fire(
                    {
                        title: "Sucesso",
                        text: "O recurso foi criado com sucesso",
                        icon: "success"
                    }
                ).then(value => {
                    window.location.replace(`${baseUrl}tecnologias`);
                })
            }

        } catch (error) {
            Swal.fire({
                title: "Erro de comunicação",
                text: "Não foi possivel se conectar ao servidor, por favor tente novamente.",
                icon: "error"
            });
            $('.before-request').addClass('hidden')
            $('.during-request').removeClass('hidden')
        }
    }



    $("#create_technology").on("click", () => {
        const validate = fieldIsEmpty("technology", "Nova da tecnologia")

        if (validate) return

        if ($("#is_visible").val().toLowerCase() == "Selecione uma opção") {
            $("#is_visible").val("")
        }
        if (fieldIsEmpty("is_visible", "Selecione uma opção")) return

        create()
    })


</script>