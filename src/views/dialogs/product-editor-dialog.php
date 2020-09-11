<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title"><?php echo isset($title) ? $title : null ?> Product</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger d-none" id="error-message"></div>
            <form id="product-form">
                <?php
                if (isset($product)) {
                    echo "<input type='number' name='id' value='$product->id' class='d-none'/>";
                }
                ?>
                <div class="form-group mt-4">
                    <input type="text" class="form-control" name="name" value="<?php echo isset($product) ? $product->name : null ?>" placeholder="Product Name">
                </div>
                <div class="form-group mt-4">
                    <input type="number" class="form-control" name="price" value="<?php echo isset($product) ? $product->price : null ?>" placeholder="Price">
                </div>
                <div class="form-group mt-4">
                    <input type="text" class="form-control" name="urlImg" value="<?php echo isset($product) ? $product->urlImg : null ?>" placeholder="URL Image">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-info" form="product-form" type="submit"><?php echo isset($title) ? $title : null ?></button>
        </div>
    </div>
</div>

<script>
    /* listen when form is submitted */
    $('#product-form').submit(function(e) {
        e.preventDefault();

        /* get form data */
        let x = $("#product-form").serializeArray();
        let formData = {};

        $.each(x, function(i, field) {
            formData[field.name] = field.value;
        });

        /* validate form when click submit  */
        $.ajax({
            url: '/validate-form',
            method: 'post',
            data: formData,
            dataType: 'json',
            success: function(data) {
                if (data.code === 404) {
                    /* show error validation */
                    $('#error-message').addClass('d-block');
                    $('#error-message').html(`<ul class="mb-0">${data.message}</ul>`);
                } else {
                    $('#error-message').removeClass('d-block');

                    /* if is existed then update product else create new product */
                    if (formData['id']) {
                        updateProduct(data);
                    } else {
                        createNewProduct(data);
                    }
                }
            }
        })
    })

    /**
     * Call ajax create new product
     * @param data
     */
    function createNewProduct(data) {
        $.ajax({
            url: '/create-new-product',
            method: 'post',
            data: data,
            success: function(data) {
                if (data)
                {
                    $('#product-editor-dialog').modal('hide');
                    location.reload();
                }
            }
        })
    }

    /**
     * Call ajax update product
     * @param data
     */
    function updateProduct(data) {
        $.ajax({
            url: '/update-product',
            method: 'post',
            data: data,
            dataType: 'json',
            success: function(data) {
                console.log(data)
                if (data)
                {
                    $('#product-editor-dialog-dialog').modal('hide');
                    location.reload();
                }
            }
        })
    }

    /**
     * Call ajax delete product
     * @param data
     */
    function deleteProduct(data) {
        $.ajax({
            url: '/delete-product',
            method: 'post',
            data: data,
            dataType: 'json',
            success: function(data) {
                console.log(data)
                if (data)
                {
                    $('#product-editor-dialog-dialog').modal('hide');
                    location.reload();
                }
            }
        })
    }
</script>
