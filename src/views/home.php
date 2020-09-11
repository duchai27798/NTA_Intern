<div class="container">
    <h2 class="text-uppercase text text-primary text-center mt-5">product</h2>
    <div class="mt-4 row w-100 mb-5">
        <?php foreach ($listProduct as $product) {
            echo "
                <div class='col-12 col-md-6 col-lg-4 mt-5 d-flex flex-column col-12 col-md-6 col-lg-4 item-list align-items-center'>
                    <img src='assets/img/$product->urlImg'>
                    <h3 class='mt-4'>$product->name</h3>
                    <span>$$product->price</span>
                    <button class='btn btn-success mt-3' id='$product->id' onclick='addToCart($product->id)'>Add to Cart</button>
                </div>
            ";
        } ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        let cartDetail = JSON.parse(localStorage.getItem('cartDetail')) || {};

        for (let id in cartDetail) {
            if (cartDetail[id] >= 20) {
                $(`#${id}`).addClass('btn-danger disabled-half');
                $(`#${id}`).html('Out of stock');
            }
        }

        showCartQuantity();
    })

    function showCartQuantity() {
        const cartDetail = JSON.parse(localStorage.getItem('cartDetail'));
        let listId = [];

        if (cartDetail) {
            listId = Object.keys(cartDetail);
        }

        document.getElementById('number-card').innerText = listId ? listId.length : 0;
    }

    function addToCart(id) {
        let cartDetail = JSON.parse(localStorage.getItem('cartDetail')) || {};

        if (cartDetail[id]) {
            if (cartDetail[id] >= 20) {
                $(`#${id}`).addClass('btn-danger disabled-half');
                $(`#${id}`).html('Out of stock');
            } else {
                cartDetail[id]++;
            }
        } else {
            cartDetail[id] = 1;
        }

        localStorage.setItem('cartDetail', JSON.stringify(cartDetail));
        showCartQuantity();
    }
</script>