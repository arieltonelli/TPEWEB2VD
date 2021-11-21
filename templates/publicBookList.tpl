{include file='templates/header.tpl'}
{include file='templates/publicNav.tpl'}

<h1 class="bg-success p-3" style="--bs-bg-opacity: .98;">{$titulo}</h1>
<img src="./Images/booklist.jpg" class="img-thumbnail" alt="lista de libros">
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
      <td>{$book->name}</td>
      <td>{$book->price}</td>
    </tr>
    {/foreach}
  </tbody>
</table>
<a href="home" class="btn btn-light"> Volver a Home </a>

{include file='templates/footer.tpl'}