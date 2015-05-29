<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BITSO 4.0</title>
    <?php $this->load->view('common');?>   
</head>
<body>
    <div id="wrapper">
          <?php 
                $this->load->view('left2');
          ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">IAL&BPL</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail info as below
                        </div>
                 <form action="<?php echo site_url('ial/ial_bpl/doedit') ?>" method="post" >
                   
                      <input type="hidden" name="id" value="<?php echo isset($id)?$id:0;?>" id="id"/>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                       <div class="col-lg-3" style="z-index: 0">
								<label>RTM:</label>
								   <input type="text" name="ial[RTM]"  value="<?php echo isset($ial['RTM'])?$ial['RTM']:'0000-00-00';?>" class="form-control" data-beatpicker="true" />
							    
							</div>
                            <div class="col-lg-3" style="z-index: 0">
								<label>AD:</label>
								   <input type="text" name="ial[AD]"  value="<?php echo isset($ial['AD'])?$ial['AD']:'0000-00-00';?>" class="form-control" data-beatpicker="true" />
							    
							</div>
			                <div class="col-lg-3" style="z-index: 0">
								<label>EOW:</label>
								   <input type="text" name="ial[EOW]"  value="<?php echo isset($ial['EOW'])?$ial['EOW']:'0000-00-00';?>" class="form-control" data-beatpicker="true" />
							    
							</div>
							<div class="col-lg-3" style="z-index: 0">
								<label>Review_Date:</label>
								   <input type="text" name="ial[review_date]"  value="<?php echo isset($ial['review_date'])?$ial['review_date']:'0000-00-00';?>" class="form-control" data-beatpicker="true" />
							    
							</div>
							
							<div class="col-lg-3" style="z-index: 0">
								<label>Product_Name:</label>
								  <input type="text" name="ial[Product_Name]"  value="<?php echo isset($ial['Product_Name'])?$ial['Product_Name']:'';?>" class="form-control"/>
						    
						   </div>
							<div class="col-lg-3" style="z-index: 0">
								<label>IAL_NO:</label>
								   <input type="text"  name="ial[IAL_NO]"   value="<?php echo isset($ial['IAL_NO'])?$ial['IAL_NO']:''; ?>" class="form-control" /> 
								
							</div>
							<div class="col-lg-3" style="z-index: 0">
								<label>BPL_NO:</label>
								   <input type="text"  name="ial[BPL_NO]"   value="<?php echo isset($ial['BPL_NO'])?$ial['BPL_NO']:''; ?>" class="form-control" /> 
								
							</div>
							
						    <div class="col-lg-3" style="z-index: 0">
								<label>ODT:</label>
								<input type="text" name="ial[ODT]" class="form-control"  value="<?php echo isset($ial['ODT'])?$ial['ODT']:''?>"/>
							  
							</div> 
						
							 <div class="col-lg-3" style="z-index: 0">
								<label>status:</label>
								<select name="ial[status]" class="form-control">
								<?php  foreach($status as $key){ ?>
								    <option value="<?php echo isset($key['stype'])?$key['stype']:''?>" <?php if(isset($ial['status']) && $ial['status']==$key['stype']){echo 'selected';}?> ><?php echo isset($key['stype'])?$key['stype']:''; ?></option> 
								<?php }?>
								</select>
							</div>
							<div class="col-lg-3" style="z-index: 0">
								
								<label>brand:</label>
								<select name="ial[brand]" class="form-control">
								<?php  foreach($brand as $key){ ?>
								    <option value="<?php echo isset($key['bname'])?$key['bname']:''?>" <?php if(isset($ial['brand']) && $ial['brand']==$key['bname']){echo 'selected';}?> ><?php echo isset($key['bname'])?$key['bname']:''; ?></option> 
								<?php }?>
								</select>
								
							</div>
							<div class="col-lg-3" style="z-index: 0">
								
								<label>type_of_IAL:</label>
								<select name="ial[type_of_IAL]" class="form-control">
								<?php  foreach($type as $key){ ?>
								    <option value="<?php echo isset($key['ial_type'])?$key['ial_type']:''?>" <?php if(isset($ial['type_of_IAL']) && $ial['type_of_IAL']==$key['ial_type']){echo 'selected';}?> ><?php echo isset($key['ial_type'])?$key['ial_type']:''; ?></option> 
								<?php }?>
								</select>
							</div>
							<div class="col-lg-3" style="z-index: 0">
								<label>warranty:</label>
								<select name="ial[warranty]" class="form-control">
								<?php  foreach($warranty as $key){ ?>
								    <option value="<?php echo isset($key['warranty_type'])?$key['warranty_type']:''?>" <?php if(isset($ial['warranty']) && $ial['warranty']==$key['warranty_type']){echo 'selected';}?> ><?php echo isset($key['warranty_type'])?$key['warranty_type']:''; ?></option> 
								<?php }?>
								</select>
							</div>
							<div class="">
							<div class="col-lg-3" style="z-index: 0">
								<label>relayware:</label>
								<select name="ial[relayware]" class="form-control">
								    <option value=" " <?php if(isset($ial['relayware']) && $ial['relayware']==''){echo 'selected';}?> ></option> 
								    <option value="YES" <?php if(isset($ial['relayware']) && $ial['relayware']=='YES'){echo 'selected';}?> >YES</option> 
								    <option value="NO" <?php if(isset($ial['relayware']) && $ial['relayware']=='NO'){echo 'selected';}?> >NO</option> 
								</select>
							</div>
						<div class="col-lg-3" style="z-index: 0">
								<label>somo:</label>
								<select name="ial[somo]" class="form-control">
								    <option value=" " <?php if(isset($ial['somo']) && $ial['somo']==''){echo 'selected';}?> ></option> 
								    <option value="YES" <?php if(isset($ial['somo']) && $ial['somo']=='YES'){echo 'selected';}?> >YES</option> 
								    <option value="NO" <?php if(isset($ial['somo']) && $ial['somo']=='NO'){echo 'selected';}?> >NO</option> 
								</select>
							</div>
							<div class="col-lg-3" style="z-index: 0">
								<label>MTM:</label>
								<select name="ial[MTM]" class="form-control">
								    <option value=" " <?php if(isset($ial['MTM']) && $ial['MTM']==''){echo 'selected';}?> ></option> 
								    <option value="YES" <?php if(isset($ial['MTM']) && $ial['MTM']=='YES'){echo 'selected';}?> >YES</option> 
								    <option value="NO" <?php if(isset($ial['MTM']) && $ial['MTM']=='NO'){echo 'selected';}?> >NO</option> 
								</select>
							</div>
							<div class="col-lg-3" style="z-index: 0">
								<label>Curr_User:</label>
								<select name="ial[User]" class="form-control">
								<?php  foreach($user as $key){ ?>
								    <option value="<?php echo isset($key['username'])?$key['username']:''?>" <?php if(isset($key['username']) && $key['username']==$username){echo 'selected';}?> ><?php echo isset($key['username'])?$key['username']:''; ?></option> 
								<?php }?>
								</select>
                            </div></div>
                            <div class="col-lg-12" style="z-index: 0">
                                <label>Comments:</label>
                                <textarea  name="ial[comment]" class="form-control"><?php echo isset($ial['comment'])?$ial['comment']:''?></textarea>
                            </div>
							<div class="col-lg-12" style="z-index: 0">
								<label>Fru_Part_NO:</label>
								<textarea name="ial[Fru_Part_NO]" class="form-control" ><?php echo isset($ial['Fru_Part_NO'])?$ial['Fru_Part_NO']:''?></textarea>
						 </div>
						  <div class="col-lg-12" style="z-index: 0">
								<label>US_part_NO:</label>
								<textarea  name="ial[US_part_NO]" class="form-control" ><?php echo isset($ial['US_part_NO'])?$ial['US_part_NO']:''?></textarea>
							</div>

						<hr/>
						<!--pending list-->
						<?php $this->load->view('pending');?>
						<!-- end -->
                            <p>&nbsp;</p>
						<p style="text-align:center;">
					     <input class="btn btn-primary" type="button" value="Create Issue" id="save">
							<input type="submit"  class="btn btn-success" value="SUBMIT"/></p>
						<p>&nbsp;</p>
						</form>
						<!--add history --->
						<?php $this->load->view('history')?>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			</div>
        <!-- /#page-wrapper -->

    </div>
  <?php  $this->load->view('foot'); ?>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    <?php $this->load->view('his');?>

   </script>
</body>

</html>
