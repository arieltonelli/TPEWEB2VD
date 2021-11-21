

{include file='templates/header.tpl'}
<div class="bg-success p-3" style="--bs-bg-opacity: .98;">
<h1 >{$titulo}</h1>

<form action="verifyregister" method="POST">
    <input placeholder = "email" type="text" name="email" id="email" required>
    <input placeholder = "password" type="password" name="password" id="password" required>
    <input class="btn btn-danger" type="submit" value="Register">
    </form>
    <img src="./Images/register.jpg" class="img-thumbnail" alt="girl reg"></div>
    <div class="bg-danger p-2" style="--bs-bg-opacity: .98;"> <h2>{$error}</h2> </div>

    <a href="home" class="btn btn-light"> Volver a inicio público <a>

{include file='templates/footer.tpl'}