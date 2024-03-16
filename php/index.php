<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="product-form px-4 my-2">
        <h1 class="fs-2 fw-bold py-3 text-center">Add Product</h1>
        <form class="row" method="post">
            <div class="mb-3 col-sm-4">
                <input type="text" class="form-control" id="productname" required placeholder="Enter Product Name" name='productName'>
            </div>
            <div class="mb-3 col-sm-4">
                <input type="number" class="form-control" id="quantity" placeholder="Enter Quantity" min="1" required name='quantity'>
            </div>
            <div class="mb-3 col-sm-4">
                <input type="text" class="form-control" id="price" placeholder="Enter Price per item" required name='price'>
            </div>
            <button type="submit" class="btn btn-primary mx-auto mt-2" id="submit" style="width: 10rem" name="submit">Submit</button>
        </form>
    </div>
    <div class="no-products">
        <h2 class="fs-2 fw-bold text-center py-3">No Products</h2>
    </div>
    <div class="products-list px-4 my-2">
        <h2 class="fs-2 fw-bold text-center py-3">Product List</h2>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price Per Item</th>
                <th>Datetime</th>
                <th>Total Value Number</th>
                <th>Edit</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
</body>

</html>