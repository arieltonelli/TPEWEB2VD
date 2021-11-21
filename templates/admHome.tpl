{include file='templates/header.tpl'}

<h1 class="bg-success p-3" style="--bs-bg-opacity: .98;">{$titulo}</h1>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Base de Datos de la Librería</a>
    <ul class="d-flex">
      <li class="btn btn-outline-success"><a href= "books" class="btn btn-primary">Ver/Modificar Libros</a></li>
     <li class="btn btn-outline-success"><a href= "category" class="btn btn-primary">Ver/Modificar Editoriales</a></li>
     {if $admin}
     <li class="btn btn-outline-success"><a href= "users" class="btn btn-secondary">Ver/Modificar Usuarios (Administrador)</a></li>
      {/if}
    </ul>
  </div>
</nav>

<img src="./Images/adm.jpg" class="img-thumbnail" alt="data base office">
<a class="btn btn-danger" href="logout">Log Out</a>

{include file='templates/footer.tpl'}