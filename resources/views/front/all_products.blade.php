@extends('front.components.layout')
@section('front_body')
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
<div class="app-container">
    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Products</h1>
            <button class="mode-switch" title="Switch Theme" type="button">
                <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                    <defs></defs>
                    <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                </svg>
            </button>
            @if(Helpers::is_admin())
                <a href="{{route('addProduct')}}" class="btn btn-xs btn-danger app-content-headerButton" id="adminBtn" role="button" style="border-radius:5px;padding:5px;">Add Product</a>
            @endif
        </div>
        <div class="app-content-actions">
            <input class="search-bar" placeholder="Search..." type="text">
            <div class="app-content-actions-wrapper">
                <div class="filter-button-wrapper">
                    <button class="action-button filter jsFilter"><span>Filter</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
                    <div class="filter-menu">
                        <label>Category</label>
                        <select>
                            <option>All Categories</option>
                            <option>Furniture</option>                     <option>Decoration</option>
                            <option>Kitchen</option>
                            <option>Bathroom</option>
                        </select>
                        <label>Status</label>
                        <select>
                            <option>All Status</option>
                            <option>Active</option>
                            <option>Disabled</option>
                        </select>
                        <div class="filter-menu-buttons">
                            <button class="filter-button reset">
                                Reset
                            </button>
                            <button class="filter-button apply">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>
                <button class="action-button list active" title="List View" id="buttonList">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                </button>
                <button class="action-button grid"  id="grid" title="Grid View" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </button>
            </div>
        </div>
        <div class="products-area-wrapper gridView">
            <div class="products-header">
                <div class="product-cell image">
                    Items
                    <button class="sort-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                    </button>
                </div>
                <div class="product-cell category">Category<button class="sort-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                    </button></div>
                <div class="product-cell status-cell">Status<button class="sort-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                    </button></div>
                <div class="product-cell sales">Sales<button class="sort-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                    </button></div>
                <div class="product-cell stock">Stock<button class="sort-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                    </button></div>
                <div class="product-cell price">Price<button class="sort-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                    </button></div>
            </div>
            @foreach($products as $product)
           @include('products.product_card',[$product])
            @endforeach
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8a2l0Y2hlbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Lou</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Kitchen</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status disabled">Disabled</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>6</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>46</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$710</div>
            </div>
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDR8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Yellow</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Decoration</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status active">Active</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>61</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>56</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$360</div>
            </div>
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YmVkcm9vbXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Dreamy</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Bedroom</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status disabled">Disabled</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>41</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>66</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$260</div>
            </div>
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8aW50ZXJpb3J8ZW58MHwwfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Boheme</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status active">Active</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>32</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>40</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$350</div>
            </div>
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1507652313519-d4e9174996dd?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Sky</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Bathroom</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status disabled">Disabled</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>22</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>44</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$160</div>
            </div>
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzB8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Midnight</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status active">Active</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>23</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>45</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$340</div>
            </div>
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8aW50ZXJpb3J8ZW58MHwwfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Boheme</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status active">Active</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>32</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>40</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$350</div>
            </div>
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1511389026070-a14ae610a1be?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzR8fGludGVyaW9yfGVufDB8MHwwfHw%3D&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Palm</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Decoration</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status active">Active</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>24</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>46</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$60</div>
            </div>
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1600494603989-9650cf6ddd3d?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NTV8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Forest</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Living Room</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status active">Active</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>41</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>16</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$270</div>
            </div>
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1560448204-603b3fc33ddc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Njd8fGludGVyaW9yfGVufDB8MHwwfHw%3D&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Sand</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Living Room</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status disabled">Disabled</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>52</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>16</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$230</div>
            </div>
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1533779283484-8ad4940aa3a8?ixid=MnwxMjA3fDB8MHxzZWFyY2h8ODd8fGludGVyaW9yfGVufDB8MHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Autumn</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Decoration</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status active">Active</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>21</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>46</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$252</div>
            </div>
            <div class="products-row">
                <button class="cell-more-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>
                <div class="product-cell image">
                    <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8aW50ZXJpb3J8ZW58MHwwfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="product">
                    <span>Boheme</span>
                </div>
                <div class="product-cell category"><span class="cell-label">Category:</span>Furniture</div>
                <div class="product-cell status-cell">
                    <span class="cell-label">Status:</span>
                    <span class="status active">Active</span>
                </div>
                <div class="product-cell sales"><span class="cell-label">Sales:</span>32</div>
                <div class="product-cell stock"><span class="cell-label">Stock:</span>40</div>
                <div class="product-cell price"><span class="cell-label">Price:</span>$350</div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
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
            .then(function (response) {
                return response.json();
            })
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


    function addToFavorites(productId)
    {
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
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                // if(response.status=="success") {

                            // alert(response.data.content.product_id);
                            if($('#favorite-products-total')) {
                                $('#favorite-products-total').css('visibility','visible');
                                $('#favorite-products-total').text(($('#favorite-products-total').text()*1)+1);
                            }
                            var btn = document.getElementById("favorite_product_btn_"+productId);
                            // var icon = document.getElementById("favorite_"+productId)
                            if(btn!=undefined) {
                                btn.dataset.isFavorite=1;
                                btn.style.color = "#cb1523";
                                // icon.style.color = "#cb1523";
                                // console.log(icon);
                                btn.style.textShadow = "none";
                            }
            })
            .catch(function (error) {
                console.log(error); // Handle any errors
            });

        // $.post(url, data, function(response) {
        //     if(response.status=="success") {
        //
        //         // alert(response.data.content.product_id);
        //         if($('#favorite-products-total')) {
        //             $('#favorite-products-total').css('visibility','visible');
        //             $('#favorite-products-total').text(($('#favorite-products-total').text()*1)+1);
        //         }
        //         var btn = document.getElementById("favorite_product_btn_"+productId);
        //         if(btn!=undefined) {
        //             btn.dataset.isFavorite=1;
        //             btn.style.color = "#cb1523";
        //             btn.style.textShadow = "none";
        //         }
        //     }
        // });
    }

    function showModal() {
        $('#myModal').modal('show');
        $("#myModal").modal({backdrop: true});
    }
    document.querySelector(".jsFilter").addEventListener("click", function () {
        document.querySelector(".filter-menu").classList.toggle("active");
    });

    document.querySelector(".grid").addEventListener("click", function () {
        document.querySelector(".list").classList.remove("active");
        document.querySelector(".grid").classList.add("active");
        document.querySelector(".products-area-wrapper").classList.add("gridView");
        document
            .querySelector(".products-area-wrapper")
            .classList.remove("tableView");
    });

    document.querySelector(".list").addEventListener("click", function () {
        document.querySelector(".list").classList.add("active");
        document.querySelector(".grid").classList.remove("active");
        document.querySelector(".products-area-wrapper").classList.remove("gridView");
        document.querySelector(".products-area-wrapper").classList.add("tableView");
    });

    var modeSwitch = document.querySelector('.mode-switch');
    modeSwitch.addEventListener('click', function () {
        console.log(12);
        document.documentElement.classList.toggle('light');
        modeSwitch.classList.toggle('active');
    });
