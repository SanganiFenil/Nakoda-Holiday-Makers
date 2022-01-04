    <?php $this->load->view('user/includes/header'); ?>

        <div class="site-section">  
        <h1> &nbsp; </h1>
            <div class="container">

                <?php 
                    $bus = $this->Common_model->get_route_by_busid($seats['busid']);
                    $totalamt = 0;
                ?>
                <?php if($this->session->userdata('user')) { ?>

                    <form action="<?=base_url('tran')?>" method="post">
                 
                <?php } else { ?>
                   
                    <form action="<?=base_url('login');?>" method="post">

                <?php } ?> 
                    <div class="row bg-light" style="padding: 10px;">
                        <div class="col-lg-4">
                            <h4>Contact Details: </h4>
                            <div style="margin-bottom: 10px;">Full name:</div> <input type="text" name="fullname" id="" class="form-control" required>
                            <div style="margin-bottom: 10px; margin-top: 20px;">Phone:</div><input type="text" name="phone" id="" class="form-control" required>
                            <!-- <div style="margin-bottom: 10px; margin-top: 20px;">Email:</div> <input type="email" name="email" id="" class="form-control" required> -->
                            <input type="hidden" name="busid" id="" value="<?=$seats['busid']?>">
                            <input type="hidden" name="jdate" id="" value="<?=$seats['jdate']?>">
                        </div>
                        <div class="col-lg-4">
                            <h4>Passenger Details: </h4>
                            <div style="margin-bottom: 10px;"></div>
                            <div class="row">
                            <span class="col-3">Seat No.</span>
                            <span class="col-4">Gender</span>
                            </div>
                            <?php if(isset($seats['seat'])){ foreach($seats['seat'] as $s):?>
                                <div class="row container">
                                    <input style="margin-bottom: 10px; margin-top: 10px;" type="text" name="seatno[]" id="" readonly value="<?=$s?>" class="form-control col-3">
                                    <select style="margin-bottom: 10px; margin-top: 10px; margin-left:10px;" name="gender[]" class="col-8 form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>    
                            <?php endforeach; }?>
                        </div>
                        <div class="col-lg-4">
                            <h4>Fare Details:</h4>
                            <h5 class="text-primary"><?=$bus[0]['source']?> To <?=$bus[0]['destination']?></h5>
                            <b class="text-warning"><?=$seats['jdate']?></b>
                            <div class="row">
                                <div class="col-4">
                                    <b> Seat no. </b>
                                </div>
                                <div class="col-4">
                                    <b> Fare </b>
                                </div>
                            </div>
                            <?php if(isset($seats['seat'])){  foreach($seats['seat'] as $s): ?>
                                <div class="row">
                                    <div class="col-4">
                                        <?=$s?>
                                    </div>
                                    <div class="col-4">
                                        &#8377; <?=$bus[0]['fare']?>
                                        <?php $totalamt += $bus[0]['fare']; ?> 
                                    </div>
                                </div>
                            <?php endforeach; }?>
                            <div class="row">
                                <div class="col-4">
                                    <b> Total Payble </b>
                                </div>
                                <div class="col-4">
                                    <b> &#8377; <?= $totalamt ?> </b>
                                    <input type="hidden" name="fare" id="" value="<?=$totalamt?>">
                                </div>
                            </div>
                        <?php if(isset($seats['seat'])){ ?> <input type="submit" name="submit" id="" value="Proceed to payment" class="btn btn-primary btn-md" style="margin-top: 20px;"> <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    <?php $this->load->view('user/includes/footer'); ?>
    <script>

    </script>

    </body>
</html> 