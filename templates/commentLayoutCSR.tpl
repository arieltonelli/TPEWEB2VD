{include file='templates/header.tpl'}


<div class="p-3 mb-2 bg-warning text-dark" style="--bs-bg-opacity: .97;"><h2 > Crear Comentario: </h2>
<form action="createComment" method="POST">
            <input type="hidden" name="id_user" id="id_user">
    Asunto <input type="text" name="subject" id="subject">
    Comentario <textarea type="textarea" name="body" id="body"></textarea>
    Puntaje <select name="score" id="score">
                <option selected>5</option>
                <option>4</option>
                <option>3</option>
                <option>2</option>
                <option>1</option>
              </select>
    Libro <input type="number" name="id_book" id="id_book">
    <input type="submit"class="btn btn-danger" value="Publicar">
</div>



<div class="p-3 mb-2 bg-warning text-dark" style="--bs-bg-opacity: .97;"><h2 > Titulo </h2>

<ul id="lista-comentarios" class="list-group">

</ul>

</div>



<a href="admHome" class="btn btn-secondary"> Volver a Home Administrador </a>
<a class="btn btn-danger" href="logout">Log Out</a>


<a href="admHome" class="btn btn-primary"> Volver a Home <a>

<script src="js/comments.js"></script>

{include file='templates/footer.tpl'}
