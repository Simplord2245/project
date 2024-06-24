<?php
$field_sale = 'id,name,price,sale,image,quantity,sold,price - (price * sale/100) as price_sale';
$topproducts = Products::select($field_sale)->orderby('price','desc')->limit(3)->get();

$recent = Products::select($field_sale)->orderby('','rand()')->limit(7)->get();
$bestseller = Products::select($field_sale)->orderby('sold','desc')->limit(7)->get();
$top = Products::select($field_sale)->orderby('price','desc')->limit(7)->get();
$newarrivals = Products::select($field_sale)->orderby('','rand()')->limit(7)->get();
$toprating = Products::select($field_sale)->orderby('','rand()')->limit(7)->get();

$cats = Categories::select('id,name')->get();
$prodline1 = Products::select($field_sale)->orderby('id','asc')->get();
$prodline2 = Products::select($field_sale)->orderby('id','desc')->get();

?>
<div class="hero hero__height ul_li" data-background="assets/img/bg/hero_bg.jpg">
    <div class="container">
        <div class="row align-items-center mt-none-30">
            <div class="col-lg-9 mt-30">
                <div class="row align-items-center flex-row-reverse mt-none-30">
                    <div class="col-lg-7 mt-30">
                        <div class="hero__product">
                            <div class="hero__product-wrap">
                                <div class="hero__product-carousel">
                                    <div class="hero__product-item">
                                        <img src="assets/img/product/img_52.png" alt="">
                                    </div>
                                    <div class="hero__product-item">
                                        <img src="assets/img/product/img_53.png" alt="">
                                    </div>
                                    <div class="hero__product-item">
                                        <img src="assets/img/product/img_54.png" alt="">
                                    </div>
                                    <div class="hero__product-item">
                                        <img src="assets/img/product/img_52.png" alt="">
                                    </div>
                                    <div class="hero__product-item">
                                        <img src="assets/img/product/img_54.png" alt="">
                                    </div>
                                </div>
                                <div class="hero__product-carousel-nav">
                                    <div class="hero__product-item-nav">
                                        <div class="image">
                                            <img src="assets/img/product/img_52.png" alt="">
                                        </div>
                                    </div>
                                    <div class="hero__product-item-nav">
                                        <div class="image">
                                            <img src="assets/img/product/img_53.png" alt="">
                                        </div>
                                    </div>
                                    <div class="hero__product-item-nav">
                                        <div class="image">
                                            <img src="assets/img/product/img_54.png" alt="">
                                        </div>
                                    </div>
                                    <div class="hero__product-item-nav">
                                        <div class="image">
                                            <img src="assets/img/product/img_52.png" alt="">
                                        </div>
                                    </div>
                                    <div class="hero__product-item-nav">
                                        <div class="image">
                                            <img src="assets/img/product/img_54.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <span class="hero__product-offer">
                                    <span class="discount">29<span>%</span></span>
                                    <span>off</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-30">
                        <div class="hero__content">
                            <span class="subtitle">100% Best Product</span>
                            <h2 class="title">Waterma Watch <br> Beats Studio</h2>
                            <h3 class="price">$ 1800.99 / <span>$2860</span></h3>
                            <div class="mxw_343 mb-20">
                                <div class="product__progress progress h-16 color-primary">
                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="ul_li_between mb-6">
                                    <span class="product__available">Available: <span>334</span></span>
                                    <span class="product__available">Sold: <span>180</span></span>
                                </div>
                            </div>
                            <a class="hero__btn" href="#!">Shop Now <i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-30">
                <div class="hot-deal__slide-wrap style-2 bg-white ">
                    <h2 class="section-heading mb-25"><span>Top Product</span></h2>
                    <div class="hot-deal__slide tx-arrow">
                        <?php foreach($topproducts as $topprod):?>
                        <div class="hot-deal__item text-center">
                            <div class="thumb">
                                <a href="<?php $this->url('shop-single');?>?id=<?php echo $topprod->id;?>">
                                    <img src="<?php $this->url('assets/img/product/'.$topprod->image);?>" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <ul class="rating-star ul_li_center mr-10">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                    <li><i class="far fa-star"></i></li>
                                </ul>
                                <h2 class="title mb-15"><a href="#!"><?php echo $topprod->name;?></a></h2>
                                <?php if($topprod->sale > 0):?>
                                <h4 class="product__price mb-20"><span
                                        class="new">$<?php echo number_format($topprod->price_sale);?></span><span
                                        class="old">$<?php echo number_format($topprod->price);?></span></h4>
                                        <?php else : ?>
                                            <h4 class="product__price mb-20"><span
                                            class="new">$<?php echo number_format($topprod->price);?></span></h4>
                                            <?php endif ?>
                                            <div class="mxw_216 m-auto">
                                    <div class="product__progress progress mb-6 h-8 color-primary">
                                        <div class="progress-bar" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="ul_li_between">
                                        <span class="product__available">Available:
                                            <span><?php echo $topprod->quantity;?></span></span>
                                        <span class="product__available">Sold:
                                            <span><?php echo $topprod->sold;?></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero end -->

