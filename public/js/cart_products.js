function changeCartProductQty(productId, qty)
{
    var url = '/cart/change-product-quantity';

    var data = {
        "productId": productId,
        "quantity": qty,
        "_token": "{{ csrf_token() }}" // Include the CSRF token in the data
    };

    $.ajax({
        type: "POST",
        data: data,
        url:url,
        success: function (response) {

            if(response.status=="error") {
                alert(response.error_message);
            } else {
                window.location.href = "/cart";
            }
        }
    });
}

function removeCartProduct(productId)
{
    changeCartProductQty(productId, 0);
}

function emptyCart()
{
    $.get('/cart/empty', function() {
        window.location.href = "/cart";
    });
}