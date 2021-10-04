{include file='templates/header.tpl'}

<h1>{$titulo}</h1>
<ul>
{foreach from=$books item=$book}
    <li class="finalizada">
        <div>
        <a href="viewBook/{$book->id_book}">{$book->title}</a>
        <a href="viewBook/{$book->id_book}">{$book->author}</a>
        <a href="viewBook/{$book->id_book}">{$book->id_publisher}</a> 
         <a href="viewBook/{$book->id_book}">{$book->price}</a> 
        <a href="deleteBook/{$book->id_book}">Borrar</a>
        </div>
    </li>
{/foreach}

</ul>
<h2> Crear Libro </h2>
<form action="createBook" method="POST">
    Titulo <input type="text" name="title" id="title">
    Autor <input type="text" name="author" id="author">
    Editorial <input type="number" name="publisher" id="publisher">
    Precio <input type="number" name="price" id="price">
    <input type="submit" value="Guardar">
    </form>

{include file='templates/footer.tpl'}