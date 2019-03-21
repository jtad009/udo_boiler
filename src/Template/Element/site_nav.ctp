<!-- Navigation -->
    <nav class=" navbar-expand-lg   fixed-top navbar navbar-light bg-white nav-border" style="">
      <div class="container">
      <span class="logo-name" style="font-size:25px">udo&trade;</span> 
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li> -->
            <li class="nav-item">
              <?= $this->Html->link('HOME',['controller'=>'home', 'action'=>'home'],['class'=>"nav-link text-purple"]) ?>
              
            </li>
             <li class="nav-item">
              <?= $this->Html->link('FEATURES',['controller'=>'home','action'=>'features'],['class'=>"nav-link text-purple"]) ?>
              
            </li>
            <li class="nav-item">
              <?= $this->Html->link('PRICING',['controller'=>'home','action'=>'pricing'],['class'=>"nav-link text-purple"]) ?>
              
            </li>
            
            
            
          </ul>
                 <?= $this->Html->link('SIGN IN',['controller'=>'auth','action'=>'login'],['class'=>"ml-3 nav-link btn btn-purple text-purple"]) ?>
               <?= $this->Html->link('Try it free',['controller'=>'auth','action'=>'register'],['class'=>" nav-link btn btn-outline-purple btn-sm text-purple ml-3",'role'=>"button"]) ?>
           
        </div>
      </div>
    </nav>
    <br/>