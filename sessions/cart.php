<?php 
session_start();
require 'inc/head.php';
require 'inc/data/products.php';

?>

<section class="cookies container-fluid">
    <div class="row">

    <?php foreach ($_SESSION['cart'] as $key => $item) : ?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <figure class="thumbnail text-center">
                <img src="assets/img/product-<?= $key; ?>.jpg"  class="img-responsive">
                <figcaption class="caption">
                    <h3><?= $item['name']; ?></h3>
                    <p class="occurences">
                        <?= $item['nb'] ?>
                    </p>
                </figcaption>
            </figure>
        </div>
    <?php endforeach ; ?>

    </div>
</section>
<?php require 'inc/foot.php'; ?>