<?php
$title = 'Registeren';
$link = 'register.php';

if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
    if (isset($_POST['send'])){
        $username = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));
        $gender = htmlspecialchars(trim($_POST['gender']));
        $birthdate = htmlspecialchars(trim($_POST['birthdate']));
        $place = htmlspecialchars(trim($_POST['place']));
        $postalCode = htmlspecialchars(trim($_POST['postalCode']));
        $houseNumber = htmlspecialchars(trim($_POST['houseNumber']));
        $celphoneNumber = htmlspecialchars(trim($_POST['celphoneNumber']));
        print_r($_POST);
    }
}

require_once("includes/header.php");
//require_once("connectingDatabase.php");
?>
    <div class="hero-full-screen">

        <div class="top-content-section">
            <div class="top-bar">
                <div class="top-bar-left">
                    <ul class="menu">
                        <li class="menu-text"><img src="https://placehold.it/75x30" alt="logo"></li>
                        <li><a href="#">One</a></li>
                        <li><a href="#">Two</a></li>
                        <li><a href="#">Three</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="middle-content-section">
            <article class="registerpage">
                <div class="marketing-site-content-section">
                    <div class="marketing-site-content-section-img">
                        <img src="https://images.pexels.com/photos/256046/pexels-photo-256046.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" />
                    </div>
                    <div class="marketing-site-content-section-block">
                        <h3 class="marketing-site-content-section-block-header">Yeti Snowcone Agency</h3>
                        <p class="marketing-site-content-section-block-subheader subheader">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam omnis, maxime libero natus qui minus!</p>
                        <a href="#" class="round button small">learn more</a>
                    </div>
                    <div class="marketing-site-content-section-block small-order-2 medium-order-1">
                        <h3 class="marketing-site-content-section-block-header">Yeti Snowcone Agency</h3>
                        <p class="marketing-site-content-section-block-subheader subheader">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam omnis, maxime libero natus qui minus!</p>
                        <a href="#" class="round button small">learn more</a>
                    </div>
                    <div class="marketing-site-content-section-img small-order-1 medium-order-2">
                        <img src="https://images.pexels.com/photos/300857/pexels-photo-300857.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" />
                    </div>
                </div>
            </article>
        </div>

        <div class="bottom-content-section" data-magellan data-threshold="0">
            <a href="#main-content-section"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-18.005-1.568l1.415-1.414 4.59 4.574 4.579-4.574 1.416 1.414-5.995 5.988-6.005-5.988z"/></svg></a>
        </div>

    </div>

    <div id="main-content-section" data-magellan-target="main-content-section">
        <!-- your content goes here -->
        <div class="multi-step-checkout-process">
            <div class="multi-step-checkout-process-step">
                <ul class="accordion" data-accordion>
                    <li class="accordion-item is-active" data-accordion-item>
                        <a href="#" class="accordion-title">1. Shipping <span class="multi-step-checkout-step-title-subheader">Step 1 of 3</span></a>
                        <div class="accordion-content" data-tab-content>
                            <form class="multi-step-checkout-form">
                                <div class="row">
                                    <div class="small-12 medium-9 column">
                                        <div class="shipping-address multi-step-checkout-step-section">
                                            <h6 class="multi-step-checkout-step-subheader">Shipping Address</h6>
                                            <p class="multi-step-checkout-step-subdesc">Please enter your shipping address. Only USPS ships to APO, FPO, or PO Boxes. <a href="#" class="text-link">Shipping Rates and Delivery Times</a></p>

                                            <label>
                                                <input type="text" placeholder="First Name" required >
                                                <input type="text" placeholder="Last Name" required >
                                                <input type="text" placeholder="Address" required >
                                                <div class="row">
                                                    <div class="small-12 medium-7 column">
                                                        <input type="text" placeholder="City" required >
                                                    </div>
                                                    <div class="small-6 medium-2 column">
                                                        <select required >
                                                            <option value="state1">AL</option>
                                                            <option value="state2">AK</option>
                                                            <option value="state3">AZ</option>
                                                            <option value="state4">AR</option>
                                                            <option value="state5">CA</option>
                                                        </select>
                                                    </div>
                                                    <div class="small-6 medium-3 column">
                                                        <input type="text" placeholder="ZIP" required >
                                                    </div>
                                                </div>

                                                <div><hr class="multi-step-checkout-form-divider"></div>
                                                <input type="text" placeholder="Email" required >
                                                <input type="text" placeholder="Phone" required >
                                            </label>
                                        </div>
                                        <div class="multi-step-checkout-shipping-options multi-step-checkout-step-section">
                                            <h6 class="multi-step-checkout-step-subheader">Shipping Options</h6>

                                            <div class="row multi-step-checkout-shipping-option">
                                                <label>
                                                    <div class="small-10 column">
                                                        <input type="radio" name="multi-step-checkout-shipping-option" value="ups-ground-shipping" class="multi-step-checkout-shipping-option-selection" checked="checked"> <span class="multi-step-checkout-shipping-option-title">UPS Ground (4–5 business days) - Recommended</span>
                                                        <div class="multi-step-checkout-shipping-option-desc">Same-day shipping of in-stock items for orders placed before 3pm EST. Realtime tracking included.</div>
                                                    </div>
                                                    <div class="small-2 column multi-step-checkout-shipping-cost">
                                                        $25.00
                                                    </div>
                                                </label>
                                            </div>

                                            <div class="row multi-step-checkout-shipping-option">
                                                <label>
                                                    <div class="small-10 column">
                                                        <input type="radio" name="multi-step-checkout-shipping-option" value="usps-shipping" class="multi-step-checkout-shipping-option-selection"><span class="multi-step-checkout-shipping-option-title">USPS  (6–12 business days)</span>
                                                        <div class="multi-step-checkout-shipping-option-desc">Tracking is available after 48 hours.</div>
                                                    </div>
                                                    <div class="small-2 column multi-step-checkout-shipping-cost">
                                                        $15.00
                                                    </div>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="multi-step-checkout-enews-sign-up">
                                            <fieldset>
                                                <input class="multi-step-checkout-enews-sign-up-checkbox" id="multi-step-checkout-enews-sign-up-checkbox" type="checkbox">
                                                <label for="#multi-step-checkout-enews-sign-up-checkbox">Please add me to your eNewsletter list so I can receive special promotions and product updates.</label>
                                            </fieldset>
                                        </div>
                                        <button class="primary button expanded">Continue to Payment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <li class="accordion-item" data-accordion-item>
                        <a href="#" class="accordion-title">2. Payment <span class="multi-step-checkout-step-title-subheader">Step 2 of 3</span></a>
                        <div class="accordion-content" data-tab-content>
                            <form class="multi-step-checkout-form">
                                <div class="row">
                                    <div class="small-12 medium-9 column">
                                        <div class="multi-step-checkout-billing-address">
                                            <fieldset>
                                                <input class="multi-step-checkout-billing-address-checkbox" id="multi-step-checkout-billing-address-checkbox" type="checkbox" checked><label for="multi-step-checkout-billing-address-checkbox">My Billing Address is the same as my Shipping Address.</label>
                                            </fieldset>
                                            <ul class="multi-step-checkout-billing-address-list">
                                                <li class="multi-step-checkout-billing-name">John Smith</li>
                                                <li class="multi-step-checkout-billing-street">123 Market St.</li>
                                                <li class="multi-step-checkout-billing-city-state">San Francisco, CA 94134</li>
                                            </ul>
                                        </div>
                                        <div><hr class="multi-step-checkout-form-divider"></div>

                                        <div class="multi-step-checkout-credit-card-info">
                                            <h6 class="multi-step-checkout-step-subheader">Credit Card</h6>
                                            <ul class="multi-step-checkout-payment-icons">
                                                <li><img class="multi-step-checkout-payment-icon" src="https://placehold.it/50x50"/></li>
                                                <li><img class="multi-step-checkout-payment-icon" src="https://placehold.it/50x50"/></li>
                                                <li><img class="multi-step-checkout-payment-icon" src="https://placehold.it/50x50"/></li>
                                                <li><img class="multi-step-checkout-payment-icon" src="https://placehold.it/50x50"/></li>
                                            </ul>

                                            <input type="text" placeholder="Card Name" required >
                                            <input type="text" placeholder="Card Number" required >
                                            <div class="row">
                                                <div class="small-4 column">
                                                    <select required >
                                                        <option value="january">01</option>
                                                        <option value="february">02</option>
                                                        <option value="march">03</option>
                                                        <option value="april">04</option>
                                                    </select>
                                                </div>
                                                <div class="small-4 column">
                                                    <select required >
                                                        <option value="year1">2019</option>
                                                        <option value="year2">2018</option>
                                                        <option value="year3">2017</option>
                                                        <option value="year4">2016</option>
                                                    </select>
                                                </div>
                                                <div class="small-4 column">
                                                    <input type="text" placeholder="CVV" required >
                                                </div>
                                            </div>

                                            <div><hr class="multi-step-checkout-form-divider"></div>

                                            <label for="apply-gift-card-code"> Gift Card <span>(optional)</span>
                                                <div class="input-group gift-card">
                                                    <input class="input-group-field" type="text" placeholder="Code">
                                                    <div class="input-group-button" placeholder="$">

                                                        <input type="submit" class="button primary" value="Apply" id="apply-gift-card-code">
                                                    </div>
                                                </div>
                                            </label>

                                            <div><hr class="multi-step-checkout-form-divider"></div>

                                            <button class="primary button expanded">Continue to Review Order</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <li class="accordion-item" data-accordion-item>
                        <a href="#" class="accordion-title">3. Review Order <span class="multi-step-checkout-step-title-subheader">Step 3 of 3</span></a>
                        <div class="accordion-content" data-tab-content>
                            <hr class="show-for-small-only order-table-divider">
                            <table class="order-table-content stack">
                                <thead>
                                <tr>
                                    <th width="120">Order</th>
                                    <th width="350"></th>
                                    <th width="80">Quantity</th>
                                    <th width="100">Price Each</th>
                                    <th width="60">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="order-item">
                                    <td><img class="order-product-image" src="https://placehold.it/100x100"/></td>
                                    <td><span class="order-product-title">Product 1</span> <span class="order-product-vendor">Vendor 1</span>
                                        <ul class="order-product-info">
                                            <li>In Stock</li>
                                            <li>Product SKU: 12345</li>
                                            <li>A great Product</li>
                                            <li>Details: You won't be sad</li>
                                        </ul>
                                    </td>
                                    <td><span class="show-for-small-only">Qty:</span> 1</td>
                                    <td><span class="show-for-small-only">Price Each: </span><span class="order-product-price">$25.00</span>
                                        <span class="show-for-small-only">,</span>
                                        <br class="hide-for-small-only">
                                        <span class="order-product-price-saving">
                  You save:
                  <br class="hide-for-small-only">
                  $2.08 (5%)
                </span>
                                    </td>
                                    <td><span class="show-for-small-only">Total: </span><span class="order-product-total">$25.00</span></td>
                                </tr>
                                <tr class="order-item">
                                    <td><img class="order-product-image" src="https://placehold.it/100x100"/></td>
                                    <td><span class="order-product-title">Product 2</span> <span class="order-product-vendor">Vendor 1</span>
                                        <ul class="order-product-info">
                                            <li>In Stock</li>
                                            <li>Product SKU: 12345</li>
                                            <li>A great Product</li>
                                            <li>Details: You won't be sad</li>
                                        </ul>
                                    </td>
                                    <td><span class="show-for-small-only">Qty:</span> 1</td>
                                    <td><span class="show-for-small-only">Price Each: </span><span class="order-product-price">$25.00</span>
                                        <span class="show-for-small-only">,</span>
                                        <br class="hide-for-small-only">
                                        <span class="order-product-price-saving">
                  You save:
                  <br class="hide-for-small-only">
                  $2.08 (5%)
                </span>
                                    </td>
                                    <td><span class="show-for-small-only">Total: </span><span class="order-product-total">$25.00</span></td>
                                </tr>
                                <tr class="order-item">
                                    <td><img class="order-product-image" src="https://placehold.it/100x100"/></td>
                                    <td><span class="order-product-title">Product 3</span> <span class="order-product-vendor">Vendor 1</span>
                                        <ul class="order-product-info">
                                            <li>In Stock</li>
                                            <li>Product SKU: 12345</li>
                                            <li>A great Product</li>
                                            <li>Details: You won't be sad</li>
                                        </ul>
                                    </td>
                                    <td><span class="show-for-small-only">Qty:</span> 1</td>
                                    <td><span class="show-for-small-only">Price Each: </span><span class="order-product-price">$25.00</span>
                                        <span class="show-for-small-only">,</span>
                                        <br class="hide-for-small-only">
                                        <span class="order-product-price-saving">
                  You save:
                  <br class="hide-for-small-only">
                  $2.08 (5%)
                </span>
                                    </td>
                                    <td><span class="show-for-small-only">Total: </span><span class="order-product-total">$25.00</span></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="">
                                <div class="row">
                                    <div class="small-12 medium-9 column multi-step-checkout-create-account">
                                        <h6 class="multi-step-checkout-step-subheader">Create an Account <span>(optional)</span></h6>
                                        <p class="create-account-desc">Save and review your orders in your account.</p>
                                        <form>
                                            <div class="row">
                                                <div class="small-12 medium-6 column">
                                                    <input type="text" placeholder="Password">
                                                </div>
                                                <div class="small-12 medium-6 column">
                                                    <input type="text" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div><hr class="multi-step-checkout-form-divider"></div>

                                <form>
                                    <label for="">Comments
                                        <textarea name="" id="" cols="30" rows="2"></textarea>
                                    </label>
                                    <button class="primary button expanded">Submit Order</button>
                                </form>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>
        </div>



        <form>
            <div class="register-form">
                <h4 class="text-center">Registreer hier!</h4>
                <label for="form-username">Gebruikersnaam
                    <input type="text" class="form-username" name="username" id="username">
                </label>
                <label for="form-email">Email
                    <input type="text" class="form-email" name="email" id="email">
                </label>
                <label for="form-password">Wachtwoord
                    <input type="text" class="form-password" name="password" id="password">
                </label>
                <label for="form-password">Herhaal wachtwoord
                    <input type="text" class="form-password" name="password-repeat" id="password-repeat">
                </label>
                <label for="form-gender">Geslacht
                    <label for="radio-button">Man
                        <input type="radio" class="form-gender" name="male" id="male">
                    </label>
                    <label for="radio-button">Vrouw
                        <input type="radio" class="form-gender" name="female" id="female">
                    </label>
                </label>
                <label for="form-phonenumber">Telefoonnummer
                    <input type="number" class="form-phonenumber" name="phonenumber" id="phonenumber">
                </label>
                <label for="form-date">Geboortedatum
                    <input type="date" class="form-date" name="date" id="date">
                </label>
                <label for="form-street">Straatnaam + huisnummer
                    <input type="text" class="form-street" name="street" id="street">
                </label>
                <label for="form-city">Plaats
                    <input type="text" class="form-city" name="city" id="city">
                </label>
                <label for="form-postalcode">Postcode
                    <input type="text" class="form-postalcode" name="postalcode" id="postalcode">
                </label>

                <button type="submit" class="form-button">Registreren</button>
                <p class="text-center"><a href="inlog.php">Toch inloggen?</a></p>
            </div>
        </form>
    </div>





<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>