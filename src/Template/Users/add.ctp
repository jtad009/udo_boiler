<?php
/**
  * @var \App\View\AppView $this
  */
?>


<body >
<div class="container">
    <div class="content">
        <div class="page-body">
            <div class="row text-center  mx-auto">
                <div class="col-md-8 col-xs-12 mx-auto">
                    <br>

                    <p class="text-muted" style="font-size: 40px"> <strong><?= ucfirst(APP_NAME) ?></strong></p>
                    <br>
                </div>
            </div>

            <div id="" class="mx-auto col-md-6 mb-4">
                <?= $this->Flash->render();?>
                <div class="card w-100">
                    <div class="card-body">
                        <h4 class="card-title text-center">Create Administrator's Account</h4>

                        <p class="card-text">

                            <?= $this->Form->create($user) ?>
                            <?php
                            echo $this->Form->input('first_name');
                            echo $this->Form->input('last_name');
                            echo $this->Form->input('username');
                            echo $this->Form->input('password');
                            echo $this->Form->input('address');
                            echo $this->Form->input('telephone');


                            ?>
                            <?= $this->Form->button(__('Submit')) ?>

                        </p>
                        <p class="text-center">
                            <?= $this->Html->link('Login',['controller'=>'auth','action'=>'login'],['class'=>'pull-right small mt-3 mr-3 text-danger']) ?>

                        </p>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
</body>