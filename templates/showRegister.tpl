

{include file='templates/header.tpl'}
<div class="bg-danger p-3" style="--bs-bg-opacity: .98;">
<h1 >{$titulo}</h1>

<form action="verifyregister" method="POST">
    <input placeholder = "email" type="text" name="email" id="email" required>
    <input placeholder = "password" type="password" name="password" id="password" required>
    <input class="btn btn-light" type="submit" value="Registrarse">
    </form></div>
    <a class="btn btn-warning" href="login">Si ya tienes usuario: logueate aquí<a>
    <img src="./Images/register.jpg" class="img-thumbnail" alt="girl reg">
    <div class="bg-danger p-2" style="--bs-bg-opacity: .98;"> <h2>{$error}</h2> </div>
    <a href="home" class="btn btn-primary"> Volver a Home <a>

{include file='templates/footer.tpl'}