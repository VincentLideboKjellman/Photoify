<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';
if (isset($_FILES['profileImage'])) {
  $image = $_FILES['profileImage'];
  $date = date('Y-m-d, H:i:s');
  $id = $_SESSION['user']['id'];
  $imageName = $id.'_'.$date.$image['name'];

  $deleteOldProfileImageStatement = $pdo->prepare('SELECT * FROM users WHERE profile_image = :profileImage');

  $UpdateProfileImageStatement = $pdo->prepare('UPDATE users SET profile_image = :profileImage WHERE id = :id');
  $UpdateProfileImageStatement->bindParam(':id', $id, PDO::PARAM_INT);
  $UpdateProfileImageStatement->bindParam(':profileImage', $imageName, PDO::PARAM_STR);
  $UpdateProfileImageStatement->execute();

  if (!is_dir(__DIR__."/uploads/profile_images")) {
        mkdir(__DIR__."/uploads/profile_images");
      };

      $imagePath = __DIR__.'/uploads/profile_images/';

      if (file_exists($imagePath.$image['name'])) {
        die;
      }

      $tmpPath = $image['tmp_name'];
      $newPath = $imagePath.$imageName;
      move_uploaded_file($tmpPath, $newPath);

      $_SESSION['user']['profile_image'] = $imageName;

}
redirect('/profile.php');


 ?>
