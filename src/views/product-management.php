<div class="container mt-5">
    <button class="btn btn-info" id="create-product">create Product</button>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($listProduct as $key => $product)
            {
                $key++;

                echo "
                    <tr>
                        <th scope='row' class='align-middle'>$key</th>
                        <td class='align-middle'>$product->name</td>
                        <td class='align-middle'>$product->price</td>
                        <td class='align-middle'>$product->urlImg</td>
                        <td class='align-middle'>
                            <button class='btn btn-danger'>Delete</button>
                            <button class='btn btn-primary ml-2' onclick='editProduct($product->id)'>Edit</button>
                        </td>
                    </tr>
                ";
            }
        ?>
        </tbody>
    </table>
</div>

<div id="product-editor-dialog" class="modal fade"></div>

<script>
    $(document).ready(function () {
        $('#create-product').click(function () {
            $.ajax({
                url: '/open-product-editor-dialog',
                method: 'post',
                success: function(data) {
                    $('#product-editor-dialog').html(data);
                    $('#product-editor-dialog').modal('show');
                }
            })
        })
    })

    function editProduct(id) {
        $.ajax({
            url: '/open-product-editor-dialog',
            method: 'post',
            data: { productId: id },
            success: function(data) {
                $('#product-editor-dialog').html(data);
                $('#product-editor-dialog').modal('show');
            }
        })
    }
</script>