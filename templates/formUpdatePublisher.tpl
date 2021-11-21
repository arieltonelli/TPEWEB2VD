{include file='templates/header.tpl'}

<h1 class="bg-success p-3" style="--bs-bg-opacity: .98;">{$titulo}</h1>
<div>
     <form action="updatePublisher" method="POST">
            <input type="hidden" value={$id} name="id_publisher" id="id_publisher">
        Nombre <input placeholder = "Nombre" type="text" name="name" id="name" required>
        Idioma <input placeholder = "Idioma" type="text"  name="language" id="language" required>
        <input type="submit" class="btn btn-primary" value="Modificar">
    </form>

    

</div>

<li><a href="category"> Volver a Lista Editoriales </a></li>
<li><a href="admHome"> Volver a Home Administrador </a></li>
<li><a class="btn btn-danger" href="logout">Log Out</a></li>

{include file='templates/footer.tpl'}