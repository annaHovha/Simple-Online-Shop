$(document).ready(function() {
    function deleteFromCart(productId) {
        $.ajax({
            type: 'POST',
            url: 'Controllers/addToCartController.php',
            data: { action: 'delete', id: productId },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error('Error deleting product: ' + error);
            }
        });
    }

    $('.delete-btn').on('click', function() {
        var productId = $(this).data('product-id');
        deleteFromCart(productId);
    });
});
