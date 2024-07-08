<?php
 if (!isset($_SESSION['customer_login'])) {
    header('location: admin/login.php');
} else {
  $user = $_SESSION['customer_login'];
}
$carts = Cart::join('id, quantity, price,(cart_detail.price * cart_detail.quantity) as total','product_id','id','products.name, products.image')->where('customer_id', Customer::loginInfo()->id)->get();
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
                    <span>Cart</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- start cart-section -->
<section class="cart-section woocommerce-cart pb-80">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="woocommerce">
                    <table class="shop_table shop_table_responsive cart">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $tt = 0; 
                                foreach($carts as $cart):?>
                            <tr class="cart_single">
                                <td class="product-remove">
                                    <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')"
                                        href="<?php $this->url('cart-delete?id='.$cart->id);?>" class="remove"
                                        title="Remove this item" data-product_id="8"
                                        data-product_sku="my name is">&times;</a>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="#!">
                                        <img width="57" height="70"
                                            src="<?php $this->url('assets/img/product/'.$cart->image);?>"
                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                            alt="#!" />
                                    </a>
                                </td>
                                <form action="<?php $this->url('ss-cart-process');?>?id=<?php echo $cart->id;?>" method="post">
                                    <td class="product-name" data-title="Product">
                                        <a href="#!"><?php echo $cart->name;?></a>
                                        <div>
                                            <button class="thm-btn thm-btn__2 br-0 no-icon" style=" padding: 0px 20px;"
                                                type="submit">Thêm vào thanh toán</button>
                                        </div>
                                    </td>
                                </form>

                                <td class="product-price" data-title="Price">
                                    <span>$<?php echo number_format($cart->price);?></span>
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <form action="<?php $this->url('cart-update');?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo $cart->id;?>">
                                        <div class="quantity">
                                            <input type="number" step="1" min="0" name="quantity"
                                                value="<?php echo $cart->quantity;?>" title="Qty"
                                                class="product-count input-text qty text product-count form-control" />
                                        </div>
                                        <div>
                                            <button class="thm-btn thm-btn__2 br-0 no-icon" style="padding: 0px 20px;"
                                                type="submit">Update</button>
                                        </div>
                                    </form>
                                </td>
                                <td class="product-subtotal" data-title="Total">
                                    <span>$<?php echo number_format($cart->total);?></span>
                                </td>
                            </tr>
                            <?php $tt += $cart->total; endforeach ?>
                            <tr>
                                <td colspan="6" class="actions">
                                    <div class="coupon">
                                        <label for="coupon_code">Coupon:</label>
                                        <input type="text" name="coupon_code" class="input-text" id="coupon_code"
                                            value="" placeholder="Coupon code" />
                                        <button class="thm-btn thm-btn__2 br-0 no-icon" type="submit">
                                            <span class="btn-wrap">
                                                <span>Apply Coupon</span>
                                                <span>Apply Coupon</span>
                                            </span>
                                        </button>
                                    </div>

                                    <button class="thm-btn thm-btn__2 br-0 no-icon" type="submit">
                                        <span class="btn-wrap">
                                            <span>Update Cart</span>
                                            <span>Update Cart</span>
                                        </span>
                                    </button>

                                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="918724a9c2" />
                                    <input type="hidden" name="_wp_http_referer" value="/wp/?page_id=5" />
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="cart-collaterals">
                        <div class="cart_totals calculated_shipping">
                            <h2>Cart Totals</h2>
                            <table class="shop_table shop_table_responsive">
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal">
                                        <span>$<?php echo number_format($tt);?></span>
                                    </td>
                                </tr>
                                <tr class="shipping">
                                    <th>Shipping</th>
                                    <td data-title="Shipping">
                                        Free Shipping
                                    </td>
                                </tr>

                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total">
                                        <strong><span>$<?php echo number_format($tt);?></span></strong>
                                    </td>
                                </tr>
                            </table>

                            <div class="wc-proceed-to-checkout">
                                <a href="<?php $this->url('checkout');?>"
                                    class="checkout-button thm-btn thm-btn__2 no-icon br-0 alt wc-forward">
                                    <span class="btn-wrap">
                                        <span>Proceed to Checkout</span>
                                        <span>Proceed to Checkout</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end cart-section -->