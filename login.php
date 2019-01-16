<?php require __DIR__.'/views/header.php'; ?>

<article class="text-center">
    <h1>Login</h1>

    <form action="app/users/login.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" required>
            <!-- <small class="form-text text-muted">Please provide the your email address.</small> -->
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required>
            <!-- <small class="form-text text-muted">Please provide the your password (passphrase).</small> -->
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-success">Login</button>
    </form>
</article>


<?php require __DIR__.'/views/footer.php'; ?>
