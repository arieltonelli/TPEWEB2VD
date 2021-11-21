{include file='templates/header.tpl'}

<h1 class="bg-success p-3" style="--bs-bg-opacity: .98;">{$titulo}</h1>
<div>
     <form action="updateBook" method="POST">
        <input type="hidden" value={$id} name="id_book" id="id_book">
        Titulo <input placeholder = "Título" type="text" name="title" id="title" required>
        Autor <input placeholder = "Autor" type="text"  name="author" id="author" required>
        Editorial <select name="id_publisher" id="id_publisher">
                    <option selected>Seleccione una Editorial</option>
                    {foreach from=$editoriales item=$editorial}
                    <option value="{$editorial->id_publisher}">{$editorial->name}</option>
                    {/foreach}
                    </select>
        Precio <input placeholder = "Precio" type="number" name="price" id="price" required>
        <input type="submit"value="Modificar">
    </form>

    

</div>

<ul>
<li><a href="books"> Volver a Lista Libros </a></li>
<li><a href="admHome"> Volver a Home Administrador </a></li>
<li><a class="btn btn-danger" href="logout">Log Out</a></li>
</ul>

{include file='templates/footer.tpl'}