<!-- feature start -->
<div class="feature pt-40 pb-30">
    <div class="container">
        <div class="feature__wrap ul_li">
            <div class="feature__item ul_li">
                <div class="icon">
                    <img src="assets/img/icon/feat_01.svg" alt="">
                </div>
                <div class="content">
                    <h3>Free Shipping</h3>
                    <p>Free shipping over $100</p>
                </div>
            </div>
            <div class="feature__item ul_li">
                <div class="icon">
                    <img src="assets/img/icon/feat_02.svg" alt="">
                </div>
                <div class="content">
                    <h3>Payment Secure</h3>
                    <p>Got 100% Payment Safe</p>
                </div>
            </div>
            <div class="feature__item ul_li">
                <div class="icon">
                    <img src="assets/img/icon/feat_03.svg" alt="">
                </div>
                <div class="content">
                    <h3>Support 24/7</h3>
                    <p>Top quialty 24/7 Support</p>
                </div>
            </div>
            <div class="feature__item ul_li">
                <div class="icon">
                    <img src="assets/img/icon/feat_04.svg" alt="">
                </div>
                <div class="content">
                    <h3>100% Money Back</h3>
                    <p>Cutomers Money Backs</p>
                </div>
            </div>
            <div class="feature__item ul_li">
                <div class="icon">
                    <img src="assets/img/icon/feat_05.svg" alt="">
                </div>
                <div class="content">
                    <h3>Quality Products</h3>
                    <p>We Insure Product Quailty</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- feature end -->

