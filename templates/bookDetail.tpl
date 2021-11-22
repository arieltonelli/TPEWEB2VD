{include file='templates/header.tpl'}
{include file='templates/nav.tpl'}


<ul class="list-group">
    <li class="list-group-item active">    Titulo: {$libro->title}</li>
    <li class="list-group-item">    Autor: {$libro->author}</li>
    <li class="list-group-item">    Editorial: <a href="viewPublisher/{$libro->id_publisher}">{$libro->name}</a></li>
    <li class="list-group-item">    Precio: {$libro->price} </li>
</ul>

<a href="books"  class="btn btn-info"> Volver a Lista Libros </a>
<a href="admHome" class="btn btn-secondary"> Volver a Home Administrador </a>
<a class="btn btn-danger" href="logout">Log Out</a>

{include file='templates/footer.tpl'}