<?php require __DIR__.'/views/header.php'; ?>

<?php if(!isset($_SESSION['user'])){ redirect("/"); } else { $user = $_SESSION['user'];}?>
<article>

  <h1>Profile Info</h1>
  <div class="temp-profie-div">
    <p>Profile Image:</p><img src=<?php $_SESSION['user']['profile_image'] ?> alt="">
    <p>Username: <?php echo $_SESSION['user']['username']; ?></p>
    <p>Name: <?php echo $_SESSION['user']['name']; ?></p>
    <p>Email: <?php echo $_SESSION['user']['email']; ?></p>
    <p>Bio: <?php echo $_SESSION['user']['profile_bio']; ?></p>
  </div>


      <h1>Change profile pucture</h1>
      <form action="app/users/profilePicture.php" method="post">
        <div class="form-group">
            <label for="name">Biography</label>
          <input class="form-control" type="text" name="" placeholder="" >
            <small class="form-text text-muted">Change name</small>
        </div><!-- /form-group -->
      </form>

      <h1>Edit Account info</h1>
      <form action="app/users/profile.php" method="post">
        <div class="form-group">
            <label for="name">Biography</label>
          <textarea class="form-control" type="text" name="bio" placeholder="Biography" value=""><?php echo $_SESSION['user']['profile_bio'] ?></textarea>
            <small class="form-text text-muted">Change Biography</small>
        </div><!-- /form-group -->

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
        <button type="submit" class="btn btn-primary">Apply Changes</button>
    </form>

    <h1>Change Password</h1>
    <form action="app/users/profilePassword.php" method="post">
      <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
            <small class="form-text text-muted">Change password</small>
        </div><!-- /form-group -->
        <div class="form-group">
              <label for="password">Confirm Password</label>
              <input class="form-control" type="password" name="confirmPassword" placeholder="Confirm Password">
              <small class="form-text text-muted">Confirm password</small>
          </div><!-- /form-group -->
        <button type="submit" class="btn btn-primary">Apply Changes</button>
    </form>
</article>




<?php require __DIR__.'/views/footer.php'; ?>
