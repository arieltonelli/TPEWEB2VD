{include file='templates/header.tpl'}
{include file='templates/nav.tpl'}


<ul class="list-group">
    <li class="list-group-item active">    Titulo: {$libro->title}</li>
    <li class="list-group-item">    Autor: {$libro->author}</li>
    <li class="list-group-item">    Editorial: <a href="viewPublisher/{$libro->id_publisher}">{$libro->name}</a></li>
    <li class="list-group-item">    Precio: {$libro->price} </li>
</ul>

<div  class="p-3 mb-2 bg-secondary text-light" style="--bs-bg-opacity: .97;">

<h3>Comentarios de los Usuarios:</h3></div>

<div><ul id="lista-comentarios" class=""></ul></div>

<div  class="p-3 mb-2 bg-primary text-dark" style="--bs-bg-opacity: .97;"><h4 > Escribe tu comentario aquí: </h4>
<form action="createComment" method="POST">
    Email <input type="text" name="email" id="email">
    Asunto <input type="text" name="asunto" id="asunto">
    Comentario <textarea type="textarea" name="comentario" id="comentario"></textarea>
    Puntaje <select name="score" id="score">
                <option selected>5</option>
                <option>4</option>
                <option>3</option>
                <option>2</option>
                <option>1</option>
              </select>
    <input type="submit"class="btn btn-danger" value="Publicar">
</form></div>


<a href="books"  class="btn btn-info"> Volver a Lista Libros </a>
<a href="admHome" class="btn btn-secondary"> Volver a Home Administrador </a>
<a class="btn btn-danger" href="logout">Log Out</a>
<script src="js/comments.js"></script>
{include file='templates/footer.tpl'}