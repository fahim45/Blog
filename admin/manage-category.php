<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location:index.php');
}
require '../vendor/autoload.php';
use App\classes\Categories;
use App\classes\Login;
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'logout') {
        $logoutMessage = Login::adminLogout();
        $_SESSION['message'] = $logoutMessage;
    }
}

$queryResult = Categories::viewAllCategoryInfo();
if (isset($_GET['status'])) {
    $id = $_GET['id'];
    Categories::deleteCategoryInfoByCategoryId($id);
}

$title = 'Manage Category';

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
            <h2 class="text-center">View Category Info</h2>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="bg-success">
                        <th class="text-center">ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    while ($category = mysqli_fetch_assoc($queryResult)){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $category['id']; ?></td>
                        <td><?php echo $category['category_name']; ?></td>
                        <td><?php echo $category['category_description']; ?></td>
                        <td><?php echo $category['publication_status']==1 ? 'Published':'Unpublished'; ?></td>
                        <td>
                            <a href="edit-category.php?id=<?php echo $category['id']; ?>" class="btn btn-xs btn-info"><span
                                        class="glyphicon glyphicon-edit"></span></a>
                            <a href="?status=delete&id=<?php echo $category['id']; ?>"
                               onclick="return confirm('Are You Sure To Delete This?');" class="btn btn-xs btn-danger"><span
                                        class="glyphicon glyphicon-trash"></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/admin/js/bootstrap.min.js"></script>
</body>
</html>