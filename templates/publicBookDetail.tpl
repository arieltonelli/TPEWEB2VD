{include file='templates/header.tpl'}
{include file='templates/publicNav.tpl'}

<ul class="list-group">
    <li class="list-group-item active">    Titulo: {$libro->title}</li>
    <li class="list-group-item">    Autor: {$libro->author}</li>
    <li class="list-group-item">    Editorial: <a href="viewPublicPublisher/{$libro->id_publisher}">{$libro->name}</a></li>
    <li class="list-group-item">    Precio: {$libro->price} </li>
</ul>



<a href="publicBooks" class="btn btn-light"> Volver a Listado Libros </a>
<a href="home" class="btn btn-light"> Volver a Home </a>



{include file='templates/footer.tpl'}