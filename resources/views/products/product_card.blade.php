<div class="products-row">
    <button class="cell-more-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
    </button>
    <div class="product-cell image">
        {{--@dd($product)--}}
        <img src="media_files/product_files/{{$product->id}}/{{$product->product_card_img}}" alt="product">
        <span>{{$product->name}}</span>
    </div>
    <div class="product-cell category"><span class="cell-label">Category:</span>{{$product->type_name}}</div>
    <div class="product-cell status-cell">
        <span class="cell-label">Status:</span>
        <span class="status active">{{$product->is_enabled}}</span>
    </div>
    <div class="product-cell sales"><span class="cell-label">Delivery:</span>{{$product->out_of_stock_days}}</div>
    <div class="product-cell stock"><span class="cell-label">Stock:</span>{{$product->quantity}}</div>
    <div class="product-cell price"><span class="cell-label">Price:</span>{{$product->regular_price}}</div>
</div>