{include file='templates/header.tpl'}
{include file='templates/nav.tpl'}
<div class="bg-light p-3" style="--bs-bg-opacity: .98;">
<ul class="list-group">
    <li class="list-group-item active">    Nombre de la Editorial: {$editorial->name}</li>
    <li class="list-group-item">    Idioma: {$editorial->language}</li>
</ul>


<h2 class="bg-success p-3" style="--bs-bg-opacity: .98;"> Lista de Libros de la Editorial {$editorial->name}: </h2>

<table class="table table-light table-hover">
  <thead>
    <tr>
      <th scope="col">Título</th>
      <th scope="col">Autor</th>
      <th scope="col">Editorial</th>
      <th scope="col">Precio (ARS)</th>
    </tr>
  </thead>
  <tbody>
  {foreach from=$books item=$book}
    <tr>
      <th scope="row"><a href="viewBook/{$book->id_book}">{$book->title}</a></th>
      <td>{$book->author}</td>
      <td>{$editorial->name}</td>
      <td>{$book->price}</td>
    </tr>
    {/foreach}
  </tbody>
</table></div>



<a href="category"  class="btn btn-info"> Volver a Lista Editoriales </a>
<a href="admHome" class="btn btn-secondary"> Volver a Home Administrador </a>
<a class="btn btn-danger" href="logout">Log Out</a>


{include file='templates/footer.tpl'}