<!-- tab product start -->
<div class="tab-product pt-40 pb-40">
    <div class="container">
        <div class="product__nav-wrap ul_li_between mb-20">
            <h2 class="section-heading"><span>Hot <span>New Arrival</span> You May Like</span></h2>
            <ul class="product__nav rd-tab-nav nav nav-tabs" id="vd-myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="vd-tab-01" data-bs-toggle="tab" data-bs-target="#vd-tab1" type="button"
                        role="tab" aria-controls="vd-tab1" aria-selected="true">Recent</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="vd-tab-02" data-bs-toggle="tab" data-bs-target="#vd-tab2" type="button"
                        role="tab" aria-controls="vd-tab2" aria-selected="false">Best Seller</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="vd-tab-03" data-bs-toggle="tab" data-bs-target="#vd-tab3" type="button"
                        role="tab" aria-controls="vd-tab3" aria-selected="false">Top</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="vd-tab-04" data-bs-toggle="tab" data-bs-target="#vd-tab4"
                        type="button" role="tab" aria-controls="vd-tab4" aria-selected="false">New Arrivals</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="vd-tab-05" data-bs-toggle="tab" data-bs-target="#vd-tab5" type="button"
                        role="tab" aria-controls="vd-tab5" aria-selected="false">Top Rating</button>
                </li>
            </ul>
        </div>
        <div class="vd-products">
            <div class="tab-content tab_has_slider" id="vd-myTabContent">
                <div class="tab-pane fade" id="vd-tab1" role="tabpanel" aria-labelledby="vd-tab-01">
                    <div class="tab-product__slide tx-arrow">
                        <?php foreach($recent as $re):?>
                        <div class="tab-product__item tx-product text-center">
                            <div class="thumb">
                                <a href="<?php $this->url('shop-single');?>?id=<?php echo $re->id;?>"><img
                                        src="<?php $this->url('assets/img/product/'.$re->image);?>" alt=""></a>
                            </div>
                            <div class="content">
                                <div class="product__review ul_li_center">
                                    <ul class="rating-star ul_li mr-10">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                    </ul>
                                    <span>(126)</span>
                                </div>
                                <h3 class="title"><a
                                        href="<?php $this->url('shop-single');?>?id=<?php echo $re->id;?>"><?php echo limitString($re->name);?></a></h3>
                                        <?php if($re->sale > 0):?>
                                <span class="price">( $<?php echo number_format($re->price_sale);?> - <span
                                        class="old-price">$<?php echo number_format($re->price);?></span> )</span>
                                        <?php else : ?>
                                            <span class="price">$<?php echo number_format($re->price);?></span>
                                        <?php endif ?>
                            </div>
                            <ul class="product__action">
                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                            </ul>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="vd-tab2" role="tabpanel" aria-labelledby="vd-tab-02">
                    <div class="tab-product__slide tx-arrow">
                        <?php foreach($bestseller as $bestselle):?>
                        <div class="tab-product__item tx-product text-center">
                            <div class="thumb">
                                <a href="<?php $this->url('shop-single');?>?id=<?php echo $bestselle->id;?>"><img
                                        src="<?php $this->url('assets/img/product/'.$bestselle->image);?>" alt=""></a>
                            </div>
                            <div class="content">
                                <div class="product__review ul_li_center">
                                    <ul class="rating-star ul_li mr-10">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                    </ul>
                                    <span>(126)</span>
                                </div>
                                <h3 class="title"><a
                                        href="<?php $this->url('shop-single');?>?id=<?php echo $bestselle->id;?>"><?php echo limitString($bestselle->name);?></a>
                                </h3>
                                <?php if($bestselle->sale > 0):?>
                                <span class="price">( $<?php echo number_format($bestselle->price_sale);?> - <span
                                        class="old-price">$<?php echo number_format($bestselle->price);?></span> )</span>
                                        <?php else : ?>
                                            <span class="price">$<?php echo number_format($bestselle->price);?></span>
                                        <?php endif ?>
                            </div>
                            <ul class="product__action">
                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <span class="badge-skew" >SALE <?php echo $bestselle->sale;?>%</span>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="vd-tab3" role="tabpanel" aria-labelledby="vd-tab-03">
                    <div class="tab-product__slide tx-arrow">
                        <?php foreach($top as $tp):?>
                        <div class="tab-product__item tx-product text-center">
                            <div class="thumb">
                                <a href="<?php $this->url('shop-single');?>?id=<?php echo $tp->id;?>"><img
                                        src="<?php $this->url('assets/img/product/'.$tp->image);?>" alt=""></a>
                            </div>
                            <div class="content">
                                <div class="product__review ul_li_center">
                                    <ul class="rating-star ul_li mr-10">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                    </ul>
                                    <span>(126)</span>
                                </div>
                                <h3 class="title"><a
                                        href="<?php $this->url('shop-single');?>?id=<?php echo $tp->id;?>"><?php echo limitString($tp->name);?></a></h3>
                                        <?php if($tp->sale > 0):?>
                                <span class="price">( $<?php echo number_format($tp->price_sale);?> - <span
                                        class="old-price">$<?php echo number_format($tp->price);?></span> )</span>
                                        <?php else : ?>
                                            <span class="price">$<?php echo number_format($tp->price);?></span>
                                        <?php endif ?>
                            </div>
                            <ul class="product__action">
                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <span class="badge-skew">TOP</span>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="vd-tab4" role="tabpanel" aria-labelledby="vd-tab-04">
                    <div class="tab-product__slide tx-arrow">
                        <?php foreach($newarrivals as $newarrival):?>
                        <div class="tab-product__item tx-product text-center">
                            <div class="thumb">
                                <a href="<?php $this->url('shop-single');?>?id=<?php echo $newarrival->id;?>"><img
                                        src="<?php $this->url('assets/img/product/'.$newarrival->image);?>" alt=""></a>
                            </div>
                            <div class="content">
                                <div class="product__review ul_li_center">
                                    <ul class="rating-star ul_li mr-10">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                    </ul>
                                    <span>(126)</span>
                                </div>
                                <h3 class="title"><a
                                        href="<?php $this->url('shop-single');?>?id=<?php echo $newarrival->id;?>"><?php echo limitString($newarrival->name);?></a>
                                </h3>
                                <?php if($newarrival->sale > 0):?>
                                <span class="price">( $<?php echo number_format($newarrival->price_sale);?> - <span
                                        class="old-price">$<?php echo number_format($newarrival->price);?></span> )</span>
                                        <?php else : ?>
                                            <span class="price">$<?php echo number_format($newarrival->price);?></span>
                                        <?php endif ?>
                            </div>
                            <ul class="product__action">
                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <span class="badge-skew">New</span>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="vd-tab5" role="tabpanel" aria-labelledby="vd-tab-05">
                    <div class="tab-product__slide tx-arrow">
                        <?php foreach($toprating as $toprate):?>
                        <div class="tab-product__item tx-product text-center">
                            <div class="thumb">
                                <a href="<?php $this->url('shop-single');?>?id=<?php echo $toprate->id;?>"><img
                                        src="<?php $this->url('assets/img/product/'.$toprate->image);?>" alt=""></a>
                            </div>
                            <div class="content">
                                <div class="product__review ul_li_center">
                                    <ul class="rating-star ul_li mr-10">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                    </ul>
                                    <span>(126)</span>
                                </div>
                                <h3 class="title"><a
                                        href="<?php $this->url('shop-single');?>?id=<?php echo $toprate->id;?>"><?php echo limitString($toprate->name);?></a></h3>
                                        <?php if($toprate->sale > 0):?>
                                <span class="price">( $<?php echo number_format($toprate->price_sale);?> - <span
                                        class="old-price">$<?php echo number_format($toprate->price);?></span> )</span>
                                        <?php else : ?>
                                            <span class="price">$<?php echo number_format($toprate->price);?></span>
                                        <?php endif ?>
                            </div>
                            <ul class="product__action">
                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                            </ul>
                          
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tab product end -->

