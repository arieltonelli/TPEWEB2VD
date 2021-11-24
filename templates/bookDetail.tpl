{include file='templates/header.tpl'}
{include file='templates/nav.tpl'}

<div class="bg-light p-3" style="--bs-bg-opacity: .98;">
<ul class="list-group">
    <li class="list-group-item active">    Titulo: {$libro->title}</li>
    <li class="list-group-item">    Autor: {$libro->author}</li>
    <li class="list-group-item">    Editorial: <a href="viewPublisher/{$libro->id_publisher}">{$libro->name}</a></li>
    <li class="list-group-item">    Precio: {$libro->price} </li>
</ul>

<div class="p-3 mb-2 bg-secondary text-light" style="--bs-bg-opacity: .97;">
<input type="submit" class="mostrar-comentarios" data-id="{$libro->id_book}" data-rol="{$usuario->rol}" value="Mostrar comentarios de los usuarios"></div>

<div class="p-3 mb-2 bg-secondary text-light"><ul id="lista-comentarios" class=""></ul></div>

<div  class="p-3 mb-2 bg-primary text-dark" style="--bs-bg-opacity: .97;"><h4 > Escribe tu comentario aquí: </h4>
<form action="" method="POST">
            <input type="hidden" name="id_user" id="id_user" value ="{$usuario->id_user}">
    Asunto: <input type="text" name="subject" id="subject">
    Comentario: <textarea type="textarea" name="body" id="body"></textarea>
    Puntaje: <select name="score" id="score">
                <option selected>5</option>
                <option>4</option>
                <option>3</option>
                <option>2</option>
                <option>1</option>
              </select>
    <input type="hidden" name="id_book" id="id_book" value ="{$libro->id_book}">
    <input type="submit" id="submit" class="agregar-comentario" value="Publicar">
</form></div> </div>


<a href="books"  class="btn btn-info"> Volver a Lista Libros </a>
<a href="admHome" class="btn btn-secondary"> Volver a Home Administrador </a>
<a class="btn btn-danger" href="logout">Log Out</a>
<script src="js/comments.js"></script>
{include file='templates/footer.tpl'}