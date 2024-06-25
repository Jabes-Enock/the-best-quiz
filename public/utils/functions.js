
/**
*@description   function verifies if an input field is empty 
*@param {string} inputId     (#name => name)
*@param {string} fieldName    humanize response (technologyFiled=> campo tecnologia)
*@return {bool}    return true if input is filed and false if input is fill
*/ 

const fieldIsEmpty = (inputId, fieldName) =>  {

  const field = $(`#${inputId}`).val()

  if( field == null || field == "" ) {
    Swal.fire(
      {
        title: "Dados Faltando",
        html: `O campo <b>${fieldName}</b> precisa ser preenchido`,
        iconHtml: "<i class='mdi mdi-database-off-outline'></i>"
      }).then(value =>
        $(`#${inputId}`).focus()
      )

    return true
  }

  return false
}

const getTechnologies = async () => {
  try {
      const response = await axiosInstance.get(`${baseUrl}/api/technologies`)

      if (response.data.message) {
          Swal.fire({
              title: "Não há dados",
              text: response.data.message,
              icon: "error"
          });

          return false
      }

      return response.data
  } catch (error) {
      Swal.fire({
          title: "Erro de comunicação",
          text: "Não foi possivel se conectar ao servidor, por favor tente novamente.",
          icon: "error"
      });

      return false
  }
}

const getCategories = async () => {
  try {
    const response = await axiosInstance.get(`${baseUrl}/api/categories`)

    if (response.data.message) {
      Swal.fire({
          title: "Não há dados",
          text: response.data.message,
          icon: "error"
      });

      return false
    }

    return response.data
  } catch (error) {
    Swal.fire({
        title: "Erro de comunicação",
        text: "Não foi possivel se conectar ao servidor, por favor tente novamente.",
        icon: "error"
    });

    return false
  }
}


/**
*@description   function to search for a question which contains the text passed
*@param {string} search    word that user wants to find it
*@return {array}   return an array if matches the search param
*/ 

const searchQuestion = async (search) => {
  try {
    const response = await axiosInstance.get(`${baseUrl}api/questions/search/${search}`)

    return response.data.message ? false : response.data
  } catch (error) {
    Swal.fire({
        title: "Erro de comunicação",
        text: "Não foi possivel se conectar ao servidor, por favor tente novamente.",
        icon: "error"
    });

    return false
  }
}



/**
*@description   function to display which errors the post(api/questions) routes has occurs and display it
*@param {string} message    All messages return by API
*@return {string} message :   return which filed needs to be fix
*/ 

const handleResponseQuestions = (message) => {
  if (message.question) return message.question
  if (message.option_a) return message.option_a
  if (message.option_b) return message.option_b
  if (message.option_c) return message.option_c
  if (message.option_d) return message.option_d
  if (message.correct) return message.correct
  if (message.category_id) return message.category_id
}

const handleResponseTechnologies = (message) => {
  if (message.technology) return message.technology
  if (message.is_visible) return message.is_visible
}

const handleResponseCategories = (message) => {
  if (message.category) return message.category
  if (message.technology_id) return message.technology_id
  if (message.is_visible) return message.is_visible
}

