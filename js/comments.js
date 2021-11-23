"use strict"

const API_URL = "http://localhost/web2/TPEVF/api/comentarios";

async function getComentarios(){
    //fetch para tareas traer todos los comentarios

    try{
        let response = await fetch(API_URL);
        let comentarios = await response.json();

        render(comentarios);

    } catch (e) {

    console.log(e);
    }

}

function render(comentarios){
  let lista = document.querySelector("#lista-comentarios");
  lista.innerHTML = "";
    for (let comentario of comentarios){

        let html =  `<li class="list-group-item"> Usuario: ${comentario.id_user}<li>`+
                    `<li class="list-group-item"> Asunto: ${comentario.subject}<li>`+
                    `<li class="list-group-item"> Comentario: ${comentario.body}<li>`+
                    `<li><button data-id="${comentario.id_comment}" class="btn btn-danger" >Borrar (Adm)</button></li>`;
        lista.innerHTML += html;

    }
  

 
}

getComentarios();

async function deleteComment(id){
    try{
        let response= await fetch (`${API_URL}/${id.id}`,{
            "method": "DELETE"
    });
        if(response.ok){
            getComments();
        }
    }catch(error){
            console.log(error)
        }
    } 
