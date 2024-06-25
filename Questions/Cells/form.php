<div id="before-request-data" class="grid place-items-center p-8 before-page-init">
    <div class="w-14 h-14">
        <?= view_cell('Components/SpinnerCell') ?>
    </div>
</div>

<form id="after-request-data" class="mx-auto space-y-4">

    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="sm:col-span-2">
            <label for="question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pergunta</label>
            <textarea id="question" rows="1"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Escreva a pergunta"><?= $question->question ?></textarea>
        </div>

        <div class="w-full">
            <label for="option_a" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Opção A</label>
            <input type="text" name="option_a" id="option_a" value="<?= $question->option_a ?>"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Inclua" required="">
        </div>
        <div class="w-full">
            <label for="option_b" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Opção B</label>
            <input type="text" name="option_b" id="option_b" value="<?= $question->option_b ?>" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600
                focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Inclua" required="">
        </div>
        <div class="w-full">
            <label for="option_c" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Opção C</label>
            <input type="text" name="option_c" id="option_c" value="<?= $question->option_c ?>" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600
                focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Inclua" required="">
        </div>
        <div class="w-full">
            <label for="option_d" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Opção D</label>
            <input type="text" name="option_d" id="option_d" value="<?= $question->option_d ?>" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600
                focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Inclua" required="">
        </div>
        <div class="w-full">
            <label for="correct" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resposta
                Correta</label>
            <p class="correct_option"></p>
            <small class="text-[10px]">Esse opção não pode ser alterada, certifique-se de que a resposta correta esteja
                na <span class="correct_option"></span></small>

        </div>
        <div class="mb-5" id="options">
            <label for="list" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Selecione a
                categoria
            </label>
            <input list="list" id="category_id" value="<?= $question->category_id ?>"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-blue-500 focus:outline-none block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Tecnologia ou assunto" />
            <small class="text-[10px]">O campo selecionado representa o Id da categoria.</small>
            <datalist id="list"></datalist>
        </div>

    </div>
</form>
<button type="button" id="edit_question"
    class="w-full lg:max-w-md    text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm   px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 ">
    <span class="before-request">Atualizar</span>
    <div class="during-request w-5 h-5 mx-auto hidden"><?= view_cell('Components/SpinnerCell') ?></div>
</button>

<script>
    const baseUrl = "<?= base_url() ?>" // baseurl/
    const id = "<?= esc($id) ?>"
    const correctOption = "<?= esc($question->correct) ?>"

    const translateOption = (option) => {
        const list = ["option_a", "option_b", "option_c", "option_d"]

        if (!list.includes(option)) {
            $(".correct_option").parent().html("Houve um erro")
            return
        }

        switch (option) {
            case "option_a":
                $(".correct_option").text("Opção A")
                break
            case "option_b":
                $(".correct_option").text("Opção B")
                break
            case "option_c":
                $(".correct_option").text("Opção C")
                break
            case "option_d":
                $(".correct_option").text("Opção D")
                break
            default:
            // code block
        }
    }

    translateOption(correctOption)

    const insertFormIntoView = (categories) => {
        $("#list").html('')
        $.each(categories, (index, value) => {
            $("#list").append(`
        <option value="${value.id}" class="uppercase">${value.category}</option>
    `)
        })

        $("#before-request-data").addClass("hidden")
        $("#after-request-data").removeClass("hidden")
    }

    const getAndInsertCategories = async () => {
        const categories = await getCategories() //utils/function.js
        if (!categories) return
        insertFormIntoView(categories)
    }

    getAndInsertCategories()

    const update = async () => {
        try {
            $('.before-request').addClass('hidden')
            $('.during-request').removeClass('hidden')

            const response = await axiosInstance.put(`${baseUrl}api/questions/${id}`, {
                "question": $("#question").val(),
                "option_a": $("#option_a").val(),
                "option_b": $("#option_b").val(),
                "option_c": $("#option_c").val(),
                "option_d": $("#option_d").val(),
                "category_id": $("#category_id").val()
            })
            console.log(response)

            if (response.data.message) {
                Swal.fire({
                    title: "Falha ao criar recurso",
                    text: response.data.message,
                    icon: "error"
                }).then(value => Swal.clickConfirm(
                    $("#category").val('')
                ))

                $('.before-request').removeClass('hidden')
                $('.during-request').addClass('hidden')
                return
            }


            if (response.data && response.status === 200) {
                const displayMessage = handleResponseQuestions(response.data) //utils/function.js
                Swal.fire({
                    title: "Falha ao criar recurso",
                    html: displayMessage,
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
                        text: "O recurso foi criado com sucesso",
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



    $("#edit_question").on("click", () => {
        //utils/function.js
        if (fieldIsEmpty("question", "Pergunta")) return
        if (fieldIsEmpty("option_a", "opção A")) return
        if (fieldIsEmpty("option_b", "opção B")) return
        if (fieldIsEmpty("option_c", "opção C")) return
        if (fieldIsEmpty("option_d", "opção D")) return


        if (fieldIsEmpty("category_id", "Categoria")) return

        update()
    })


</script>