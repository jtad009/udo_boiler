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

$cakeDescription = APP_NAME.': INVENTORY MANAGEMENT SYSTEM';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
        <?= $cakeDescription ?>:

    </title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Comfortaa|Nunito:300,400" rel="stylesheet">  -->
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->script('jquery.min.js') ?>
    <!-- Bootstrap core CSS -->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('business.css') ?>
    <?= $this->Html->css('lightbox.min.css') ?>
    <?= $this->Html->css('gigo.css') ?>
   
    <?= $this->Html->css('alertify.min') ?>
    <?= $this->Html->css('alertify.rtl.min') ?>

    <?= $this->Html->css('summernote.css')?>


    <!-- Custom styles for this template -->


    <!--[if lt IE 9]>

    <![endif]-->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
     <?= $this->Html->css('icofont.min.css') ?>
</head>
<body class="sticky-footer">
<?= $this->Element('main_header') ?>

<div class="container-fluid">
    <div class="row">
        
<?= $this->fetch('content') ?>
    </div>
</div>
    

</body>
<!-- Bootstrap core JavaScript -->

<?= $this->Html->script('bootstrap.bundle.js') ?>
<?= $this->Html->script('summernote.js');?>


</html>
