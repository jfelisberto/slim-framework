<?php
$this->layout('layout', ['title' => $title]);
?>


<h1>Perfil de usuario</h1>

<div class="form">
    <form>
        <div class="row">
            <div class="form-control">
                <label for="name" class="form-label">Nome</label>
                <input type="text" id="name" name="name" class="form-control" />

            </div>
        </div>
        <div class="row">
            <div class="form-control">
                <label for="login" class="form-label">Login</label>
                <input type="text" id="login" name="login" class="form-control" />

            </div>
        </div>

        <div class="row">
            <div class="form-control">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" />

            </div>
        </div>
    </form>
</div>
