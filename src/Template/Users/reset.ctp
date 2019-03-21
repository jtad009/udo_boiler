<body class="bg-dark">
    <div class="container">
       <div class="row text-center  mx-auto">
                <div class="col-md-8 col-xs-12 mx-auto">
                <br>

                    <?= $this->Html->image('skole_main.png',['alt'=>ucfirst(APP_NAME),'width'=>'140','height'=>140]);?>
                <br>
            </div>
            </div>
    <div class="card card-login mx-auto mt-5">
       <?= $this->Flash->render()?>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your new password.</p>
        </div>
        <?= $this->Form->create(null) ?>
          <div class="form-group  ">
            <input class="form-control"  type="password" aria-describedby="emailHelp" placeholder="Enter new password" name="new_password" id="new_password">

          </div>
          <div class="form-group ">
            <input class="form-control"   type="password" aria-describedby="emailHelp" placeholder="Confirm Password" name="confirm_password" id="confirm_password">
              <div class="form-control-static text-danger small password_confirmation hide">Passwords do not match</div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Reset Password">
       <?= $this->Form->end() ?>
       <div class="text-center">

          <?= $this->Html->link('Login',['controller'=>'users','action'=>'login'],['class'=>'pull-right small mt-3 mr-3 text-danger']) ?>
          
         
        </div>
      </div>
    </div>
  </div>
<script>
    $(document).ready(function(){
        $(document).on('keyup','#new_password',function(){
            $(document).find('#confirm_password').val("");
        });
        $(document).on('keyup','#confirm_password',function(){
            console.log($(this).val() +" "+ $('#new_password').val());
            if($(this).val() !== $('#new_password').val()){
                $('#confirm_password').parent().addClass('alert-danger');
                $('#confirm_password').parent().find('div.password_confirmation').removeClass('hide');
                $('#confirm_password').parent().find('div.password_confirmation').show()
            }else{
                $('#confirm_password').parent().removeClass('alert-danger');
                $('#confirm_password').parent().find('div.password_confirmation').hide()
            }
        });
    });
</script>
</body>