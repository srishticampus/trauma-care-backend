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
                  
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off"  class="form" method="post">
                      <span id="success"></span>
                      <span id="error1" style="color: red"></span>
    
                      <div class="form-group" id="eml">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-phone color-blue"></i></span>
                          <input id="phone" name="phone" required="" placeholder="Enter Phone Number" class="form-control"  type="text">
                        </div>
                        <br>
                         <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" id="veri" value="Submit" type="button">
                      </div>
                      </div>


<div id="eye1" style="display: none;">
 <span id="error" style="color: red"></span>
  <label>Enter You Date of birth</label>
<div class="form-group"  >

                        <div class="input-group">
                            
                          <span class="input-group-addon"><i class="glyphicon glyphicon-date color-blue"></i></span>
                        
                          <input id="dob" name="dob" required="" placeholder="Enter You Date of birth" class="form-control"  type="date">
                        </div>
                      </div>




                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" id="verify" value="Submit" type="button">
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
                        <input name="recover-submit" style="display: none;" class="btn btn-lg btn-primary btn-block" id="reset" value="Submit" type="button">
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

     
    


    });

      $('#veri').click(function(){
       
       var ph= $('#phone').val();


       if(ph==""){
 $('#error1').html('Please Enter Phone number');
       }else{
        // $('#reset').show();
         $('#veri').hide();
           $('#eye1').show();
      $(this).hide();
      $('#eml').hide();
    

    }


    });

      $('#verify').click(function(){
       
       var dob= $('#dob').val();

       if(dob==""){
 $('#error1').html('Please Enter dob');
       }else{
      $('#eye').show();
      $(this).hide();
      $('#eml').hide();
      // $('#reset').show();
    }


    });
       $('#dob').change(function(){
      var dob=$('#dob').val();
      var phone= $('#phone').val();
      $.ajax({
        url:"forgot_api_action.php",
        type:"post",
        data:{phone:phone,dob:dob},
        success:function(data){
          if(data==0){
          $('#error').html('Wrong Answer.Please Enter Correct Answer');
        }
        else{
            $('#error').html('');
        }

        }

      });



    });
       $('#resetpass').click(function(){
          var dob=$('#dob').val();
      var phone= $('#phone').val();
      var password=$('#password').val();
      $.ajax({
        url:"forgotapi_action.php",
        type:"post",
        data:{phone:phone,password:password,dob:dob},
        success:function(data){
          if(data==1){
            $('#success').html('<div class="alert alert-success" role="alert"> Password Successfull Updated</div>');
          

          }
          else{
            $('#success').html('<div class="alert alert-warning" role="alert">Password Updated Failed</div>');
            

          }

        }
      })


       });

  });
</script>