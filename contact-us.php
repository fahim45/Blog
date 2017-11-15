<?php
    require 'vendor/autoload.php';

    use App\classes\Contact;

$errors='';
    if (isset($_POST['btn'])){
        $errors = Contact::formValidation($_POST);
    }

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
        <h1>Contact with us</h1>
        <p>
            Someone finds it difficult to understand your creative idea? There is a better visualisation. Share your views with us...
        </p>
    </header>

    <!-- Page Features -->
        <div class="jumbotron my-4">
            <div class="ml-5">
                <div>
                    <?php
                    if (isset($_GET['sent'])){
                        echo '<span style="color: #008000">Thank you for contacting me!</span>';
                    }else{
                        if (empty($errors)===false){
                            echo '<ul>';
                            foreach ($errors as $error){
                                echo '<li style="color: #ff0000">'.$error.'</li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                </div>
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2">Name <span style="color: #ff0000">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="name" min="3" max="30" class="form-control"
                                   placeholder="Your Name, Please"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2">Email <span style="color: #ff0000">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" placeholder="Your Email, Please"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-sm-2">Message <span style="color: #ff0000">*</span></label>
                        <div class="col-sm-10">
                            <textarea name="message" id="" cols="30" rows="10" class="form-control"
                                      style="resize: vertical;" placeholder="Your Message, Please"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="ml-auto col-sm-10">
                            <button type="submit" name="btn" class="btn btn-outline-success btn-block">Submit</button>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>
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
