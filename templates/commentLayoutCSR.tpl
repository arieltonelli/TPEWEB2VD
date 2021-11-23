{include file='templates/header.tpl'}


<div class="p-3 mb-2 bg-warning text-dark" style="--bs-bg-opacity: .97;"><h2 > Crear Comentario: </h2>
<form action="createUser" method="POST">
    Email <input type="text" name="email" id="email">
    Password <input type="password" name="password" id="password">
    <input type="submit" value="Cargar">
</form></div>



<div class="p-3 mb-2 bg-warning text-dark" style="--bs-bg-opacity: .97;"><h2 > Titulo </h2>

<ul id="lista-comentarios" class="list-group">

</ul>

</div>



<a href="admHome" class="btn btn-secondary"> Volver a Home Administrador </a>
<a class="btn btn-danger" href="logout">Log Out</a>


<a href="admHome" class="btn btn-primary"> Volver a Home <a>

<script src="js/comments.js"></script>

{include file='templates/footer.tpl'}
