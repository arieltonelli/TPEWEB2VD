{include file='templates/header.tpl'}
{include file='templates/nav.tpl'}
<h1 class="bg-success p-3" style="--bs-bg-opacity: .98;">{$nombre}</h1>
{if $message} <h2> {$message}</h2> {/if}

<table class="table table-light table-hover">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Idioma</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>


  {foreach from=$publishers item=$publisher}
    <tr>
      <th scope="row"><a href="viewPublisher/{$publisher->id_publisher}">{$publisher->name}</a></th>
      <td>{$publisher->language}</td>
      <td><a href="formUpdatePublisher/{$publisher->id_publisher}" class="btn btn-warning">Editar</a></td>
      <td><a href="deletePublisher/{$publisher->id_publisher}" class="btn btn-danger">Borrar</a></td>
    </tr>
    {/foreach}
  </tbody>
</table>

<div class="p-3 mb-2 bg-warning text-dark" style="--bs-bg-opacity: .97;"><h2 > Crear Editorial: </h2>
<form action="createPublisher" method="POST">
    Nombre <input type="text" name="name" id="name">
    Idioma <input type="text" name="language" id="language">
    <input type="submit" value="Cargar"></div>
</form>
<ul>
<li><a href="admHome" class="btn btn-secondary"> Volver a Home Administrador </a></li>
<li><a class="btn btn-danger" href="logout">Log Out</a></li>
</ul>
{include file='templates/footer.tpl'}