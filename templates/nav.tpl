<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    {if $admin}
      <a class="navbar-brand">Base de Datos de la Librería (Administrador)</a>
    {else}
      <a class="navbar-brand">Catálogos de nuestra librería</a>
    {/if}
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
          <li class="btn btn-outline-success"><a href= "users" class="btn btn-secondary">Ver/Modificar Usuarios</a></li>
        {/if}
      </ul>
  </div>
</nav>

