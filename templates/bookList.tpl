{include file='templates/header.tpl'}
{include file='templates/nav.tpl'}

<div class="bg-light p-3" style="--bs-bg-opacity: .98;">
  <h1 class="bg-success p-3" style="--bs-bg-opacity: .98;">{$titulo}</h1>

  <table class="table table-light table-hover">
    <thead>
      <tr>
        <th scope="col">Título</th>
        <th scope="col">Autor</th>
        <th scope="col">Editorial</th>
        <th scope="col">Precio (ARS)</th>
        {if $admin}
          <th scope="col">Editar</th>
          <th scope="col">Borrar</th>
        {/if}
      </tr>
    </thead>
    <tbody>
      {foreach from=$books item=$book}
        <tr>
          <th scope="row"><a href="viewBook/{$book->id_book}">{$book->title}</a></th>
          <td>{$book->author}</td>
          <td>{$book->name}</td>
          <td>$ {$book->price} ARS</td>
          {if $admin}
            <td><a href="formUpdateBook/{$book->id_book}" class="btn btn-warning">Editar</a></td>
            <td><a href="deleteBook/{$book->id_book}" class="btn btn-danger">Borrar</a></td>
          {/if}
        </tr>
      {/foreach}
    </tbody>
  </table>
</div>

{if $admin} 
  <div class="p-3 mb-2 bg-warning text-dark" style="--bs-bg-opacity: .98;">
    <h2 > Crear Libro: </h2>

    <form action="createBook" method="POST">
        Titulo    <input type="text" name="title" id="title">
        Autor     <input type="text" name="author" id="author">
        Editorial <select name="id_publisher" id="id_publisher">
                    <option selected>Seleccione una Editorial</option>
                      {foreach from=$publishers item=$publisher}
                    <option value="{$publisher->id_publisher}">{$publisher->name}</option>
                      {/foreach}
                  </select>
        Precio    <input type="number" name="price" id="price">
                  <input type="submit" value="Cargar">
    </form>
  </div>
{/if}

{if $admin}
  <a href="admHome" class="btn btn-secondary"> Volver a Home Administrador </a>
{else}
  <a href="admHome" class="btn btn-secondary"> Volver a Home</a>
{/if}

<a class="btn btn-danger" href="logout">Log Out</a>

{include file='templates/footer.tpl'}