<?php $this->load->view('admin/includes/head') ?>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white blue-sidebar-color logo-white">
	<div class="page-wrapper">
		<!-- start header -->
		<?php $this->load->view('admin/includes/nav'); ?>
		<!-- end header -->
		
		<!-- start page container -->
		<div class="page-container">

			<!-- start sidebar menu -->
			<?php $this->load->view('admin/includes/sidebar'); ?>
			<!-- end sidebar menu -->

			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Bus booking</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?= base_url('C_admin');?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Bus booking</li>
							</ol>
						</div>
					</div>

					<div class="col-xl-12 container" style="margin: 40px;">
						<form method="post" action="<?=base_url('C_admin/findBus');?>">
							<div class="row align-items-center">

								<div class="col-lg-12 col-xl-3">
									<div>
									<select class="form-control" name="source" id="">
									<option value="">From</option>
										<?php $places = $this->Common_model->fill_source(); 
										foreach($places as $p): 
										if($p['place_name']==set_value('source')){ ?>
											<option value="<?=$p['place_name']?>" selected="selected"><?=$p['place_name']?></option>
										<?php } else { ?>
											<option value="<?=$p['place_name']?>"><?=$p['place_name']?></option>
										<?php } endforeach; ?>
									</select>
									</div>
									<?php echo form_error('source','<span class="ui-state-error-text" style="font-size: 10px";>','</span>'); ?>
								</div>
								<div class="col-lg-12 col-xl-3">
									<div>
									<select class="form-control" name="destination" id="">
									<option value="">To</option>
										<?php
										foreach($places as $p): 
										if($p['place_name']==set_value('destination')){ ?>
											<option value="<?=$p['place_name']?>" selected="selected"><?=$p['place_name']?></option>
										<?php } else { ?>
											<option value="<?=$p['place_name']?>"><?=$p['place_name']?></option>
										<?php } endforeach; ?>
									</select>
									</div>
									<?php echo form_error('destination','<span class="ui-state-error-text" style="font-size: 10px";>','</span>'); ?>
								</div>

								<div class="col-lg-12 col-xl-3 no-sm-border border-right">
									<div>
									<input type="date" name="date" class="form-control txtDate" id="" value="<?=set_value('date')?>">
									<?php echo form_error('date','<span class="ui-state-error-text" style="font-size: 10px";>','</span>'); ?>
									</div>
								</div>

								<div class="col-lg-12 col-xl-2">
									<input type="submit" class="btn btn-primary" value="Search">
									
								</div>
								
							</div>
						</form>
					</div>
					
					<?php if(isset($find) && $find['source']!='' && $find['destination']!='' && $find['date']!=''){ 
						$bus = $this->Common_model->find_bus($find); 
						if(count($bus)>0){ 
							foreach($bus as $b) : 
								$pickups = $this->Common_model->get_pickups($b['bus_id'],$b['source']);
								$drops = $this->Common_model->get_pickups($b['bus_id'],$b['destination']);
								$first_stop_res = $this->Common_model->get_first_stop($b['bus_id'],$b['source']);
								$last_stop_res = $this->Common_model->get_last_stop($b['bus_id'],$b['destination']);
								if(count((array)$last_stop_res)>0)  $lastStop = $last_stop_res->pickup_name ; else $lastStop = 'Not found';
								if(count((array)$first_stop_res)>0) $firstStop = $first_stop_res->pickup_name; else $firstStop = 'Not found';
					
								$seats = $this->Common_model->check_seats($b['bus_id'],$find['date']);
								$seatscount = 30-count($seats);?>

								<div class="buscard-container container bg-white">
									<div>
										<h4><?= date("g:i A",strtotime($b['departure_time']))?>, <?= date("j F",strtotime($find['date']))?></h4>
										<div style="display: flex">
										<p><?=$firstStop;?>,</p>
										<div class="dropdown">
											<div class="btn-group">
											<button
												class="btn btn-secondary btn-sm dropdown-toggle fa fa-arrow-down"
												type="button"
												data-toggle="dropdown"
												aria-haspopup="true"
												aria-expanded="false"
											></button>

												<div class="dropdown-menu pt-0" style="width: auto">
													<div class="d-flex justify-content-between bg-primary text-white p-2">
														<div>parking point</div>
														<div class="col-time">Time</div>
													</div>
													<?php foreach($pickups as $p): ?>
														<div class="d-flex p-2 d-flex justify-content-between">
															<div style="width: 18rem">
															<?=$p['pickup_name'];?>
															</div>
															<div class="col-time"><?= date("g:i A",strtotime($p['time']))?></div>
														</div>
													<?php endforeach; ?>
												</div>
											</div>
											<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
											<button class="dropdown-item" type="button">Action</button>
											<button class="dropdown-item" type="button">
												Another action
											</button>
											<button class="dropdown-item" type="button">
												Something else here
											</button>
											</div>
										</div>
										</div>
									</div>
									<div>
										<p style="display: flex">
										<span class="circlegreen"></span>
										<span class="linespacefill"></span>
										10:15hrs
										<span class="linespacefill"></span>
										<span class="circlered"></span>
										</p>
										<p class="text-center bg-primary text-white rounded">88% On Time</p>
									</div>
									<div>
										<h4> <?= date("g:i A",strtotime($bus[0]['destination_time']))?>,
       										 <?php $dtdate = $find['date']; echo date("j F",strtotime("$dtdate +1 day"));?></h4>
										<p><?=$lastStop;?></p>
										<p><?=$b['bus_name'];?></p>
									</div>
									<div>
										<h4>&#8377; <?=$b['fare']?></h4>
										<p><?=$seatscount?> Berths Left</p>
										<span class="btnSelectSeat">
										<button class="btn btn-success" data-cls="ss<?=$b['bus_id']?>">select seat</button>
									</div>
								</div>
								<div class="col-lg-12">
									<form method="post" action="<?=base_url('C_admin/confirmTicket')?>">
													<input type="hidden" name="busid" id="" value="<?=$bus[0]['bus_id']?>">
													<input type="hidden" name="jdate" id="" value="<?=$find['date']?>">
									<div class="row selectSeat" style="margin-top: 30px;" id="ss<?=$b['bus_id']?>">
										<div class="col-lg-5 col-12">
											<h4> Select Seat </h4>
											
											
											<div class="btn-group btn-group-toggle" data-toggle="buttons">
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
								</span>
							<?php endforeach; } else { ?>
								<h1 align="center">No bus found</h1>
							<?php } ?>
					<?php } else { ?>
						<h1 align="center">Search for bus..</h1>
					<?php } ?>
					
				</div>
			</div>
			<!-- end page content -->
		
		</div>
		<!-- end page container -->

		<!-- start footer -->
		<?php $this->load->view('admin/includes/footer'); ?>

		<script>
			$('.selectSeat').hide();
			$('.btnSelectSeat').click(function(){
				$('.selectSeat').toggle();
			});
		</script>
		
		<script>
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
		<!-- end js include path -->
</body>

</html>