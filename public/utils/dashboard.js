
/** 
@description - This function show all resource and quantity
@return {array} - [
  {"name": "tecnologias","quantity": int},
	{"name": "categorias","quantity": int},
	{"name": "perguntas","quantity": int}
]
**/

const getResumeResources = async () => {
  try {
     const response = await axiosInstance.get(`${baseUrl}api/dashboard/resume-resources`)
     return response
  } catch (error) {
    Swal.fire({
        title: "Erro de comunicação",
        text: "Não foi possivel se conectar ao servidor, por favor tente novamente.",
        icon: "error"
    })

    return false
  }
}


/** 
@description - This function get all categories and the quantity of questions related to this category
@return {array} - [
  {"category": "shield","quantity": int},
  {"category": "model","quantity": int},
]
**/

const getCategoryRelatedQuestionsQuantity= async () => {
  try {
     const response = await axiosInstance.get(`${baseUrl}api/dashboard/categories-related-questions`)
     
     return response
  } catch (error) {
    Swal.fire({
        title: "Gráfico de categorias",
        text: "Não foi possivel obter os dados para construir o gráfico categorias X questões",
        icon: "error"
    })

    return false
  }
}