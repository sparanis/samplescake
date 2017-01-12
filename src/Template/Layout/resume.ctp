<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('slicknav.css') ?>
    <?= $this->Html->css('prettyPhoto.css') ?>
    <?= $this->Html->css('camera.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>

    <?= $this->Html->script('jquery-1.8.3.min.js') ?>
    <?= $this->Html->script('jquery.mobile.customized.min.js') ?>
    <?= $this->Html->script('jquery.easing.1.3.js') ?>
    <?= $this->Html->script('camera.min.js') ?>
    <?= $this->Html->script('myscript.js') ?>
    <?= $this->Html->script('sorting.js') ?>
    <?= $this->Html->script('app.js') ?>
    <?= $this->Html->script('jquery.isotope.js') ?>
    <?= $this->Html->script('jquery.masonry.min.js') ?>
    <script>
            jQuery(function(){
                    jQuery('#camera_wrap_1').camera({
                    transPeriod: 500,
                    time: 3000,
                    height: '490px',
                    thumbnails: false,
                    pagination: true,
                    playPause: false,
                    loader: false,
                    navigation: false,
                    hover: false
                });
            });
        </script>

</head>
<body>

 <?= $this->fetch('content') ?>



<?= $this->Html->script('jquery.prettyPhoto.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('jquery.slicknav.js') ?> 
<?= $this->Html->script('profile-pic.js') ?> 


</body>
</html>