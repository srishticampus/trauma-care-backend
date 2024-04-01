<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
  .form-gap {
    padding-top: 70px;
}
</style>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" action="" class="form" method="post">
    <span id="error1" style="color: red"></span>
                      <div class="form-group" id="eml">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>

<div id="eye" style="display: none;">

<div class="form-group"  >
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close color-blue"></i></span>
                          <input id="password" name="password" required="" placeholder="Enter New Password" class="form-control"  type="password">
                        </div>
                      </div>




                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" id="resetpass" value="Reset Password" type="button">
                      </div>
                    </div>
                     <div class="form-group" >
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" id="reset" value="Reset Password" type="button">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#reset').click(function(){

    var email=$('#email').val();
    if(email==""){
       $('#error1').html('Please Enter Email');

    }
    else{
       $('#error1').html('');
      $('#eye').show();
      $(this).hide();
      $('#eml').hide();
    }


    });
    $('#resetpass').click(function(){
        var email=$('#email').val();
        var password=$('#password').val();
        if(password==""){
          $('#error1').html('Please Enter Password');

        }
        else{
        $.ajax({
          url:"forgot_action.php",
          type:"post",
          data:{email:email,password:password},
          success:function(data){
            if(data==1){
              window.location.href="index.php";
            }

          }



        });
      }

    })

  });

</script>