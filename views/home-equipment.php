<?php
$field_sale = 'id,name,price,sale,image,price - (price * sale/100) as price_sale';
$home_equipment = Products::select($field_sale)->where('category_id',3)->get();
?>
            <!-- breadcrumb start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="radios-breadcrumb breadcrumbs">
                        <ul class="list-unstyled d-flex align-items-center">
                            <li class="radiosbcrumb-item radiosbcrumb-begin">
                                <a href="<?php $this->url('');?>"><span>Home</span></a>
                            </li>
                            <li class="radiosbcrumb-item radiosbcrumb-end">
                                <span>Shop</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->

          <!-- start shop-section -->
          <section class="shop-section pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="shop-area clearfix">
                            <div class="woocommerce-content-wrap">
                                <div class="woocommerce-toolbar-top">
                                    <p class="woocommerce-result-count">Showing 1–12 of 70 results</p>
                                    <div class="products-sizes">
                                        <a href="#!" class="grid-4">
                                            <div class="grid-draw">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="grid-draw">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="grid-draw">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </a>
                                        <a href="#!" class="grid-3 active">
                                            <div class="grid-draw">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="grid-draw">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="grid-draw">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </a>
                                        <a href="#!" class="list-view">
                                            <div class="grid-draw-line">
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="grid-draw-line">
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="grid-draw-line">
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </a>
                                    </div>
                                    <form class="woocommerce-ordering" method="get">
                                        <select name="orderby" class="orderby">
                                            <option value="menu_order" selected='selected'>Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                        <input type="hidden" name="post_type" value="product" />                    
                                    </form>                            
                                </div>
                                <div class="woocommerce-content-inner">
                                    <ul class="products three-column clearfix">
                                        <?php foreach($home_equipment as $home) :?>
                                        <li class="product">
                                            <div class="product-holder">
                                                <a href="<?php $this->url('shop-single');?>"><img src="<?php $this->url('assets/img/product/'.$home->image);?>" alt=""></a>
                                                <ul class="product__action">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product-info">
                                                <div class="product__review ul_li">
                                                    <ul class="rating-star ul_li mr-10">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="far fa-star"></i></li>
                                                        <li><i class="far fa-star"></i></li>
                                                    </ul>
                                                    <span>(126) Review</span>
                                                </div>
                                                <h2 class="product__title"><a href="<?php $this->url('shop-single');?>"><?php echo limitString($home->name);?></a></h2>
                                                <span class="product__available">Available: <span>334</span></span>
                                                <div class="product__progress progress color-primary">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <h4 class="product__price"><span class="new">$<?php echo $home->price_sale;?></span><span class="old">$<?php echo $home->price;?></span></h4>
                                                <p class="product-description"><?php echo $home->descriptions;?></p>
                                            </div>
                                        </li>
                                        <?php endforeach ?>
                                    </ul> 
                                </div>
                                <div class="pagination_wrap pt-20">
                                    <ul>
                                        <li><a href="#!"><i class="far fa-angle-double-left"></i></a></li>
                                        <li><a class="current_page" href="#!">1</a></li>
                                        <li><a href="#!">2</a></li>
                                        <li><a href="#!">3</a></li>
                                        <li><a href="#!"><i class="far fa-angle-double-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end shop-section -->