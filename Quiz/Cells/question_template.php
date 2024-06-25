<div id="before-question-loaded" class="grid place-items-center p-8 before-page-init ">
    <div class="w-14 h-14">
        <?= view_cell('Components/SpinnerCell') ?>
    </div>
</div>
<div id="after-question-loaded" class="hidden">
    <div class="space-y-8 grid place-items-center">
        <p><span class="text-2xl">Pergunta</span> <span class="current-question text-2xl">1</span> / <span
                class="total-questions"></span> </p>
        <p class="lg:text-3xl question">Como criar um model utilizando o comando spark?</p>
        <div class="md:w-8/12 space-y-4">
            <div id="options" class="space-y-4"></div>
            <div class="button-content grid justify-end">
                <button type="button" id="answer_question" onclick="quiz()" disabled
                    class="w-32 bg-gray-100 dark:bg-gray-700  text-gray-400 focus:outline-none  font-medium rounded-full text-sm px-5 py-2.5 text-center ">
                    <span class="before-request">Enviar</span>
                    <div class="during-request w-5 h-5 mx-auto hidden"><?= view_cell('Components/SpinnerCell') ?></div>
                </button>

            </div>
        </div>
    </div>

</div>

<script>
    const baseUrl = "<?= base_url() ?>"
    const categoryId = <?= esc($category_id) ?>

    let page = 1 //...category/23?page=${page}
    let totalQuestions
    let questionId
    let countRightAnswers = 0
    let countWrongAnswers = 0


    const insertOptions = (options) => {
        const optionsValue = ["a", "b", "c", "d"]

        $("#options").html("")
        $.each(options, (index, value) => {
            $("#options").append(`
                <div class="w-full flex items-center px-4 border border-gray-200 rounded    ">
                    <label for="option_${optionsValue[index]}"
                        class="w-full py-4 mr-8  text-sm font-medium text-gray-900 dark:text-gray-300">
                        ${value}
                    </label>
                    <input id="option_${optionsValue[index]}" type="radio" value="option_${optionsValue[index]}" name="bordered-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </div>
            `)
        })
    }

    const shuffleElements = () => {
        const options = $("#options").children()
        $.each(options, (index, value) => $("#options").append(options.eq(Math.floor(Math.random() * options.length))))
    }

    const insertDataIntoView = (data) => {
        $(".question").html(data.question)

        insertOptions(data.options)
        shuffleElements()

        $('#before-question-loaded').addClass('hidden')
        $('#after-question-loaded').removeClass('hidden')
    }

    const getQuestionAndInsertIntoView = async () => {
        const questions = await getQuestionsByCategory(categoryId, page) //quiz/function.js

        if (!questions) {
            $('#before-question-loaded').addClass('hidden')
            $('#after-question-loaded').html(`
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                Não há dados para ser mostrado, tente novamente
            </div>
            `)
            $('#after-question-loaded').removeClass('hidden')

            return
        }

        questionId = questions.data.id
        totalQuestions = questions.data.pages
        insertDataIntoView(questions.data)
        $(".current-question").html(page)
        $(".total-questions").html(totalQuestions)
    }

    const checkIfRadioButtonIsSelected = () => {
        const radioList = document.querySelectorAll("input[type='radio']")
        radioList.forEach(item => {
            item.addEventListener("change", () => {
                $("#answer_question").removeClass("bg-gray-100 dark:bg-gray-700")
                $("#answer_question").addClass("text-white bg-blue-700 dark:bg-blue-700 hover:bg-blue-800 dark:hover:bg-blue-700")
                $("#answer_question").attr("disabled", false)
            })
        })
    }

    const buildQuiz = async () => {
        await getQuestionAndInsertIntoView()
        checkIfRadioButtonIsSelected()
    }

    buildQuiz()

    const checkAnswer = async (question_id, answer) => {
        try {
            $('.before-request').addClass('hidden')
            $('.during-request').removeClass('hidden')

            const response = await axiosInstance.post(`${baseUrl}api/quiz/check-answer`, {
                question_id,
                answer,
            })

            if (response.data.message) {
                Swal.fire({
                    title: "Pergunta inválida",
                    text: response.data.message,
                    icon: "error"
                })

                $('.before-request').removeClass('hidden')
                $('.during-request').addClass('hidden')
                return
            }

            return response.data

        } catch (error) {
            Swal.fire({
                title: "Erro de comunicação",
                text: "Não foi possivel se conectar ao servidor, por favor tente novamente.",
                icon: "error"
            })

            $('.before-request').addClass('hidden')
            $('.during-request').removeClass('hidden')
        }
    }

    const hiddenAllRadioButton = () => {
        const radioList = document.querySelectorAll("input[type='radio']")
        radioList.forEach(item => item.classList.add("hidden"))
    }


    const isAnswerRight = (response) => {
        hiddenAllRadioButton()

        const rightParent = $(`#${response.correct}`).parent()

        rightParent.removeClass("border border-gray-200")
        rightParent.addClass("border border-green-500 bg-green-100 dark:bg-gray-800")

        if (!response.is_correct) {
            const wrongParent = $(`#${response.answered}`).parent()

            wrongParent.removeClass("border border-gray-200")
            wrongParent.addClass("border border-red-500 bg-red-100 dark:bg-gray-800")
            countWrongAnswers++
            return
        }

        countRightAnswers++
    }

    const displayNextButton = () => {
        $(".button-content").html("")
        $(".button-content").html(`
            <button type="button" onclick="nextQuestion()"
                class="next-question w-32 bg-gray-700 text-white focus:outline-none  font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 ">
                Próximo <i class="mdi mdi-arrow-right"></i>

            </button>
        `)
    }

    const displayEndButton = () => {
        $(".button-content").html("")
        $(".button-content").html(`
            <button type="button" onclick="endQuiz()"
                class="w-32 bg-gray-700 text-white focus:outline-none  font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 ">
                Finalizar <i class="mdi mdi-arrow-right"></i>
            </button>
        `)
    }

    const displaySendButton = () => {
        $(".button-content").html("")
        $(".button-content").html(`
            <button type="button" id="answer_question" onclick="quiz()" disabled
                class="w-32 bg-gray-100 dark:bg-gray-700  text-gray-400 focus:outline-none  font-medium rounded-full text-sm px-5 py-2.5 text-center ">
                <span class="before-request">Enviar</span>
                <div class="during-request w-5 h-5 mx-auto hidden"><?= view_cell('Components/SpinnerCell') ?></div>
            </button>

        `)
    }

    const displayNextOrEndButton = () => {
        if (page == totalQuestions) {
            displayEndButton()
            return
        }

        displayNextButton()
    }

    async function quiz() {
        const optionSelect = $("input[type='radio']").is(":checked")

        if (!optionSelect) {
            Swal.fire({
                title: "Selecione uma opção",
                text: "Para prosseguir você deve escolher uma questão.",
                icon: "error"
            })

            return
        }

        const response = await checkAnswer(questionId, $("input[type='radio']:checked").val())
        isAnswerRight(response)
        displayNextOrEndButton()
    }

    function nextQuestion() {
        page++
        buildQuiz()
        displaySendButton()
        $('#before-question-loaded').removeClass('hidden')
        $('#after-question-loaded').addClass('hidden')
    }

    function endQuiz() {
        Swal.fire(
            {
                title: "Quiz finalizado",
                html: `
                Aproveitamento:  ${((countRightAnswers / totalQuestions) * 100).toFixed()}%<br><br>
                Acertos: ${countRightAnswers}<br> <br>
                Erros: ${countWrongAnswers}
                `,
                icon: "success"
            }).then(value =>
                window.location.replace(`${baseUrl}`)
            )
    }


</script>