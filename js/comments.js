"use strict"

window.addEventListener('DOMContentLoaded', (event) => { 

    const API_URL = "http://localhost/web2/TPEVF/api/comentarios";
    
    let lista = document.querySelector("#lista-comentarios");

    async function getComentarios(){
    //fetch para tareas traer todos los comentarios


            let response = await fetch(API_URL);
            let comentarios = await response.json();
        
            let admin = lista.dataset.rol;
            
            let idLibro = lista.dataset.id;
            render(comentarios, admin, idLibro);
    }
        
    function render(comentarios, admin, idLibro){
    
        lista.innerHTML = "";
        console.log(idLibro);
            if(admin == "1"){
                for (let comentario of comentarios){
                    if (comentario.id_book == idLibro){
                        console.log(comentario.id_book);
                        let html =  `<ul><li class="list-group-item active"> Usuario: ${comentario.email}<li>`+
                                        `<li class="list-group-item"> Asunto: ${comentario.subject}<li>`+
                                        `<li class="list-group-item"> Comentario: ${comentario.body}<li>`+
                                        `<li class="list-group-item"> Puntaje: ${comentario.score}<li>`+
                                        `<li><button data-id="${comentario.id_comment}" class="eliminar" >Borrar (Adm)</button></li></ul>`
                                        lista.innerHTML += html;
                                        }
                                    }
                                 }                       
                    else{
                        for (let comentario of comentarios){
                            if (comentario.id_book == idLibro){

                                let html =  `<li class="list-group-item"> Usuario: ${comentario.email}<li>`+
                                            `<li class="list-group-item"> Asunto: ${comentario.subject}<li>`+
                                            `<li class="list-group-item"> Comentario: ${comentario.body}<li>`+
                                            `<li class="list-group-item"> Puntaje: ${comentario.score}<li>`;
                                        lista.innerHTML += html;
                                        }

                                    }       
                                }
        document.querySelectorAll(".eliminar").forEach((button) => {
            button.addEventListener("click", borrarComentario);
            });
    }

    async function borrarComentario(e){
        e.preventDefault();
        console.log("borrar");
        document.location.reload();
        let id = this.dataset.id;
    
        try {
           let res = await fetch (API_URL+"/"+id, {
            "method" : "DELETE"
                });
            if(res.status === 200){
            document.querySelector("#respuesta").innerHTML = "borrado!"
                }
            } 
        catch (error) {
            document.querySelector("#respuesta").innerHTML = "Error de conexion!"
            }
    }

    async function agregarComentario(e){
        e.preventDefault();
        let subject = document.querySelector("#subject").value;
        let body = document.querySelector("#body").value;
        let score = document.querySelector("#score").value;
        let id_user = document.querySelector("#id_user").value;
        let id_book = document.querySelector("#id_book").value;
        let comentarios = {
            "subject": subject,
            "body": body,
            "score": score,
            "id_user": id_user,
            "id_book": id_book,
            };

            try {
                let res = await fetch (API_URL, {
                    "method": "POST",
                    "headers": {"Content-type":"application/json"},
                    "body": JSON.stringify(comentarios)
                });
                if(res.status === 201){
                    document.querySelector("#respuesta").innerHTML = "Comentario completado con exito."
                    }
                } 

            catch (error) {
                console.log(error);
                }
            document.location.reload();
            getComentarios();
            document.getElementById("submit").reset();
    }

    document.querySelector(".agregar-comentario").addEventListener("click", agregarComentario);

    getComentarios();

});