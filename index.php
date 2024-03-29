<!--Connect file -->
<?php
include('includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon-From A to Z, Everything You Need</title>
    <!--Bootstrap CSS Link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!--Font Awesome Link-->
    <script src="https://kit.fontawesome.com/c987eccfed.js" crossorigin="anonymous"></script>
    <!--style tag-->
    <style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box; 
        }
        .card-img-top{
            width:100%;
            height:200px;
            object-fit: contain;
        }
        .nav-link,.active{
            color:white;
        }
    </style>

</head>
<body>
    <!--navbar-->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assests/alogo.png" alt="Amazon" width="60" height="60">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:100/-</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!--Second Child-->
        <nav class="navbar navbar-expand-lg bg-secondary">
            <ul class="navbar-nav me-auto text-white">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>

            </ul>

        </nav>
        <div class="container-fluid">
        <img src="assests/banner.gif" style="width: 100%;">
       </div>
        <!--third child -->
        <div class="bg-light">
            <h3 class="text-center">Amazon</h3>
            <p class="text-center">From A to Z, Everything You Need</p>
        </div>
        <!--fourth child-->
        <div class="row px-3">
            <div class="col-md-10">
                <!--products-->
                <div class="row">
                    <!--fetching products-->
                    <?php
                    $select_query = "Select product_title,product_description,product_image1 FROM products";
                    $result_query = mysqli_query($con,$select_query);
                    //$row = mysqli_fetch_assoc($result_query);
                    //echo $row['product_title'];
                    while($row = mysqli_fetch_assoc($result_query)){
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_image1 = $row['product_image1'];
                        echo  "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <a href='#' class='btn btn-info'>Add to Cart</a>
                                <a href='#' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";

                    }


                    ?>
                    <!--<div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="assests/Jeans.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-info">Add to Cart</a>
                                <a href="#" class="btn btn-secondary">View More</a>
                            </div>
                        </div>
                    </div>-->
                    <!--row end-->
                </div>
                <!--col end-->
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- Brands to be displayed-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-dark">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>
                    <?php
                    $select_brands = "Select * from brands";
                    $result_brands = mysqli_query($con, $select_brands);
                    //$row_data = mysqli_fetch_assoc($result_brands);
                    //echo $row_data['brand_title'];
                    while($row_data = mysqli_fetch_assoc($result_brands)){
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];
                        echo " <li class='nav-item'>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                    </li>";
                    }
                    ?>
                
                </ul>
                <!-- Categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-dark">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>
                    <?php
                    $select_categories = "Select * from categories";
                    $result_categories = mysqli_query($con, $select_categories);
                    //$row_data = mysqli_fetch_assoc($result_brands);
                    //echo $row_data['brand_title'];
                    while($row_data = mysqli_fetch_assoc($result_categories)){
                        $category_title = $row_data['category_title'];
                        $category_id = $row_data['category_id'];
                        echo " <li class='nav-item'>
                        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                    </li>";
                    }
                    ?>
                   
                </ul>

            </div>
        </div>

        <div class="bg-dark p-3 text-center text-white">
            <p>Copyright ©2024 All Rights Reserved - Designed by Thushar</p> 
        </div>
    </div>
    

    <!--Bootstrap Js Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>