<!-- add start -->
<div class="add pt-50 pb-50">
    <div class="container">
        <div class="add__wrap bg_img" data-background="assets/img/bg/add_bg_01.jpg">
            <div class="add__text">
                <span><span>10%</span> Free Shipping On All Order Over <span>$99</span></span>
            </div>
        </div>
    </div>
</div>
<!-- add end -->

<!-- banner start -->
<div class="vd-banner">
    <div class="container">
        <div class="row mt-none-30">
            <div class="col-lg-7 mt-30">
                <div class="vd-banner__single pos-rel ul_li_between bg_img" data-background="assets/img/bg/bg_02.jpg">
                    <div class="content">
                        <h2>Buy One. Get Free delivery</h2>
                        <p>Reference site about Lorem Ipsum</p>
                        <div class="banner__btn mt-20">
                            <a class="thm-btn thm-btn__black" href="#!">
                                <span class="btn-wrap">
                                    <span>Shop Now</span>
                                    <span>Shop Now</span>
                                </span>
                                <i class="far fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="thumb">
                        <img src="assets/img/product/img_49.png" alt="">
                    </div>
                    <div class="vd-banner__offer">
                        <span class="offer">25% <br> <span>off</span></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-30">
                <div class="vd-banner__single vd-banner__single-two pos-rel ul_li_between bg_img"
                    data-background="assets/img/bg/bg_03.jpg">
                    <div class="content">
                        <h2>Buy One. Get Free</h2>
                        <p>Widescreen 4k ultra Laptop</p>
                        <div class="banner__btn mt-20">
                            <a class="thm-btn thm-btn__black thm-btn__md  text-lowercase" href="#!">
                                <span class="btn-wrap">
                                    <span>Shop Now</span>
                                    <span>Shop Now</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="thumb">
                        <img src="assets/img/product/img_50.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- rd category start -->