</script>
@endsection
<style>
    .fa-heart{
        font-size: 26px;
        color: white;
        text-shadow: rgb(77, 77, 79) -2px 0px, rgb(77, 77, 79) 0px 2px, rgb(77, 77, 79) 2px 0px, rgb(77, 77, 79) 0px -2px;
    }
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
    * {
        box-sizing: border-box;
    }
    #grid{
        position: relative;
    }
    #buttonList{
        position: relative;
    }
    #btnAddProduct{
        position: relative;
    }
    :root {
        /*--app-bg: #151e2f;*/
        --sidebar: #151e2f;
        --sidebar-main-color: #fff;
        --table-border: #1a2131;
        --table-header: #1a2131;
        --app-content-main-color: #fff;
        --sidebar-link: #fff;
        --sidebar-active-link: #1d283c;
        --sidebar-hover-link: #1a2539;
        --action-color: #2869ff;
        --action-color-hover: #6291fd;
        --app-content-secondary-color: #1d283c;
        --filter-reset: #2c394f;
        --filter-shadow: rgba(16, 24, 39, 0.8) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }
    .light:root {
        --app-bg: #fff;
        --sidebar: #f3f6fd;
        --app-content-secondary-color: #f3f6fd;
        --app-content-main-color: #1f1c2e;
        --sidebar-link: #1f1c2e;
        --sidebar-hover-link: rgba(195, 207, 244, 0.5);
        --sidebar-active-link: #c3cff4;
        --sidebar-main-color: #1f1c2e;
        --filter-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
    }
    body {
        overflow: hidden;
        font-family: 'Poppins', sans-serif;
        background-color: var(--app-bg);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .app-container {
        border-radius: 4px;
        width: 100%;
        height: 100vh;
        /*max-height: 100%;*/
        /*max-width: 1280px;*/
        display: flex;
        overflow: scroll !important;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        /*max-width: 2000px;*/
        margin: 0 auto;
    }
    .sidebar {
        flex-basis: 200px;
        max-width: 200px;
        flex-shrink: 0;
        background-color: var(--sidebar);
        display: flex;
        flex-direction: column;
    }
    .sidebar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px;
    }
    .sidebar-list {
        list-style-type: none;
        padding: 0;
    }
    .sidebar-list-item {
        position: relative;
        margin-bottom: 4px;
    }
    .sidebar-list-item a {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 10px 16px;
        color: var(--sidebar-link);
        text-decoration: none;
        font-size: 14px;
        line-height: 24px;
    }
    .sidebar-list-item svg {
        margin-right: 8px;
    }
    .sidebar-list-item:hover {
        background-color: var(--sidebar-hover-link);
    }
    .sidebar-list-item.active {
        background-color: var(--sidebar-active-link);
    }
    .sidebar-list-item.active:before {
        content: '';
        position: absolute;
        right: 0;
        background-color: var(--action-color);
        height: 100%;
        width: 4px;
    }
    @media screen and (max-width: 1024px) {
        .sidebar {
            display: none;
        }
    }
    .mode-switch {
        background-color: transparent;
        border: none;
        padding: 0;
        color: var(--app-content-main-color);
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: auto;
        margin-right: 8px;
        cursor: pointer;
        position: relative;
    }
    .mode-switch .moon {
        fill: var(--app-content-main-color);
    }
    .mode-switch.active .moon {
        fill: none;
    }
    .account-info {
        display: flex;
        align-items: center;
        padding: 16px;
        margin-top: auto;
    }
    .account-info-picture {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        overflow: hidden;
        flex-shrink: 0;
    }
    .account-info-picture img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .account-info-name {
        font-size: 14px;
        color: var(--sidebar-main-color);
        margin: 0 8px;
        overflow: hidden;
        max-width: 100%;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .account-info-more {
        color: var(--sidebar-main-color);
        padding: 0;
        border: none;
        background-color: transparent;
        margin-left: auto;
    }
    .app-icon {
        color: var(--sidebar-main-color);
    }
    .app-icon svg {
        width: 24px;
        height: 24px;
    }
    .app-content {
        padding: 16px;
        background-color: var(--app-bg);
        height: 100%;
        flex: 1;
        max-height: 100%;
        display: flex;
        flex-direction: column;
    }
    .app-content-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 4px;
    }
    .app-content-headerText {
        color: var(--app-content-main-color);
        font-size: 24px;
        line-height: 32px;
        margin: 0;
    }
    .app-content-headerButton {
        background-color: var(--action-color);
        color: #fff;
        font-size: 14px;
        line-height: 24px;
        border: none;
        border-radius: 4px;
        height: 32px;
        padding: 0 16px;
        transition: 0.2s;
        cursor: pointer;
    }
    .app-content-headerButton:hover {
        background-color: var(--action-color-hover);
    }
    .app-content-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 4px;
    }
    .app-content-actions-wrapper {
        display: flex;
        align-items: center;
        margin-left: auto;
    }
    @media screen and (max-width: 520px) {
        .app-content-actions {
            flex-direction: column;
        }
        .app-content-actions .search-bar {
            max-width: 100%;
            /*order: 2;*/
        }
        .app-content-actions .app-content-actions-wrapper {
            padding-bottom: 16px;
            /*order: 1;*/
        }
    }
    .search-bar {
        background-color: var(--app-content-secondary-color);
        border: 1px solid var(--app-content-secondary-color);
        color: var(--app-content-main-color);
        font-size: 14px;
        line-height: 24px;
        border-radius: 4px;
        padding: 0px 10px 0px 32px;
        height: 32px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-search'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'/%3E%3C/svg%3E");
        background-size: 16px;
        background-repeat: no-repeat;
        background-position: left 10px center;
        width: 100%;
        max-width: 320px;
        transition: 0.2s;
        position: relative;
        /*z-index: -1;*/
    }
    .light .search-bar {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%231f1c2e' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-search'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'/%3E%3C/svg%3E");
    }
    /*.search-bar:placeholder {*/
    /*color: var(--app-content-main-color);*/
    /*}*/
    .search-bar:hover {
        border-color: var(--action-color-hover);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%236291fd' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-search'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'/%3E%3C/svg%3E");
    }
    .search-bar:focus {
        outline: none;
        border-color: var(--action-color);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%232869ff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-search'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'/%3E%3C/svg%3E");
    }
    .action-button {
        border-radius: 4px;
        height: 32px;
        background-color: var(--app-content-secondary-color);
        border: 1px solid var(--app-content-secondary-color);
        display: flex;
        align-items: center;
        color: var(--app-content-main-color);
        font-size: 14px;
        margin-left: 8px;
        cursor: pointer;
    }
    .action-button span {
        margin-right: 4px;
    }
    .action-button:hover {
        border-color: var(--action-color-hover);
    }
    .action-button:focus, .action-button.active {
        outline: none;
        color: var(--action-color);
        border-color: var(--action-color);
    }
    .filter-button-wrapper {
        position: relative;
    }
    .filter-menu {
        background-color: var(--app-content-secondary-color);
        position: absolute;
        top: calc(100% + 16px);
        right: -74px;
        border-radius: 4px;
        padding: 8px;
        width: 220px;
        z-index: 2;
        box-shadow: var(--filter-shadow);
        visibility: hidden;
        opacity: 0;
        transition: 0.2s;
    }
    .filter-menu:before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 5px solid var(--app-content-secondary-color);
        bottom: 100%;
        left: 50%;
        transform: translatex(-50%);
    }
    .filter-menu.active {
        visibility: visible;
        opacity: 1;
        top: calc(100% + 8px);
    }
    .filter-menu label {
        display: block;
        font-size: 14px;
        color: var(--app-content-main-color);
        margin-bottom: 8px;
    }
    .filter-menu select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        padding: 8px 24px 8px 8px;
        background-position: right 4px center;
        border: 1px solid var(--app-content-main-color);
        border-radius: 4px;
        color: var(--app-content-main-color);
        font-size: 12px;
        background-color: transparent;
        margin-bottom: 16px;
        width: 100%;
    }
    .filter-menu select option {
        font-size: 14px;
    }
    .light .filter-menu select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%231f1c2e' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
    }
    .filter-menu select:hover {
        border-color: var(--action-color-hover);
    }
    .filter-menu select:focus, .filter-menu select.active {
        outline: none;
        color: var(--action-color);
        border-color: var(--action-color);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%232869ff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
    }
    .filter-menu-buttons {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .filter-button {
        border-radius: 2px;
        font-size: 12px;
        padding: 4px 8px;
        cursor: pointer;
        border: none;
        color: #fff;
    }
    .filter-button.apply {
        background-color: var(--action-color);
    }
    .filter-button.reset {
        background-color: var(--filter-reset);
    }
    .products-area-wrapper {
        width: 100%;
        /*min-height: 700px;*/
        /*overflow: auto;*/
        padding: 0 4px;
    }
    .tableView .products-header {
        display: flex;
        align-items: center;
        border-radius: 4px;
        background-color: var(--app-content-secondary-color);
        position: sticky;
        top: 0;
        z-index: 0;
    }
    .tableView .products-row {
        display: flex;
        align-items: center;
        border-radius: 4px;
    }
    .tableView .products-row:hover {
        box-shadow: var(--filter-shadow);
        background-color: var(--app-content-secondary-color);
    }
    .tableView .products-row .cell-more-button {
        display: none;
    }
    .tableView .product-cell {
        flex: 1;
        padding: 8px 16px;
        color: var(--app-content-main-color);
        font-size: 14px;
        display: flex;
        align-items: center;
    }
    .tableView .product-cell img {
        width: 32px;
        height: 32px;
        border-radius: 6px;
        margin-right: 6px;
    }
    @media screen and (max-width: 780px) {
        .tableView .product-cell {
            font-size: 12px;
        }
        .tableView .product-cell.image span {
            display: none;
        }
        .tableView .product-cell.image {
            flex: 0.2;
        }
    }
    @media screen and (max-width: 520px) {
        .tableView .product-cell.category, .tableView .product-cell.sales {
            display: none;
        }
        .tableView .product-cell.status-cell {
            flex: 0.4;
        }
        .tableView .product-cell.stock, .tableView .product-cell.price {
            flex: 0.2;
        }
    }
    @media screen and (max-width: 480px) {
        .tableView .product-cell.stock {
            display: none;
        }
        .tableView .product-cell.price {
            flex: 0.4;
        }
    }
    .tableView .sort-button {
        padding: 0;
        background-color: transparent;
        border: none;
        cursor: pointer;
        color: var(--app-content-main-color);
        margin-left: 4px;
        display: flex;
        align-items: center;
    }
    .tableView .sort-button:hover {
        color: var(--action-color);
    }
    .tableView .sort-button svg {
        width: 12px;
    }
    .tableView .cell-label {
        display: none;
    }
    .status {
        border-radius: 4px;
        display: flex;
        align-items: center;
        padding: 4px 8px;
        font-size: 12px;
    }
    .status:before {
        content: '';
        width: 4px;
        height: 4px;
        border-radius: 50%;
        margin-right: 4px;
    }
    .status.active {
        color: #2ba972;
        background-color: rgba(43, 169, 114, 0.2);
    }
    .status.active:before {
        background-color: #2ba972;
    }
    .status.disabled {
        color: #59719d;
        background-color: rgba(89, 113, 157, 0.2);
    }
    .status.disabled:before {
        background-color: #59719d;
    }
    .gridView {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -8px;
    }
    @media screen and (max-width: 520px) {
        .gridView {
            margin: 0;
        }
    }
    .gridView .products-header {
        display: none;
    }
    .gridView .products-row {
        margin: 8px;
        width: calc(25% - 16px);
        background-color: var(--app-content-secondary-color);
        padding: 8px;
        border-radius: 4px;
        cursor: pointer;
        transition: transform 0.2s;
        position: relative;
    }
    .gridView .products-row:hover {
        transform: scale(1.01);
        box-shadow: var(--filter-shadow);
    }
    .gridView .products-row:hover .cell-more-button {
        display: flex;
    }
    @media screen and (max-width: 1024px) {
        .gridView .products-row {
            width: calc(33.3% - 16px);
        }
    }
    @media screen and (max-width: 820px) {
        .gridView .products-row {
            width: calc(50% - 16px);
        }
    }
    @media screen and (max-width: 520px) {
        .gridView .products-row {
            width: 100%;
            margin: 8px 0;
        }
        .gridView .products-row:hover {
            transform: none;
        }
    }
    .gridView .products-row .cell-more-button {
        border: none;
        padding: 0;
        border-radius: 4px;
        position: absolute;
        top: 16px;
        right: 16px;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
        /*background-color: rgba(16, 24, 39, 0.7);*/
        /*color: #fff;*/
        cursor: pointer;
        display: none;
    }
    .gridView .product-cell {
        color: var(--app-content-main-color);
        font-size: 14px;
        margin-bottom: 8px;
    }
    .gridView .product-cell:not(.image) {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .gridView .product-cell.image span {
        font-size: 18px;
        line-height: 24px;
    }
    .gridView .product-cell img {
        width: 100%;
        height: 140px;
        object-fit: cover;
        border-radius: 4px;
        margin-bottom: 16px;
    }
    .gridView .cell-label {
        opacity: 0.6;
    }

</style>