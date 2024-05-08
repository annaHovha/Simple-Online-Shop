function addToCart(tag){
    let productId = $(tag).parent().attr("id");
    let productPrice = $(tag).siblings('.price').attr("id");
    $.ajax({
        url: "Controllers/AddToCartController.php",
        type: "post",
        dataType: "json",
        data: {'id': productId, 'price': productPrice, 'action': "add"},
    })
}
