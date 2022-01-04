<?php $this->load->view('user/includes/header'); ?>

<div class="site-section">  
    <h1> &nbsp; </h1>
    <div class="container bg-light" style="padding:50px;">
        <h2 align="center" class="text-primary">Cancle Booking</h2>
        <h6 class="text-danger d-flex justify-content-center" style="padding-bottom: 30px;">Note: Amount are not refundable..!</h6>
        <form action="<?=base_url('delete_ticket');?>" method="POST">
        
            <div class="row container d-flex justify-content-center">
            <div class="lo-lg-4 py-2">
                    <span>Enter PNR Number: </span>
                </div>
                <div class="lo-lg-4" style="padding-left:30px;">
                    <input type="text" name="pnr_text" id="pnr_text" class="form-control" placeholder="eg: 11234567890" onkeypress="isInputNumber(event)">
                </div>
                <div class="lo-lg-4" style="padding-left:30px;">
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                </div>
            </div>
            <div class="mt-4">
                <p class="text-success text-center"><?= $this->session->flashdata('del_bus');?></p>
                <p class="text-danger text-center"><?= $this->session->flashdata('del_bus_failed');?></p>
            </div>
        </form>
    </div>
</div>

<?php $this->load->view('user/includes/footer'); ?>
<script>
                function isInputNumber(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[0-9]/.test(ch))){
                    evt.preventDefault();
                }
                
            }
</script>

</body>
</html> 