<?php
include_once 'blocks/header.php';
echo $_GET['fullname'];
?>

<script type="text/javascript">
     $(document).ready(function() {

    var enrollType;
  //  $("#div_id_As").hide();
    $("input[name='As']").change(function() {
        memberType = $("input[name='select']:checked").val();
        providerType = $("input[name='As']:checked").val();
        toggleIndividInfo();
    });
    
    $("input[name='select']").change(function() {
        memberType = $("input[name='select']:checked").val();
        toggleIndividInfo();
        toggleLearnerTrainer();
    });
    
    function toggleLearnerTrainer() {

    if (memberType == 'P' || enrollType=='company') {
        $("#cityField").hide();
        $("#providerType").show();
        $(".provider").show();
        $(".locationField").show();
        if(enrollType=='INSTITUTE'){
            $(".individ").hide();
        }
    
    } 
    else {
        $("#providerType").hide();
        $(".provider").hide();
        $('#name').show();
        $("#cityField").hide();
        $(".locationField").show();
        $("#instituteName").hide();
        $("#cityField").show();
        
    }
    }
    function toggleIndividInfo(){

    if(((typeof memberType!=='undefined' && memberType == 'TRAINER')||enrollType=='INSTITUTE') && providerType=='INDIVIDUAL'){
        $("#instituteName").hide();
        $(".individ").show();
        $('#name').show();
    }
    else if((typeof memberType!=='undefined' && memberType == 'TRAINER')|| enrollType=='INSTITUTE'){
        $('#name').hide();
        $("#instituteName").show();
        $(".individ").hide();
    }
    }
</script>
 <?php $userLogged = $_SESSION['userLogged'] ? $_SESSION['userLogged'] : array(); ?>
<form class="form-signin" method="post" action="">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel panel-primary">
                    <h3 class="text-center">Thông tin cá nhân</h3>
                        <div class="panel-body">   
                            <form action="#" method="get">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <input class="form-control" type="text" name="fullname" required="" value="<?php echo $userLogged['fullname'] ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                                        <input class="form-control" type="text" name="address" required="" value="<?php echo $userLogged['address'] ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span>
                                        </span>
                                        <input class="form-control" type="text" name="phone" required="" value="<?php echo $userLogged['phone'] ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                        <input class="form-control" type="email" name="email" required="" value="<?php echo $userLogged['email'] ?>"/>
                                    </div>
                                </div>                                  
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php
include_once 'blocks/footer.php';
?>