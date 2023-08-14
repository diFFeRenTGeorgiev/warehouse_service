function addOrRemoveFavorite(productId)
{
    var btn = document.getElementById("favorite_product_btn_"+productId);
    if(btn==undefined) {
        return;
    }
    if(btn.dataset.isFavorite==1) {
        removeFromFavorites(productId);
    }
    else {
        addToFavorites(productId);

    }
}

function removeFromFavorites(productId)
{
    var url = "{{ route('ajax.removeFavorite')}}";

    var data = {
        "product_id": productId,
    };

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(data),
    })
    // .then(function (response) {
    //     return response.json();
    // })
        .then(function (data) {

            if($('#favorite-products-total')) {
                if(($('#favorite-products-total').text()*1)>0) {
                    $('#favorite-products-total').text(($('#favorite-products-total').text()*1)-1);
                    if(($('#favorite-products-total').text()*1)==0) {
                        $('#favorite-products-total').css('visibility','hidden');
                    }
                }
            }
            var btn = document.getElementById("favorite_product_btn_"+productId);
            if(btn!=undefined) {
                btn.dataset.isFavorite=0;
                var color="white"; //default color for not in favorites
                if(btn.dataset.notFavoriteColor!=undefined) {
                    color=btn.dataset.notFavoriteColor;
                }
                btn.style.color = color;
                btn.style.textShadow = "-2px 0 #4d4d4f, 0 2px #4d4d4f, 2px 0 #4d4d4f, 0 -2px #4d4d4f";
                if (window.location.href.indexOf("/favorite-products") > -1) {
                    $(btn).closest("li").hide();
                }
            }
        });
}


function addToFavorites(productId) {
    var url = "{{ route('ajax.ajaxRequest.post') }}";

    var data = {
        "product_id": productId,
    };

// Send the AJAX POST request
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(data),
    })
    // .then(function (response) {
    //     return response.json();
    // })
        .then(function (data) {
            // if(response.status=="success") {

            // alert(response.data.content.product_id);
            if ($('#favorite-products-total')) {
                $('#favorite-products-total').css('visibility', 'visible');
                $('#favorite-products-total').text(($('#favorite-products-total').text() * 1) + 1);
            }
            var btn = document.getElementById("favorite_product_btn_" + productId);
            // var icon = document.getElementById("favorite_"+productId)
            if (btn != undefined) {
                btn.dataset.isFavorite = 1;
                btn.style.color = "#cb1523";
                // icon.style.color = "#cb1523";
                // console.log(icon);
                btn.style.textShadow = "none";
            }
        });

    function markFavoriteProducts()
    {
        favoriteProductsIdsArr.forEach( function(item) {
            var btn = document.getElementById("favorite_product_btn_"+item);
            if(btn!=undefined) {
                btn.dataset.isFavorite=1;
                btn.style.color = "#cb1523";
                btn.style.textShadow = "none";
            }
        });
    }

    $(document).ready(function(e) {
        markFavoriteProducts();
    });
}