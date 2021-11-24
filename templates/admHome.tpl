{include file='templates/header.tpl'}
<div class="bg-light p-3" style="--bs-bg-opacity: .98;">
{if $admin}
<h1 class="bg-success p-3" style="--bs-bg-opacity: .98;">{$tituloAdm}</h1>
{else}
<h1 class="bg-success p-3" style="--bs-bg-opacity: .98;">{$tituloUser}</h1>
{/if}

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Base de Datos de la Librería</a>
    <ul class="d-flex">
      {if $admin}
        <li class="btn btn-outline-success"><a href= "books" class="btn btn-primary">Ver/Modificar Libros</a></li>
      {else}
        <li class="btn btn-outline-success"><a href= "books" class="btn btn-primary">Ver nuestros Libros</a></li>
      {/if}
      {if $admin}
        <li class="btn btn-outline-success"><a href= "category" class="btn btn-primary">Ver/Modificar Editoriales</a></li>
      {else}
        <li class="btn btn-outline-success"><a href= "category" class="btn btn-primary">Ver nuestras Editoriales</a></li>
      {/if}
      {if $admin}
        <li class="btn btn-outline-success"><a href= "users" class="btn btn-secondary">Ver/Modificar Usuarios (Administrador)</a></li>
      {/if}
    </ul>
  </div>
</nav></div>

{if $admin}
<img src="./Images/adm.jpg" class="img-thumbnail" alt="data base office">
{else}
<img src="./Images/booklist.jpg" class="img-thumbnail" alt="libros">
{/if}
<a class="btn btn-danger" href="logout">Log Out</a>

{include file='templates/footer.tpl'}