<div class="rd-category pt-60">
    <div class="container">
        <div class="row mt-none-30">
            <div class="col-lg-6 col-md-12 mt-30">
                <div class="rd-banner ul_li" data-background="assets/img/bg/bg_05.jpg">
                    <div class="rd-banner__content">
                        <span>Widesceen 4k .......</span>
                        <h3>Digital Slr Camera <br> High Defination</h3>
                        <p>Sumptuous, filling, and temptingly</p>
                        <div class="ul_li mt-20">
                            <div class="upto-offer ul_li">
                                <span class="upto">Up <br> To</span>
                                <span class="offer-no">70 <span>%</span></span>
                            </div>
                            <h4 class="price">$ 180.99</h4>
                        </div>
                        <div class="banner__btn mt-40">
                            <a class="thm-btn thm-btn__red" href="#!">
                                <span class="btn-wrap">
                                    <span>Shop Now</span>
                                    <span>Shop Now</span>
                                </span>
                                <i class="far fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="rd-banner__img">
                        <img src="assets/img/product/img_51.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-30">
                <div class="rd-category__wrap">
                    <h2 class="section-heading mb-25"><span>Camera & Dslr Item</span></h2>
                    <ul class="rd-category__list list-unstyled" data-background="assets/img/bg/bg_04.jpg">
                        <li class="title">Action Camera</li>
                        <li><a href="#!">Bluetooth speaker</a></li>
                        <li><a href="#!">Robotics vacuum </a></li>
                        <li><a href="#!">Laser printer</a></li>
                        <li><a href="#!">Electric frying pan</a></li>
                        <li><a href="#!">Digital camera</a></li>
                        <li><a href="#!">Digital camera</a></li>
                        <li><a href="#!">external hard Drive</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-30">
                <div class="rd-category__wrap">
                    <h2 class="section-heading mb-25"><span>Home Accesories</span></h2>
                    <ul class="rd-category__list list-unstyled" data-background="assets/img/bg/bg_04.jpg">
                        <li class="title">Action Camera</li>
                        <li><a href="#!">Bluetooth speaker</a></li>
                        <li><a href="#!">Robotics vacuum </a></li>
                        <li><a href="#!">Laser printer</a></li>
                        <li><a href="#!">Electric frying pan</a></li>
                        <li><a href="#!">Digital camera</a></li>
                        <li><a href="#!">Digital camera</a></li>
                        <li><a href="#!">external hard Drive</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rd category end -->

<!-- brand start -->
<div class="brand pt-80 pb-80">
    <div class="container">
        <div class="brand__active">
            <div class="brand__item">
                <a href="#!">
                    <img src="assets/img/brand/img_01.png" alt="">
                </a>
            </div>
            <div class="brand__item">
                <a href="#!">
                    <img src="assets/img/brand/img_02.png" alt="">
                </a>
            </div>
            <div class="brand__item">
                <a href="#!">
                    <img src="assets/img/brand/img_03.png" alt="">
                </a>
            </div>
            <div class="brand__item">
                <a href="#!">
                    <img src="assets/img/brand/img_04.png" alt="">
                </a>
            </div>
            <div class="brand__item">
                <a href="#!">
                    <img src="assets/img/brand/img_05.png" alt="">
                </a>
            </div>
            <div class="brand__item">
                <a href="#!">
                    <img src="assets/img/brand/img_06.png" alt="">
                </a>
            </div>
            <div class="brand__item">
                <a href="#!">
                    <img src="assets/img/brand/img_03.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- brand end -->