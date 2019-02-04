<?php require __DIR__.'/views/header.php'; ?>

<?php if (!isset($_SESSION['user'])) {
    redirect("/");
} else {
    $user = $_SESSION['user'];
}?>
<article class="text-center">



<div class="card mx-auto" style="width: 24rem;">
  <img class="card-img-top" src="/app/users/uploads/profile_images/<?php if ($_SESSION['user']['profile_image'] === 'defaultvalue.jpg') {
    echo 'defaultvalue.jpg';
} else {
    echo $_SESSION['user']['id'].'/'.$_SESSION['user']['profile_image'];
} ?>"  alt="A profile picture">
</div>
<h3>Change profile picture</h3>
<form class="edit-form" action="app/users/profileImage.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label for="name">Change profile picture</label>
      <input class="" type="file" name="profileImage">
  </div><!-- /form-group -->
  <button type="submit" class="btn btn-success">Change Picture</button>
</form>

<h3>Edit Account info</h3>
<form class="edit-form" action="app/users/profile.php" method="post">
  <div class="form-group">
      <label for="name">Biography</label>
      <textarea class="form-control" type="text" name="bio" placeholder="Biography" value=""><?php echo $_SESSION['user']['profile_bio'] ?></textarea>
      <!-- <small class="form-text text-muted">Change Biography</small> -->
  </div><!-- /form-group -->

  <div class="form-group">
      <label for="name">Name</label>
    <input class="form-control" type="text" name="name" placeholder="Name" value=<?php echo $_SESSION['user']['name'] ?>>
      <!-- <small class="form-text text-muted">Change name</small> -->
  </div><!-- /form-group -->

  <div class="form-group">
      <label for="username">Username</label>
      <input class="form-control" type="text" name="username" placeholder="Username" value=<?php echo $_SESSION['user']['username'] ?>>
      <!-- <small class="form-text text-muted">Change Username</small> -->
  </div><!-- /form-group -->

  <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" type="email" name="email" placeholder="Email" value=<?php echo $_SESSION['user']['email'] ?>>
      <!-- <small class="form-text text-muted">Change Email</small> -->
  </div><!-- /form-group -->
  <button type="submit" class="btn btn-success">Apply Changes</button>
</form>

<h3>Change Password</h3>
<form class="edit-form" action="app/users/profilePassword.php" method="post">
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
  <button type="submit" class="btn btn-success">Change Password</button>
</form>
</article>




<?php require __DIR__.'/views/footer.php'; ?>
