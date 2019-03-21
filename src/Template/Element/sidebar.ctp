<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar" style="border-right: thin solid #868e96 !important">
     <br/>
          <ul class="nav nav-pills flex-column user-menu">
            <li class="nav-item">
                <?= $this->Html->link('<i class="glyphicon glyphicon-asterisk hidden-sm"></i> Dashboard',['controller'=>'users','action'=>'dashboard','prefix'=>null],['class'=>"nav-link ",'escape'=>false,])?>
                    
                </li>
            <li class="nav-item">
            <?= $this->Html->link('<i class="glyphicon glyphicon-search  hidden-sm"></i> Influencers',['controller'=>'niches','action'=>'browse','all'],['escape'=>false,'class'=>"nav-link"])?>
                
            </li>
        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-briefcase  hidden-sm"></i> Wallet',['controller'=>'wallets','action'=>'add','prefix'=>null],['escape'=>false,'class'=>"nav-link"])?></li>
         
        <li>
          </ul>

          <ul class="nav nav-pills flex-column user-menu">
             
             <li class="nav-item">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
                    <i class="glyphicon glyphicon-shopping-cart  hidden-sm"></i> Orders  <span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span> 
                </a>
             
                 <ul class="collapse list-unstyled" id="homeSubmenu">

                    <li class="nav-item">
                        <?php
                            $total_orders = isset($_SESSION['order_count']) ? $_SESSION['order_count'] : 0;
                        ?>
                        
                        <?= $this->Html->link('<i class="glyphicon glyphicon-time  hidden-sm"></i> My Orders <span class="badge badge-primary pull-right text-white" style="">'.$total_orders.'</span>',['controller'=>'Orders','action'=>'index','prefix'=>null],['escape'=>false,'class'=>"nav-link"]) ?>
                    </li >
                <!-- <li>
                    <?= $this->Html->link('<i class="glyphicon glyphicon-ok  hidden-sm"></i> Completed <span class="badge badge-primary pull-right">5</span>',['controller'=>'Orders','action'=>'completed',$user_id,'prefix'=>null],['escape'=>false, 'class'=>"nav-link"]) ?>
                    
                </li> -->
                <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-edit  hidden-sm"></i> Create a Campaign',['controller'=>'orders','action'=>"add",'prefix'=>null],['escape'=>false, 'class'=>"nav-link"]) ?>
                </li>
                
                
              </ul>
            
        </li>
          </ul>

          <ul class="nav nav-pills flex-column">
             <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-leaf  hidden-sm"></i> Disputes',['controller'=>'disputes','action'=>'index'],['escape'=>false,'class'=>'nav-link'])?></li>
        <li><?= $this->Html->link('<i class="glyphicon glyphicon-plus  hidden-sm"></i> Accounts',['controller'=>'accounts','action'=>'add'],['escape'=>false,'class'=>'nav-link'])?></li>
          </ul>
        </nav>
