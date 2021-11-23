{include file='templates/header.tpl'}
{include file='templates/nav.tpl'}

<h1 class="bg-success p-3" style="--bs-bg-opacity: .98;">{$titulo}</h1>
<div class="p-3 mb-2 bg-warning text-dark" style="--bs-bg-opacity: .97;">
     <form action="updatePublisher" method="POST">
            <input type="hidden" value={$id} name="id_publisher" id="id_publisher">
        Nombre <input placeholder = "Nombre" type="text" name="name" id="name" required>
        Idioma <input placeholder = "Idioma" type="text"  name="language" id="language" required>
        <input type="submit" class="btn btn-primary" value="Modificar">
    </form>

    

</div>

<a href="category" class="btn btn-info"> Volver a Lista Editoriales </a>
<a href="admHome" class="btn btn-secondary"> Volver a Home Administrador </a>
<a class="btn btn-danger" href="logout">Log Out</a>

<script src="js/comments.js"></script>

{include file='templates/footer.tpl'}