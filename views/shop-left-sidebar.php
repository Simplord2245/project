<?php
$field_sale = 'id,name,price,sale,image,quantity,sold,descriptions,price - (price * sale/100) as price_sale';
$cats = Categories::select('id,name')->where('status',1)->get();
$product = Products::select($field_sale)->orderby('','rand()')->limit(12)->get();
$id = !empty($_GET['id']) ? (int)($_GET['id']) : 0;
if($id){
    $product = Products::select($field_sale)->where('category_id',$id)->limit(12)->get();
    }
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
                        <div class="shop-area shop-left-sidebar clearfix">
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
                                        <?php foreach($product as $prod):?>
                                        <li class="product">
                                            <div class="product-holder">
                                                <a href="<?php $this->url('shop-single');?>?id=<?php echo $prod->id;?>"><img src="<?php $this->url('assets/img/product/'.$prod->image);?>" alt=""></a>
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
                                                <h2 class="product__title"><a href="<?php $this->url('shop-single');?>?id=<?php echo $prod->id;?>"><?php echo limitString($prod->name);?></a></h2>
                                                <span class="product__available">Available: <span><?php echo $prod->quantity;?></span></span>
                                                <div class="product__progress progress color-primary">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <?php if($prod->sale > 0):?>
                                                <h4 class="product__price"><span class="new">$<?php echo number_format($prod->price_sale);?></span><span class="old">$<?php echo number_format($prod->price);?></span></h4>
                                                <?php else :?>
                                                    <h4 class="product__price"><span class="new">$<?php echo number_format($prod->price);?></span>
                                                <?php endif ?>
                                                <p class="product-description"><?php echo $prod->descriptions;?></p>
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
                            <div class="shop-sidebar">
                                <div class="widget">
                                    <h2 class="widget__title">
                                        <span>Search</span>
                                    </h2>
                                    <form class="widget__search" action="#">
                                        <input type="text" placeholder="Search...">
                                        <button><i class="far fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="widget widget_price_filter">
                                    <h2 class="widget__title">
                                        <span>Price Filtering</span>
                                    </h2>
                                    <div class="filter-price">
                                        <form>
                                            <div id="slider-range"></div>
                                            <p>Price : <input type="text" id="amount"></p>
                                            <button>filter</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- <div class="widget">
                                    <h2 class="widget__title">
                                        <span>Color</span>
                                    </h2>
                                    <div class="widget__color ul_li">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div> -->
                                <div class="widget">
                                    <h2 class="widget__title">
                                        <span>Category</span>
                                    </h2>
                                   <ul class="widget__category">
                                    <?php foreach($cats as $cat) :?>
                                        <li><a href="<?php $this->url('shop-left-sidebar')?>?id=<?php echo $cat->id?>"><?php echo $cat->name;?><i class="far fa-chevron-right"></i></a></li>
                                        <?php endforeach ?>
                                   </ul>
                                </div>
                                <div class="widget">
                                    <div class="widget__add">
                                        <div class="content">
                                            <span>Trending</span>
                                            <h3>2024 <span>Laptop</span> <br> Collection</h3>
                                            <a class="thm-btn no-icon" href="#!">
                                                <span class="btn-wrap"> 
                                                    <span>Buy Now</span>
                                                    <span>Buy Now</span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="image">
                                            <img class="add_img" src="assets/img/product/img_177.png" alt="">
                                            <img class="add_shape" src="assets/img/shape/add_shape.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="widget">
                                    <h2 class="widget__title">
                                        <span>Brands</span>
                                    </h2>
                                    <div class="checkbox">
                                        <div class="checkbox__item ul_li">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="b1" />
                                            <label for="b1">Samsung</label>
                                        </div>
                                        <div class="checkbox__item ul_li">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="b2" />
                                            <label for="b2">Oppo</label>
                                        </div>
                                        <div class="checkbox__item ul_li">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="b3" />
                                            <label for="b3">hewaui Galaxy</label>
                                        </div>
                                        <div class="checkbox__item ul_li">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="b4" />
                                            <label for="b4">Ryzen 3600</label>
                                        </div>
                                        <div class="checkbox__item ul_li">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="b5" />
                                            <label for="b5">intel</label>
                                        </div>
                                        <div class="checkbox__item ul_li">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="b6" />
                                            <label for="b6">Mobile Handset</label>
                                        </div>
                                        <div class="checkbox__item ul_li">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="b7" />
                                            <label for="b7">Mobile Handset</label>
                                        </div>
                                    </div>

                                </div> -->
                                <!-- <div class="widget">
                                    <h2 class="widget__title">
                                        <span>Tags</span>
                                    </h2>
                                    <div class="tagcloud">
                                        <a href="#!">symphony</a>
                                        <a href="#!">nokia</a>
                                        <a href="#!">nokia</a>
                                        <a href="#!">landing page</a>
                                        <a href="#!">Alcatel</a>
                                        <a href="#!">Samsung</a>
                                        <a href="#!">Oppos</a>
                                        <a href="#!">Oppos</a>
                                        <a href="#!">I phone Pro 12</a>
                                        <a href="#!">poco X3</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end shop-section -->