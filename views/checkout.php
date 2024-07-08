<?php
if (!isset($_SESSION['customer_login'])) {
    header('location: admin/login.php');
} else {
  $user = $_SESSION['customer_login'];
}
$cartSS = new SessionCart();
$carts = $cartSS->items;
$customer = Customer::loginInfo();
// echo '<pre>';
// print_r($carts);
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
                    <span>Checkout</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- start checkout-section -->
<section class="checkout-section pb-80">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="woocommerce">
                    <form name="checkout" method="post" class="checkout woocommerce-checkout"
                        action="<?php $this->url('create-order');?>" enctype="multipart/form-data">

                        <div class="col2-set" id="customer_details">
                            <div class="coll-1">
                                <div class="woocommerce-billing-fields">

                                    <h3>Billing Details</h3>

                                    <p class="form-row form-row form-row-wide address-field validate-required"
                                        id="billing_address_1_field">
                                        <label for="billing_address_1" class="">Full Name</label>
                                        <input type="text" class="input-text " name="name"
                                            id="billing_address_1" 
                                            autocomplete="address-line1" value="<?php echo $customer->name;?>" />
                                    </p>

                                    
                                    <div class="clear"></div>

                                    <p class="form-row form-row form-row-wide address-field validate-required"
                                        id="billing_address_1_field">
                                        <label for="billing_address_1" class="">Email</label>
                                        <input type="text" class="input-text " name="email"
                                            id="billing_address_1" 
                                            autocomplete="address-line1" value="<?php echo $customer->email;?>" />
                                    </p>

                                    <p class="form-row form-row form-row-wide address-field validate-required"
                                        id="billing_address_1_field">
                                        <label for="billing_address_1" class="">Phone</label>
                                        <input type="text" class="input-text " name="phone"
                                            id="billing_address_1" 
                                            autocomplete="address-line1" value="<?php echo $customer->phone;?>" />
                                    </p>

                                    <p class="form-row form-row form-row-wide address-field validate-required"
                                        id="billing_address_1_field">
                                        <label for="billing_address_1" class="">Address</label>
                                        <input type="text" class="input-text " name="address"
                                            id="billing_address_1" 
                                            autocomplete="address-line1" value="<?php echo $customer->address;?>" />
                                    </p>
                                    <p class="form-row form-row form-row-wide address-field validate-required"
                                        id="billing_address_1_field">
                                        <label for="billing_address_1" class="">Order Note</label>
                                        <textarea name="order_note" id="" placeholder="Enter order notes if applicable"></textarea>
                                    </p>
                                    <div class="clear"></div>
                                    <div class="clear"></div>
                                    <div class="create-account">
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="coll-2">
                                <div class="woocommerce-shipping-fields">
                                </div>
                            </div>
                        </div>
                        <h3 id="order_review_heading">Your order</h3>
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <table class="shop_table woocommerce-checkout-review-order-table">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-name">Quantity</th>
                                        <th class="product-total">Total</th>
                                        <th>
                                            <?php if(count($carts)) : ?>
                                            <a onclick="return confirm('Bạn có muốn xoá tất cả sản phẩm này không?')"
                                                href="<?php $this->url('ss-cart-process?action=clearall');?>"
                                                class="remove" title="Remove All" 
                                                data-product_sku="my name is">&times;</a>
                                                <?php endif ?>
                                            </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($carts as $cart) : ?>
                                    <tr class="cart_single">
                                        <td class="product-name">
                                            <?php echo limitString($cart->name);?>&nbsp;</td>
                                        <td><strong class="product-quantity"><?php echo $cart->quantity;?></strong>
                                        </td>
                                        <td class="product-total">
                                            <span>$<?php echo number_format($cart->total);?></span>
                                        </td>
                                        <td><a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')"
                                                href="<?php $this->url('ss-cart-process?id='.$cart->id);?>&action=delete"
                                                class="remove" title="Remove this item" data-product_id="8"
                                                data-product_sku="my name is">&times;</a></td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                                <tfoot>
                                    <tr class="shipping">
                                        <th>Shipping</th>
                                        <td data-title="Shipping" colspan="3">
                                            Free Shipping
                                            <input type="hidden" data-index="0"
                                                id="shipping_method_0" 
                                                class="shipping_method" />
                                        </td>
                                    </tr>

                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td colspan="3">
                                            <strong><span>$<?php echo number_format($cartSS->totalMoney);?></span></strong>
                                        </td>
                                    </tr>
                                </tfoot>


                            </table>
                            <div id="payment" class="woocommerce-checkout-payment">
                                <ul class="wc_payment_methods payment_methods methods">
                                    <li class="wc_payment_method payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio"
                                             value="cheque" checked='checked'
                                            data-order_button_text="" />
                                        <!--grop add span for radio button style-->
                                        <span class='grop-woo-radio-style'></span>
                                        <!--custom change-->
                                        <label for="payment_method_cheque">
                                            Check Payments </label>
                                    </li>
                                    <li class="wc_payment_method payment_method_paypal">
                                        <input id="payment_method_paypal" type="radio" class="input-radio"
                                            value="paypal"
                                            data-order_button_text="Proceed to PayPal" />
                                        <!--grop add span for radio button style-->
                                        <span class='grop-woo-radio-style'></span>
                                        <!--custom change-->
                                        <label for="payment_method_paypal">
                                            PayPal <img src="assets/img/icon/paypal.png"
                                                alt="PayPal Acceptance Mark" /><a href="#!" class="about_paypal"
                                                title="What is PayPal?">What is
                                                PayPal?</a> </label>
                                    </li>
                                </ul>
                                <?php if(count($carts)) : ?>
                                <div class="form-row place-order mt-20">
                                    <button type="submit" class="thm-btn thm-btn__2 no-icon br-0">
                                        <span class="btn-wrap">
                                            <span>Place order</span>
                                            <span>Place order</span>
                                        </span>
                                    </button>
                                </div>
                                <?php else : ?>
                                    <a href="<?php $this->url('cart');?>"  class="thm-btn thm-btn__2 no-icon br-0">
                                        <span class="btn-wrap">
                                            <span>Back to cart</span>
                                            <span>Back to cart</span>
                                        </span>
                                    </a>
                                    <?php endif ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end checkout-section -->