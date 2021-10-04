{include file='templates/header.tpl'}

<div class="container">

<h1>Titulo: {$libro->title}</h1>
<h2>Editorial: {$libro->id_publisher}</h2>
<h2>Autor: {$libro->author}</h2>
<h2>Precio: {$libro->price}</h2>
<a href="home" > Volver </a>

</div>

{include file='templates/footer.tpl'}