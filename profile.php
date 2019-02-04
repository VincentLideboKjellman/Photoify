<?php require __DIR__.'/views/header.php'; ?>

<?php if (!isset($_SESSION['user'])) {
    redirect("/");
} else {
    $user = $_SESSION['user'];
}?>
<article class="text-center">

  <h1>Profile Info</h1>

<!-- Profile info card -->
    <div class="card mx-auto" style="width: 24rem;">
      <img class="card-img-top" src="/app/users/uploads/profile_images/<?php if ($_SESSION['user']['profile_image'] === 'defaultvalue.jpg') {
    echo 'defaultvalue.jpg';
} else {
    echo $_SESSION['user']['id'].'/'.$_SESSION['user']['profile_image'];
} ?>"  alt="A profile picture">
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><?php echo $_SESSION['user']['username']; ?></li>
        <li class="list-group-item"><?php echo $_SESSION['user']['name']; ?></li>
        <li class="list-group-item"><?php echo $_SESSION['user']['email']; ?></li>
      </ul>
      <div class="card-body">
        <h5 class="card-title">Biography</h5>
        <p class="card-text"><?php echo $_SESSION['user']['profile_bio']; ?></p>
      </div>
      <div class="card-body">
        <a href="/editProfile.php" class="card-link">Edit Profile</a>
      </div>
</div>
<!--// END Profile info card -->
</article>


<?php require __DIR__.'/views/footer.php'; ?>
