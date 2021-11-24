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
                    `<li><button data-id="${comentario.id_comment}" class="eliminar" >Borrar (Adm)</button></li>`;
        lista.innerHTML += html;

    }
    document.querySelectorAll(".eliminar").forEach((button) => {
        button.addEventListener("click", borrar);
    });

 
}

getComentarios();

async function borrar(e){
    e.preventDefault();

    let id = this.comentario.id_comment;
    
    try {
       let res = await fetch (`${API_URL}/${id}`, {
        "method" : "DELETE"
    });
    if(res.status === 200){
        document.querySelector("#respuesta").innerHTML = "borrado!"
    }
      
    } catch (error) {
        document.querySelector("#respuesta").innerHTML = "Error de conexion!"
    }
    getComentarios();
   
}
