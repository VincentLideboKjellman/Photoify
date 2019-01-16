
<div class="custom-nav-container">


<nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light center">

    <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto text-center">
        <li class="nav-item">
            <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/index.php' ? 'active' : ''; ?>" href="/index.php">Home</a>
        </li>
        <!-- /nav-item -->

        <li class="nav-item">
          <?php if (isset($_SESSION['user'])): ?>
              <a class="nav-link text-success" href="/post.php">Post</a>
          <?php endif; ?>
        </li><!-- /nav-item -->

        <!-- <li class="nav-item">
            <a class="nav-link <//?php echo $_SERVER['SCRIPT_NAME'] === '/about.php' ? 'active' : ''; ?>" href="/about.php">About</a>
        </li> -->
        <!-- /nav-item -->

        <!-- REMOVE WHEN YOU ALREADAY HAVE AN ACCOUNT -->
        <li class="nav-item">
          <?php if (isset($_SESSION['user'])): ?>
              <a class="nav-link" href="/profile.php">Profile</a>
          <?php else: ?>
            <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/create.php' ? 'active' : ''; ?>" href="/create.php">Register</a>
          <?php endif; ?>
        </li><!-- /nav-item -->

        <li class="nav-item">
            <?php if (isset($_SESSION['user'])): ?>
                <a class="nav-link" href="/app/users/logout.php">Logout</a>
            <?php else: ?>
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="login.php">Login</a>
            <?php endif; ?>
        </li><!-- /nav-item -->
    </ul><!-- /navbar-nav -->
  </div>
</nav><!-- /navbar -->

</div>
