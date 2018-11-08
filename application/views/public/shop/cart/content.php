<div class="super_container">
		

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="<?=base_url('public\image\cart\shopping_cart.png');?>" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">SK ZIC 4LX3 15W-60</div>
										</div>
								
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">
                                                <div class="input-group mb-3 col-lg-6">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-danger btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
                                                    </div>
                                                    <input type="number" id="qty_input" class="form-control form-control-sm" value="1" min="1">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-orange btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">680 .-</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Delete</div>
											<div class="cart_item_text ">
                                                <button type="button" class="btn btn-orange"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                        
									</div>
								</li>
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">680 .-</div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Add to Cart</button>
							<button type="button" class="button cart_button_checkout">Add to Cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="<?=base_url('public\image\cart\send.png');?>" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

