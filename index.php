<?php
    require 'vendor/autoload.php';
    use App\classes\Application;

    $queryResult = Application::getAllPublishedBlog();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/front/css/heroic-features.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <?php include_once 'includes/menu.php'?>

    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">A Warm Welcome!</h1>
      </header>

      <!-- Page Features -->
      <div class="row text-center">
        <?php while ($row = mysqli_fetch_assoc($queryResult)){ ?>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="admin/<?php echo $row['blog_image']; ?>" alt="" style="height: 25%;"/>
            <div class="card-body">
              <h4 class="card-title"><?php echo $row['blog_title']; ?></h4>
              <p class="card-text text-justify"><?php echo substr($row['blog_description'], 0, 150).'.......'; ?></p>
            </div>
            <div class="card-footer">
              <a href="view-details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Details...</a>
            </div>
          </div>
        </div>
          <?php } ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include_once 'includes/footer.php'?>

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/admin/js/bootstrap.min.js"></script>

  </body>
</html>
