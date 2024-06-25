<div id="alert-additional-content-2"
    class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
    role="alert">
    <div class="flex items-center">
        <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <h3 class="text-lg font-medium">Essa ação é irreversivel</h3>
    </div>
    <div class="mt-2 mb-4 text-sm">
        Ao excluir essa tecnologia, as seguintes ações ocorrerão:
        <br><br>
        <ul class="mt-1.5 list-disc list-inside">
            <li>Todas as perguntas relacionadas a essa tecnologia serão excluidas permanentemente.</li>
        </ul>

        <br>

        Tem certeza que deseja deletar este recurso?
    </div>
    <div class="flex">
        <button type="button" id="delete_question"
            class="text-white bg-red-800 hover:bg-red-900  focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            <span class="before-request">Deletar</span>
            <div class="during-request w-5 h-5 mx-auto hidden"><?= view_cell('Components/SpinnerCell') ?></div>
        </button>
        <a href="<?= base_url("categorias") ?>"
            class="cursor-pointer text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
            Cancelar
        </a>
    </div>
</div>

<script>
    const baseUrl = "<?= base_url() ?>"
    const id = "<?= esc($id) ?>"

    const deleteQuestion = async () => {
        try {
            $('.before-request').addClass('hidden')
            $('.during-request').removeClass('hidden')

            const response = await axiosInstance.delete(`${baseUrl}api/questions/${id}`)

            if (response.data.message) {
                Swal.fire({
                    title: "Falha ao deletar recurso",
                    text: response.data.message,
                    icon: "error"
                })

                $('.before-request').removeClass('hidden')
                $('.during-request').addClass('hidden')
                return
            }

            if (response.data.technology) {
                Swal.fire({
                    title: "Falha ao deletar recurso",
                    text: response.data.technology,
                    icon: "error"
                })

                $('.before-request').removeClass('hidden')
                $('.during-request').addClass('hidden')
                return
            }



            if (response.status === 201) {
                Swal.fire(
                    {
                        title: "Sucesso",
                        text: "O recurso foi deletado com sucesso",
                        icon: "success"
                    }
                ).then(value => {
                    window.location.replace(`${baseUrl}perguntas`);
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

    $("#delete_question").on("click", () => {
        deleteQuestion()
    })


</script>