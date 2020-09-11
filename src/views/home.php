<div class="container">
    <h2 class="text-uppercase text text-primary text-center mt-5">product</h2>
    <div class="mt-4 row w-100">
        <?php foreach ($listProduct as $product) {
            echo "
                <div class='col-12 col-md-6 col-lg-4 mt-5 d-flex flex-column col-12 col-md-6 col-lg-4 item-list align-items-center'>
                    <img src='assets/img/$product->urlImg'>
                    <h3 class='mt-4'>$product->name</h3>
                    <span>$$product->price</span>
                    <button class='btn btn-success mt-3'>Add to Cart</button>
                </div>
            ";
        } ?>
    </div>
</div>