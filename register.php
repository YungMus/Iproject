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
                <button type="submit" class="form-button">Registreren</button>
                <p class="text-center"><a href="inlog.php">Toch inloggen?</a></p>
            </div>
        </form>
        </div>

        <div class="bottom-content-section" data-magellan data-threshold="0">
            <a href="#main-content-section"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-18.005-1.568l1.415-1.414 4.59 4.574 4.579-4.574 1.416 1.414-5.995 5.988-6.005-5.988z"/></svg></a>
        </div>

    </div>

    <div id="main-content-section" data-magellan-target="main-content-section">
        <!-- your content goes here -->
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





<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>