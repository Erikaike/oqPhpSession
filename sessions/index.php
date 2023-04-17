<?php
session_start();

require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
    <a href="logout.php">deco</a>

        <?php

        foreach ($catalog as $id => $cookie)
        
        { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>&name=<?= urlencode($cookie['name'])?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php }
        if(!empty($_GET) && (isset($_GET['add_to_cart']))) {
            $productId = $_GET['add_to_cart'];

            // Si il existe pas déjà alors : 
            if (isset($_SESSION['cart']) && array_key_exists($productId, $_SESSION['cart'])) {
                $_SESSION['cart'][$productId]['nb']++;
            }
            else {
                $_SESSION['cart'][$productId] = [
                    'name' => ($_GET['name']),
                    'nb' => 1
                ];
            } 
        } 

        ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
