<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="images/logo.png" rel="shortcut icon"/>  
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="index.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
  

    <script crossorigin="anonymous" src="https://kit.fontawesome.com/70a642cd7c.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Bootstrap Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <style>
        input{
            width: 40%;
            height:5%;
            border: 1px;
            border-radius:05px;
            padding: 8px 15px 8px 15px;
            box shadow: 1px 1px 2px 1px grey;      
         }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="showProducts.php">Browse products</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="viewCart.php">View Cart</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="checkout.php">Checkout</a>
      </li>
      <li>
        <a class ="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </nav>
  <!----------------------------------------------------------------->
    <div classs = "searchForm">
        <h1>Search Products</h1>
        <form action="" method="post">
            <input type="text" name ="product" placeholder=" Please enter desired product"><br>
            <input type="submit" name ="search" value="Search Data">
        </form>
    </div>
    <?php
    /* Database credentials. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'store');
        
        /* Attempt to connect to MySQL database */
        $link = mysqli_connect('localhost', 'root', '', 'store');
        
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['search']))
{
    $product = $_POST['product'];

    $query="SELECT*FROM products WHERE name='$product'";
    $query_run = mysqli_query($link,$query);

    while($row = mysqli_fetch_array($query_run))
    {
       ?>
       <form action="" method="post">
           <input type="hidden" name ='product' value="<?php echo $row['product']?>">
           <input type="varchar" name ='name'value="<?php echo $row['name']?>">
           <img src="<?php echo $row["image"]?>" alt="">
           <input type="text" name ='description'value="<?php echo $row['description']?>">
           <input type="float" name ='price'value="<?php echo $row['price']?>">
       </form>
       <?php
    }
}
?>
</body>
</html>