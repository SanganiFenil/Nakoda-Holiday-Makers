<!DOCTYPE html>
<html>
<?php $this->load->view('user/includes/header'); ?>

<style type="text/css">
    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box
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
img {
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px
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
    padding: 100px;
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

@media only screen and (max-width: 991px) {
    img {
    border-top-left-radius: 30px;
    border-bottom-left-radius: 0px;
    border-top-right-radius: 30px;

}
}

@media only screen and (min-width: 991px) and (max-width: 1096px) {
.mar{
    padding-top: 0px!important;
    margin-bottom: 0px;
}
}

@media only screen and (max-width: 991px) {   
.mar_top {
    padding-top: 12px!important;
}
.mar_top_two{
    padding-top: 30px!important;
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
                           <h4></h4>
                           <p></p>
                        </div>
                    </div>
                    <div class="col-lg-7 px-5 pt-5" style="padding-bottom: 65px!important;">
                        <div class="align_center">
                         <h1 class="font-weight-bold py-3">Nakoda Buses</h1>
                            <h4 class="mb-4">Change Password</h4>
                            <form action="<?=base_url()?>changePassword" method="post">
                                <div class="form-row">
                                    <div class="col-lg-10 mb-2">
                                    <?php if(isset($_SESSION['success']))
                                    { ?>
                                        <div class="alert alert-success"><?=$_SESSION['success']?></div><?php } 
                                    ?>
                                    <input type="password" class="form-control p-4" placeholder="Enter Old Passwoed" name="oldpass" value="">
                                    <span class="text-danger"><?=form_error('oldpass')?></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-10 mb-2">
                                    <input type="password" class="form-control p-4" placeholder="Enter New Password" name="newpass" value="">
                                    <span class="text-danger"><?=form_error('newpass')?></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-10  mb-2">
                                    <input type="password" class="form-control p-4" placeholder="Re-enter New Password" name="confpass" value="">
                                    <span class="text-danger"><?=form_error('confpass')?></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                                        
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