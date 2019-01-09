<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Edit Account</h1>

    <form action="app/users/profile.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" placeholder="Name">
            <small class="form-text text-muted">Change name</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Username">
            <small class="form-text text-muted">Change Username</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" placeholder="Email">
            <small class="form-text text-muted">Change Email</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
            <small class="form-text text-muted">Change password</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Apply Changes</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
