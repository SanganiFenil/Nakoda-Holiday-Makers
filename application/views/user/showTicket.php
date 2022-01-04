<?php
  header("Pragma: no-cache");
  header("Cache-Control: no-cache");
  header("Expires: 0");
?>
<?php $this->load->view('user/includes/header'); ?>

    <div class="site-section">
      <h1> &nbsp; </h1>
      <div class="container">
        <div class="form-search-wrap p-2">
          <form method="post" action="<?=base_url('modifyResult')?>">
            <div class="row align-items-center">
              <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                <div class="select-wrap">
                  <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                  <select class="form-control" name="source" id="source">
                    <?php $places = $this->User_model->fill_source(); 
                    foreach($places as $p): 
                      if($find['source'] != '' && $find['source'] == $p['place_name'] || $p['place_name'] == set_value('source')){?>
                        <option value="<?=$p['place_name']?>" selected = "selected"><?=$p['place_name']?></option>
                      <?php } else {?>
                    <option value="<?=$p['place_name']?>"><?=$p['place_name']?></option>
                    <?php } endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-12 col-xl-3 no-sm-border border-right">
              <div class="select-wrap">
                  <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                  <select class="form-control" name="destination" id="destination">
                        <?php
                        foreach($places as $p): 
                          if($find['destination'] != '' && $find['destination'] == $p['place_name'] || $p['place_name'] == set_value('destination')){?>
                            <option value="<?=$p['place_name']?>" selected = "selected"><?=$p['place_name']?></option>
                          <?php } else {?>
                            <option value="<?=$p['place_name']?>"><?=$p['place_name']?></option>
                        <?php } endforeach; ?>
                      </select>
                </div>
              </div>
              <div class="col-lg-12 col-xl-3">
              <div class="wrap-icon">
                  <?php if($find['destination'] != '' && $find['destination'] == $p['place_name']) { ?>
                    <input type="date" name="date"class="form-control txtDate" value="<?=$find['date']?>">
                  <?php } else { ?>
                    <input type="date" name="date"class="form-control txtDate" value="<?=set_value('date')?>">
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-12 col-xl-2 ml-auto text-right">
                <input type="submit" class="btn btn-primary" value="Modify">
              </div>
            </div>
          </form>
        </div>


        <?php $bus = $this->Common_model->find_bus($find);
          if(count($bus)>0){
            $pickups = $this->Common_model->get_pickups($bus[0]['bus_id'],$bus[0]['source']);
            $drops = $this->Common_model->get_pickups($bus[0]['bus_id'],$bus[0]['destination']);
            $first_stop_res = $this->Common_model->get_first_stop($bus[0]['bus_id'],$bus[0]['source']);
            $last_stop_res = $this->Common_model->get_last_stop($bus[0]['bus_id'],$bus[0]['destination']);
            if(count((array)$last_stop_res)>0)  $lastStop = $last_stop_res->pickup_name ; else $lastStop = 'Not found';
            if(count((array)$first_stop_res)>0) $firstStop = $first_stop_res->pickup_name; else $firstStop = 'Not found';

            $seats = $this->Common_model->check_seats($bus[0]['bus_id'],$find['date']);
            $seatscount = 30-count($seats);
        ?>
        <!-- <pre> -->
         <!-- <?php print_r($seats); ?> -->



  <div class="row justify-content-center mb-5 py-5">
    <!-- <div class="col-md-7 text-center border-primary">
        <h2 class="font-weight-light text-primary"><?=$bus[0]['source']?> to <?=$bus[0]['destination']?></h2>
        <p class="color-black-opacity-5"><?php echo'Date: '.date("d/m/Y",strtotime($find['date']));?></p>
    </div> -->
  </div>
  <div class="row">
         
    <div class="buscard-container container col-11" style="margin-top: -50px;">
      <div class="col-lg-3 col-md-4 col-6">
        <h4><?= date("g:i A",strtotime($bus[0]['departure_time']))?>, <?= date("j F",strtotime($find['date']))?></h4>
        <div style="display: flex">
          <p><?=$firstStop;?>  </p> 
        </div>
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Pickup points &#x2193;</button>
          <!-- model start -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Pickup Points</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <?php foreach($pickups as $p): ?>
                    <div class="row">
                      <div class="col-9"><b><?=$p['pickup_name'];?></b></div> <div class="col-3" ><?= date("g:i A",strtotime($p['time']))?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!-- model end -->
        
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <p style="display: flex">
          <span class="circlegreen"></span>
          <span class="linespacefill"></span>
          10:15hrs
          <span class="linespacefill"></span>
          <span class="circlered"></span>
        </p>
        <p class="text-center bg-primary text-white rounded">88% On Time</p>
      </div>
      <div class="col-lg-3 col-md-4 col-6 text-center">
        <h4>
        <?= date("g:i A",strtotime($bus[0]['destination_time']))?>,
        <?php $dtdate = $find['date']; echo date("j F",strtotime("$dtdate +1 day"));?>
         </h4>
        <p><?=$lastStop;?></p>
        <p><?=$bus[0]['bus_name'];?></p>
      </div>
      <div class="col-lg-3 col-md-4 col-6 text-center">
        <h4>&#8377; <?=$bus[0]['fare']?></h4>
        <p><?=$seatscount?> Berths Left</p>
        <a href="#btnSelectSeat"><button class="btn btn-success" id="btnSelectSeat">select seat</button></a>
      </div>
    </div>
  </div>
  
  <div class="col-lg-12">
    <form method="post" action="<?=base_url('confirmTicket')?>">
                      <input type="hidden" name="busid" id="" value="<?=$bus[0]['bus_id']?>">
                      <input type="hidden" name="jdate" id="" value="<?=$find['date']?>">
      <div class="row" style="margin-top: 30px;" id="selectSeat">
          <div class="col-lg-5 col-12">
              <h4> Select Seat </h4>
              
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <?php $seatStatus = 'btn btn-primary disabled seat'; ?>
                  <table align="center">
                      <tr>
                          <td class="btn-group btn-group-toggle">
                              <label class=" seat"> <span>LB</span> </label>
                          </td>
                          <td class="btn-group btn-group-toggle">
                              <label class=" seat"> <span>UB</span> </label>
                          </td>
                          <td class="btn-group btn-group-toggle">
                              <label class=" seat"> <span></span> </label>
                          </td>
                          <td class="btn-group btn-group-toggle">
                              <label class=" seat"> <span>LB</span> </label>
                          </td>
                          <td class="btn-group btn-group-toggle">
                              <label class=" seat"> <span>LB</span> </label>
                          </td>
                          <td class="btn-group btn-group-toggle">
                              <label class=" seat"> <span>UB</span> </label>
                          </td>
                          <td class="btn-group btn-group-toggle">
                              <label class=" seat"> <span>UB</span> </label>
                          </td>
                      </tr>
                      <?php $temp=0; $seatno = 1; for($i=1; $i<=5; $i++){ ?>
                      <tr>
                          <?php for($j=1; $j<=7; $j++){ 
                              if($j != 3){
                                  if(count($seats)<1){ 
                                    $checkseat = 0; 
                                  } else {
                                    $checkseat = $seats[$temp]['seat_number'];
                                    $gender = $seats[$temp]['gender']; 
                                  }
                                  if($seatno == $checkseat && $gender == 'Male'){?>
                                  
                                      <td class="btn-group btn-group-toggle">
                                          <label class="btn btn-secondary disabled btnclass seat">
                                              <input type="checkbox" autocomplete="off" name="seat[]" value="<?= $seatno;?>"> <?= $seatno;?>
                                          </label>
                                      </td>
                                  <?php $temp++; $seatno++; if($temp >= count($seats)) $temp=0; 
                                  } 
                                  elseif($seatno == $checkseat && $gender == 'Female'){?>

                                      <td class="btn-group btn-group-toggle">
                                          <label class="btn btn-danger disabled btnclass seat">
                                              <input type="checkbox" autocomplete="off" name="seat[]" value="<?= $seatno;?>"> <?= $seatno;?>
                                          </label>
                                      </td>

                                  <?php $temp++; $seatno++; if($temp >= count($seats)) $temp=0; }  else { ?>
                                      <td class="btn-group btn-group-toggle">
                                          <label class="btn btn-light btnclass seat">
                                              <input type="checkbox" autocomplete="off" name="seat[]" value="<?= $seatno;?>"> <?= $seatno;?>
                                          </label>
                                      </td>
                              <?php $seatno++; if($temp >= count($seats)) $temp=0; }
                          } else {?>
                              <td class="btn">
                          
                              </td>
                          <?php } } ?>
                      </tr>
                      <?php } ?>    
                      
                  </table>
                  
                    
              </div>  
          </div>
          <!-- <div class="col-lg-4">
              <div class="row container">
                  <h4>Ticket details:</h4>
                  <span id="Fare"></span>              
              </div>
          </div> -->
          <div class="col-lg-7">
              <div class="row container">
                  <h4>Pickup/Drop:</h4>
                  <h1> &nbsp; </h4>
                  <div class="col-lg-12">
                      <!-- <div style="margin-bottom: 10px;">Full name:</div> <input type="text" name="fullname" id="" class="form-control">
                      <div style="margin-bottom: 10px; margin-top: 20px;">Phone:</div><input type="text" name="phone" id="" class="form-control">
                      <div style="margin-bottom: 10px; margin-top: 20px;">Email:</div> <input type="email" name="email" id="" class="form-control">
                      <div style="margin-bottom: 10px; margin-top: 20px;"></div> <input type="Submit" name="submit" id="" value="Confirm Tickit" class="btn btn-primary"> -->
                      <div style="margin-bottom: 10px; margin-top: 20px;">Pickup point:</div> 
                      <select name="pickupPoint" id="" class="form-control">
                      <?php foreach($pickups as $p): ?>
                        <option value="<?=$p['pickup_id']?>"><?=$p['pickup_name']?> <b style="float:right;position:flex;"><?= date("g:i A",strtotime($p['time']))?></b></option>
                      <?php endforeach; ?>
                      </select>
                      <div style="margin-bottom: 10px; margin-top: 20px;">Drop point:</div> 
                      <select name="dropPoint" id="" class="form-control">
                      <?php foreach($drops as $d): ?>
                        <option value="<?=$d['pickup_id']?>"><?=$d['pickup_name']?> <b style="float:right;position:flex;"><?= date("g:i A",strtotime($d['time']))?></b></option>
                      <?php endforeach; ?>
                      </select>
                      <div style="margin-bottom: 10px; margin-top: 20px;"></div> <input type="Submit" name="submit" id="" value="Provide Passenger Details" class="btn btn-primary">
                  </div>
              </div>
              
          </div>
          
      </div> 
    </form>
  </div>
    
        
  <?php } else { ?>
    
      <h1 class="text-danger" style="margin-top: 40px;"> Sorry..!</h1>
      <h3 class="text-warning">No Bus found on selected date or route..!</h3>
  <?php } ?>

     
      </div>
    </div>

    <?php $this->load->view('user/includes/footer'); ?>
    <script>
      $('#selectSeat').hide();
      $('#btnSelectSeat').click(function(){
        $('#selectSeat').toggle();
      });
      $(function(){
        var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var minDate= year + '-' + month + '-' + day;
        
        $('.txtDate').attr('min', minDate);
    });
    </script>

    </body>
</html> 