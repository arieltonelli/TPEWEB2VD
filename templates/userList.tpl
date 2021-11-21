{include file='templates/header.tpl'}

<h1 class="bg-success p-3" style="--bs-bg-opacity: .98;">{$nombre}</h1>


<table class="table table-light table-hover">
  <thead>
    <tr>
      <th scope="col">Email usuario</th>
      <th scope="col">Rol</th>
      <th scope="col">Modificar Rol</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>


  {foreach from=$users item=$user}
    <tr>
      <th scope="row">{$user->email}</th>
      <td> {if $user->rol == "1"} Administrador {else} Usuario {/if}</td>
      <td><a href="updateUser/{$user->id_user}" class="btn btn-warning">Cambiar</a></td>
      <td><a href="deleteUser/{$user->id_user}" class="btn btn-danger">Borrar</a></td>
    </tr>
    {/foreach}
  </tbody>
</table>

<div class="p-3 mb-2 bg-warning text-dark" style="--bs-bg-opacity: .97;"><h2 > Crear Usuario: </h2>
<form action="createUser" method="POST">
    Email <input type="text" name="email" id="email">
    Password <input type="password" name="password" id="password">
    <input type="submit" value="Cargar"></div>
</form>
<ul>
<li><a href="admHome" class="btn btn-secondary"> Volver a Home Administrador </a></li>
<li><a class="btn btn-danger" href="logout">Log Out</a></li>
</ul>
{include file='templates/footer.tpl'}