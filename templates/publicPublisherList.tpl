{include file='templates/header.tpl'}
{include file='templates/publicNav.tpl'}
<h1 class="bg-success p-3" style="--bs-bg-opacity: .98;">{$nombre}</h1>


<table class="table table-light table-hover"  >
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Idioma</th>
    </tr>
  </thead>
  <tbody>
  {foreach from=$publishers item=$publisher}
    <tr>
      <th scope="row"><a href="viewPublicPublisher/{$publisher->id_publisher}">{$publisher->name}</a></th>
      <td>{$publisher->language}</td>
    </tr>
    {/foreach}
  </tbody>
</table>

<a href="home" class="btn btn-light"> Volver a Home </a>

{include file='templates/footer.tpl'}