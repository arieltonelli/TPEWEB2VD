{include file='templates/header.tpl'}
<div class="bg-success p-3" style="--bs-bg-opacity: .98;">
<h1 >{$titulo}</h1>

<form action="verify" method="POST">
    <input placeholder = "email" type="text" name="email" id="email" required>
    <input placeholder = "password" type="password" name="password" id="password" required>
    <input class="btn btn-primary" type="submit" value="Loguearse">
    </form></div>
    <a class="btn btn-warning" href="register">Registrate aquí si aún no eres usuario!<a>
    <img src="./Images/login.jpg" class="img-thumbnail" alt="girl log">
    <div class="bg-danger p-2" style="--bs-bg-opacity: .98;"> <h2>{$error}</h2> </div>
    
    <a href="home" class="btn btn-primary"> Volver a Home <a>
    

{include file='templates/footer.tpl'}