<!DOCTYPE html>
<html>
<?php $this->load->view('user/includes/header'); ?>

<style type="text/css">
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box
}
input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
}
.div_row {
    background: white;
    border-radius: 30px;
    box-shadow: 12px 12px 22px grey;
    margin-top: 50px;
}
.txt:hover {
    text-decoration: none;
}
.my-5 {
    margin-top: 4rem!important;
}

.icon_one{
    position: relative;
}
.icon_one i{
    position: absolute;
    top: 0;
    padding: 12px;
    font-size: 24px;
}
.form-row {
    display: block;
}
.pad{
    padding: 100px 70px;
}
.pro_user{
    background-image: linear-gradient(90deg, #7203bb, #3364f5);
    color: #FFFFFF;
    display: flex;
    justify-content: center;
    text-align: center;
    align-items: center;
    border-radius: 30px 0 0 30px;
}
.pro_email{
    width: 50%;
    float: left;   
}

@media only screen and (max-width: 500px) { 
.div_row{
    box-shadow: none;
}
.pro_user{
    border-radius: 0!important;

}  
.pad{
    padding: 32px 0 0;
}
}

@media only screen and (max-width: 991px) {
.pro_user{
    border-radius: 30px 30px 0 0;
    height: 300px;
}
.mar_top {
    padding-top: 12px!important;
}
.mar_top_two{
    padding-top: 30px!important;
}
}

@media only screen and (min-width: 991px) and (max-width: 1096px) {
.mar{
    padding-top: 0px!important;
    margin-bottom: 0px;
}
}
</style> 
<body>
        <section class="form pad">
            <div class="contanier">
                <div class="row no-gutters div_row">
                    <div class="col-lg-5 pro_user">
                        <div>
                           <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-fluid"alt="User-Profile-Image">
                           <h4><?=$fetch[0]['fullname']?></h4>
                           <p></p>
                        </div>
                    </div>
                    <div class="col-lg-7" style="padding: 65px!important;">
                        <div class="align_center">
                         <h1 class="font-weight-bold">Nakoda Buses</h1>
                            <h4 class="mb-4">User Profile</h4>
                            <form action="<?=base_url()?>updateProfile" method="post">
                                <div class="col-lg-12 mb-2">
                                    <?php if(isset($_SESSION['success']))
                                    { ?>
                                        <div class="alert alert-success"><?=$_SESSION['success']?></div><?php } 
                                    ?>
                                </div>
                                <div class="row">                     
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2 p-0">
                                        <div class="mb-2 px-3">
                                            <h6>User Name</h6>
                                            <input type="text" class="form-control p-4" name="fullname" value="<?=$fetch[0]['fullname']?>"/>
                                            <span class="text-danger"><?=form_error('fullname')?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">   
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2 p-0">
                                        <div class="mb-2 px-3">
                                            <h6>Email Id</h6>
                                            <input type="text" class="form-control p-4" name="email" value="<?=$fetch[0]['emailid']?>"/>
                                            <span class="text-danger"><?=form_error('email')?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2 p-0">
                                        <div class="mb-2 px-3">
                                            <h6>Phone Number</h6>
                                            <input type="text" class="form-control p-4" name="contect" value="<?=$fetch[0]['contectno']?>"/>
                                            <span class="text-danger"><?=form_error('contect')?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2 p-0">
                                        <div class="mb-2 px-3">
                                            <h6>Password</h6>
                                            <input type="password" class="form-control p-4" name="pass" value="<?=md5($fetch[0]['password']);?>"/>
                                            <p class="text-right"><a class="txt" href="<?=base_url('chngPass')?>">Change Password?</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary btn-block">Update Profile</button>  
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>           
        </section>

        <?php $this->load->view('user/includes/footer'); ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>