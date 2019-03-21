<!-- Navigation -->
<?php //debug();?>
    <nav class=" navbar-expand-lg   fixed-top navbar navbar-light bg-white nav-border" >
      <div class="container">
          <span class="text-purple logo-name" style="font-size:25px"><?= ucfirst($configuration['company']['name'])?></span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
<?php if(strtolower($_SESSION['Auth']['User']['role']) == 'admin'): ?>
      
    <?php endif;?>
        <li class=" nav-item">
          <?php $n_count =  isset($_SESSION['notification']) ? '(<b class="text-danger">'.count($_SESSION['notification']).'</b>)' : '(<b class="text-danger">0</b>)';?>
          <?= $this->Html->link(' <i class="fa fa-envelope"></i>&nbsp; '.$n_count,['controller'=>"notifications",'action'=>'index'],['escape'=>false,'class'=>"nav-link text-dark",'data-toggle'=>"tooltip" ,'data-placement'=>"bottom", 'title'=>"Notifications"])?>
          
          
        </li>


        <li class="nav-item"><?= $this->Html->link('<i class="glyphicon glyphicon-log-out"></i> &nbsp;LOGOUT',['controller'=>"users",'action'=>'logout','prefix'=>false,'plugin'=>null],['escape'=>false,'class'=>"nav-link text-dark",'data-toggle'=>"tooltip" ,'data-placement'=>"bottom", 'title'=>"Logout"])?></li>
            
          </ul>
        </div>
      </div>
    </nav>
<!-- header -->

   