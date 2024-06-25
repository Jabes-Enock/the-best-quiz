
const getVisibleTechs = async () => {
  try {
    const response = await axiosInstance.get(`${baseUrl}api/quiz/technologies`)

      if(response.data.message) {
        Swal.fire({
          title: "Quiz indisponiveis",
          text: response.data.message,
          icon: "error"
        })

      return false
      }

    return response
 } catch (error) {
   Swal.fire({
       title: "Falha ao listar tecnologias",
       text: "Não foi possivel obter os dados para exibir as tecnologias",
       icon: "error"
   })

   return false
 }
}

const getCategoriesByTech = async (tech_id) => {
  try {
     const response = await axiosInstance.get(`${baseUrl}api/quiz/categories-by-technology/${tech_id}`)

      if(response.data.message) {
        Swal.fire({
          title: "Falha ao listar categorias",
          text: response.data.message,
          icon: "error"
        })

      return false
      }

     return response
  } catch (error) {
    Swal.fire({
        title: "Falha ao listar categorias",
        text: "Não foi possivel obter os dados para exibir as categorias",
        icon: "error"
    })

    return false
  }
}

const getQuestionsByCategory = async (category_id, pageNumber) => {
  try {
     const response = await axiosInstance.get(`${baseUrl}api/quiz/questions-by-category/${category_id}?page=${pageNumber}`)

      if(response.data.message) {
        Swal.fire({
          title: "Peguntas não registrada",
          text: response.data.message,
          icon: "error"
        })

      return false
      }

     return response
  } catch (error) {
    Swal.fire({
        title: "Error de comunicação",
        text: "Não foi possivel obter os dados para exibir as perguntas",
        icon: "error"
    })

    return false
  }
}

