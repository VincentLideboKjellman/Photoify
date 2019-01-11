<?php require __DIR__.'/views/header.php'; ?>

<article>

  <h1>Profile Info</h1>
  <div class="temp-profie-div">
    <p>Profile Image:</p><img src="" alt="">
    <p>Username: <?php echo $_SESSION['user']['username']; ?></p>
    <p>Name: <?php echo $_SESSION['user']['name']; ?></p>
    <p>Email: <?php echo $_SESSION['user']['email']; ?></p>
  </div>

    <h1>Edit Account</h1>
    <form action="app/users/profile.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
          <input class="form-control" type="text" name="name" placeholder="Name" value=<?php echo $_SESSION['user']['name'] ?>>
            <small class="form-text text-muted">Change name</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Username" value=<?php echo $_SESSION['user']['username'] ?>>
            <small class="form-text text-muted">Change Username</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" placeholder="Email" value=<?php echo $_SESSION['user']['email'] ?>>
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
