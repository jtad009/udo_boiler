<body class="bg-dark" style="background-image: url('http://localhost/udo/webroot/img/slides/1.jpg') !important;background-size: cover !important; background-repeat: no-repeat !important; ">
 <?= $this->element('site_nav') ?>
    <div class="container">
   
    <div class="col-md-6 col-xs-6 card card-login mx-auto mt-5">
    <?= $this->Flash->render()?>
      <div class="card-body">
        <div class="text-center mt-2 mb-5">
        <h3 class="text-purple slogan bg-white p-3 text-center" style="font-size: 30px"><strong>Forgot your password?<hr/></strong></h3 >
          
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <?= $this->Form->create() ?>
          <div class="form-group">
            <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email address" name="email">
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Reset Password">
        <?= $this->Form->end() ?>
        
        <div class="text-center">
           <?= $this->Html->link('Register a Pharmacy',['controller'=>'auth','action'=>'register'],['class'=>'pull-right mt-3 small text-danger'])?>
          <?= $this->Html->link('Login',['controller'=>'auth','action'=>'login'],['class'=>'pull-right small mt-3 mr-3 text-danger']) ?>
          
         
        </div>
      </div>
    </div>
    <br/>
  </div>
</body>