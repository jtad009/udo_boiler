<?php
/**
 * @var \App\View\AppView $this
 */
?>
<body >
     
<div class="container">
    <div class="content">
        <div class="page-body">
            

            <div id="" class="mx-auto col-md-6 mb-4">
                <?= $this->Flash->render();?>
                <div class="card w-100">
                    <div class="card-body">
                       <h4 class="text-purple slogan bg-white p-3 text-center" style="font-size: 30px"><strong>Login Page<hr/></strong></h4 >

                        <p class="card-text">
                            <?= $this->Form->create() ?>

                        <div class="form-group">
                            <label for="username" class="uname" > Your  username </label>
                            <input id="username" name="username" required="required" type="text" placeholder="myusername" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                            <input id="password" class="form-control" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-primary" style="width:100%" />
                        </div>
                        <p class="text-center">

                            <?php echo $this->Html->link('Register a Store',['controller'=>'auth','action'=>'register'],['class'=>'pull-right small mt-3 mr-3 text-purple'])?>
                            <?= $this->Html->link('Forgot Password',['controller'=>'auth','action'=>'forgot'],['class'=>'pull-right small mt-3 mr-3 text-purple'])?></p>

                        <?php //$this->Html->link('Forgot Password',['controller'=>'auth','action'=>'forgot'],['class'=>'pull-right small mt-3 mr-3 text-danger'])?></p>
                        <?= $this->Form->end() ?>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>



</div>

</body>

