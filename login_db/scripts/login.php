<?php if (isset($_SESSION['erro'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['erro'];
        unset($_SESSION['erro']); ?>
    </div>
<?php endif; ?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card bg-light p-5 shadow-mt-5">
                <h3>Login</h3>
                <hr>
                <?php if (isset($_SESSION['erro'])): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($_SESSION['erro']) ?>
                    </div>
                <?php
                    unset($_SESSION['erro']);
                    unset($_SESSION['erro_tipo']);
                endif; ?>

                <form action="?rota=login_submit" method="post">
                    <div class="mb-3">
                        <label for="text_usuario" class="form-label">Usuário</label>
                        <input type="text" name="text_usuario" class="form-control" required autocomplete="current-username">
                    </div>

                    <div class="mb-3">
                        <label for="text_senha" class="form-label">Senha</label>
                        <input type="password" name="text_senha" class="form-control" required autocomplete="current-password">
                    </div>
                    <div>
                        <input type="submit" value="Entrar" class="btn btn-secondary w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>