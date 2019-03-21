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

$cakeDescription = strtoupper(APP_NAME).' BEST INVENTORY SYSTEM FOR SME\'s.';
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
    <?= $this->Html->meta('icon') ?>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Nunito:300,400" rel="stylesheet"> 
    
   <!-- Bootstrap core CSS -->
    <?= $this->Html->css('bootstrap.min.css') ?>
   <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('business.css') ?>
      <?= $this->Html->css('icofont.min.css') ?>
      
    <!-- Custom styles for this template -->


    <!--[if lt IE 9]>

    <![endif]-->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

            <?= $this->fetch('content') ?>
            <br/>
             <?=$this->element('footer')?>  

<!-- Bootstrap core JavaScript -->
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.bundle.js') ?>
<?= $this->Html->script('shout.js');?>
<?= $this->Html->script('lightbox.min.js');?>


</html>
