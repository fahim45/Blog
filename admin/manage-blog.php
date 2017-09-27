<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:index.php');
}

require '../vendor/autoload.php';
use App\classes\Login;
use App\classes\Blog;

/*if (isset($_GET['status'])) {

}*/

$queryResult = Blog::viewAllBlogInfo();
$message = '';
if (isset($_GET['status'])){
    $id = $_GET['id'];
    if ($_GET['status'] == 'logout') {
        $logoutMessage = Login::adminLogout();
        $_SESSION['message'] = $logoutMessage;
    }elseif($_GET['status']=='unpublished'){
        $message = Blog::unpublishedBlogById($id);
    }elseif($_GET['status']=='published'){
        $message = Blog::publishedBlogById($id);
    }elseif ($_GET['status']=='delete') {
        $message = Blog::deleteBlogInfoByBlogId($id);
    }
}



$title = 'Manage Blog';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="../assets/admin/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">View Blog Info</h2>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-success text-center"><?php echo $message; ?></h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="bg-success">
                        <th class="text-center">SL No</th>
                        <th>Blog Title</th>
                        <th>Author Name</th>
                        <th>Category Name</th>
                        <th>Publication status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i=1;
                    while ($blog = mysqli_fetch_assoc($queryResult)){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td><?php echo $blog['blog_title']; ?></td>
                            <td><?php echo $blog['author_name']; ?></td>
                            <td><?php echo $blog['category_name']; ?></td>
                            <td><?php echo $blog['publication_status']==1 ? 'Published':'Unpublished'; ?></td>
                            <td>
                                <a href="view-blog-details.php?id=<?php echo $blog['id']; ?>" class="btn btn-xs btn-primary"><span
                                        class="glyphicon glyphicon-zoom-in" title="View Blog Details"></span></a>
                                <?php if ($blog['publication_status']==1){ ?>
                                <a href="?status=unpublished&id=<?php echo $blog['id']; ?>" class="btn btn-xs btn-success"><span
                                        class="glyphicon glyphicon-arrow-up" title="Published"></span></a>
                                <?php } else{?>
                                    <a href="?status=published&id=<?php echo $blog['id']; ?>" class="btn btn-xs btn-warning"><span
                                                class="glyphicon glyphicon-arrow-down" title="Unpublished"></span></a>
                                <?php }?>
                                <a href="edit-blog.php?id=<?php echo $blog['id']; ?>" class="btn btn-xs btn-info"><span
                                        class="glyphicon glyphicon-edit" title="Edit Blog"></span></a>
                                <a href="?status=delete&id=<?php echo $blog['id']; ?>"
                                   class="btn btn-xs btn-danger" onclick="return confirm('Are You Sure To Delete This?');"><span
                                        class="glyphicon glyphicon-trash" title="Delete Blog"></a>
                            </td>
                        </tr>
                    <?php $i++; } ?>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/js/bootstrap.min.js"></script>
</body>
</html>