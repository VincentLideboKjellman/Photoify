<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Create Account</h1>

    <form action="app/users/create.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" placeholder="Name" required>
            <small class="form-text text-muted">Enter you Name.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Username" required>
            <small class="form-text text-muted">Enter your email address.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" placeholder="Email" required>
            <small class="form-text text-muted">Please provide the your email address.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" required placeholder="Password">
            <small class="form-text text-muted">Please provide the your password (passphrase).</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Create Account</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
