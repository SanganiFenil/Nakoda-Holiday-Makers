<?php $this->load->view('user/includes/header'); ?>

<div class="site-section">  
    <h1> &nbsp; </h1>
    <div class="container bg-light" style="padding:50px;">
        <h2 align="center" class="text-primary" style="padding-bottom: 30px;">Phone Booking</h2>
        <form action="#" method="post">
        
            <div class="row container d-flex justify-content-center">
            <div class="lo-lg-4 py-2">
                    <span>Enter Phone Number: </span>
                </div>
                <div class="lo-lg-4" style="padding-left:30px;">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="eg: 9999999999" onkeypress="isInputNumber(event)">
                </div>
                <div class="lo-lg-4" style="padding-left:30px;">
                    <input type="submit" name="submit" value="Search" class="btn btn-primary" id="">
                </div>
            </div>
        </form>
        <?php 
                        $count = 0; 
                        if(isset($_POST['submit']))
                        {
                            $count = strlen($_POST['phone']);  
                            if($count < 10 || $count > 10)
                            { ?>
                                <p class="error text-center mt-5 text-danger">Please Enter 10 digit number....</p>
                            <?php 
                            }
                        }
                        if($count == 10)
                        {
                            $phone = $_REQUEST['phone'];
                            $data = $this->User_model->searchPhone($phone);
                            $count = count($data);
                            if($data)
                            {  
                                for($i=0; $i < $count; $i++){ 
                    ?>
          <div class="search_info mt-5">
                    <div class="text-left pt-5">
                
                <table class="table col-lg-6 mx-auto table-borderless">
                    <thead>
                        <tr>
                            <td colspan="2"><h3 class="text-center text-primary">Booking Detail..</h3></td>
                        </tr>
                    </thead>
                    <tbody class="table-borderless">
                        <tr>
                            <th>Name:</th>
                            <td><?php echo $data[$i]['name']?></td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><?php echo $data[$i]['phone']?></td>
                        </tr>
                        <tr>
                            <th>Total Amount:</th>
                            <td><?php echo $data[$i]['fare']?>/-</td>
                        </tr>
                        <tr>
                            <th>Seat Number:</th>
                             <td><?php $info = $this->User_model->serchSeat($data[$i]['booking_id']);
                                    $var_count = count($info);
                                    for($j = 0; $j < $var_count; $j++)
                                    {
                                        echo $info[$j]['seat_number'];
                                        echo ", ";
                                    }   
                            ?></td>   
                        </tr>
                        <tr>
                            <th>PNR Number:</th>
                            <td><?php echo $data[$i]['pnr_no']?></td>
                        </tr>
                        <tr>
                            <th>Booking Date:</th>
                            <td><?php echo $data[$i]['booking_date']?></td>
                        </tr>
                        <tr>
                            <th>Journey Date:</th>
                            <td><?php echo $data[$i]['journey_date']?></td>
                        </tr>
                        <!-- <tr>
                            <th>Seat No:</th>
                            <td><?php echo $ans['phone']?></td>
                        </tr> -->
                       <tr>
                            <th>Payment Status:</th>
                            <?php 
                                if($data[$i]['payment'] == 1)
                                {
                                    echo "<td class=\"text-success\">Success</td>";    
                                }
                                else
                                {
                                    echo "<td class=\"text-danger\">Falied</td>";
                                }
                            ?>
                            
                        </tr>
                        <tr>
                            <th>Booking Status:</th>
                            <?php 
                                if($data[$i]['booking_status'] == 1)
                                {
                                    echo "<td class=\"text-success\">Success</td>";    
                                }
                                else
                                {
                                    echo "<td class=\"text-danger\">Falied</td>";
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } } else { ?>
            <p class="text-center mt-5 text-danger">The Phone Number: <?php echo $_REQUEST['phone'];?> data Not Available....</p>
        <?php 
        } 
        }
        ?>
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