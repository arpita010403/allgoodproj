<?php 
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){
        $product_title=$_POST['product_title'];
        $description=$_POST['description'];
        $product_keywords=$_POST['product_keywords'];
        $product_category=$_POST['product_category'];
        $product_price=$_POST['product_price'];
        $product_status='true';

        //accessing image
        $product_image=$_FILES['product_image']['name'];

        //accessing image temporary name
        $temp_image=$_FILES['product_image']['tmp_name'];

        //checking empty condition
        if($product_title=='' or $description=='' or $product_keywords=='' 
        or $product_category=='' or $product_price=='' or $product_image==''){
            echo "<script>alert('Please fill all fields')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image,"./product_images/$product_image");

            //insert query
            $insert_product="insert into products (product_title,product_description,product_keywords,
            category_id,product_image,product_price,date,status)
            values ('$product_title','$description','$product_keywords','$product_category','$product_image',
            '$product_price',NOW(),'$product_status')";
            $result_query=mysqli_query($con,$insert_product);
            if($result_query){
                echo "<script>alert('successfully inserted the products')</script>";
            }
        }

        

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--css link-->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3" >
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!--title  -->
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>
            <br>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>
            <br>
            <!--keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>
            <br>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
               <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php 
                        $select_query="Select * from categories";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
               </select>
            </div>
            <br>
            <!--product image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Product image</label>
                <input type="file" name="product_image" id="product_image" class="form-control" required="required">
            </div>
            <br>
            <!--price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product prices</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>
            <br>
            <!-- button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>


             
        </form>
    </div>
    

    <!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
     crossorigin="anonymous"></script>
</body>
</html>