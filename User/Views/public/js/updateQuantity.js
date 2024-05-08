$(document).ready(function() {
    $('.quantity').on('change', function() {
        var productId = $(this).data('product-id');
        var quantity = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'Controllers/addToCartController.php',
            data: { action: 'update', id: productId, quantity: quantity },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
