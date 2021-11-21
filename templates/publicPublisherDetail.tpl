{include file='templates/header.tpl'}
{include file='templates/publicNav.tpl'}


<ul class="list-group">
    <li class="list-group-item active">    Nombre de la Editorial: {$editorial->name}</li>
    <li class="list-group-item">    Idioma: {$editorial->language}</li>
</ul>

<h2 class="bg-secondary p-3" style="--bs-bg-opacity: .8;">Lista de Libros de la Editorial {$editorial->name}:</h2>

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
      <th scope="row"><a href="publicViewBook/{$book->id_book}">{$book->title}</a></th>
      <td>{$book->author}</td>
      <td>{$editorial->name}</td>
      <td>{$book->price}</td>
    </tr>
    {/foreach}
  </tbody>
</table>



<a href="publicCategories" class="btn btn-light"> Volver a Editoriales </a>
<a href="home" class="btn btn-light"> Volver a Home </a>

{include file='templates/footer.tpl'}