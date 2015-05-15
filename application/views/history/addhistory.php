<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CI login-test</title>
	<script type="text/javascript" src="<?php  echo base_url();?>util/javascript/jquery.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php  echo base_url();?>util/datepicker/WdatePicker.js"></script>
    <link type="text/css" rel="stylesheet" href="<?php  echo base_url();?>util/datepicker/skin/default/datepicker.css" />	
</head>
<body>
<h1>add history page</h1>
<form action="<?php echo site_url('task/changehistory/toaddhistory') ?>" method="post">
<table>

<input name="id"  value="<?php echo isset($id)?$id:0; ?>" type="hidden"/>
      <tr>
         <th class="textR">task<font color="red"></font>：</th>
         <td>
         <select name="hist[t_id]">
         <?php if(count($task)>0){
         	foreach ($task as $key){
         		?>
         		 <option  <?php if(isset($list['t_id']) && $list['t_id']==$key['id']){echo 'selected';} ?>  value=<?php echo isset($key['id'])?$key['id']:''; ?>><?php echo isset($key['POR_Version'])?$key['POR_Version']:''; ?></option>
         		<?php 
         	}
         } ?>
         </select>
     </tr>
       <tr>
         <th class="textR">project<font color="red"></font>：</th>
         <td>
         <select  name="hist[pro_id]">
         <?php if(count($pro)>0){
         	foreach ($pro as $key){
         		?>
         		 <option  <?php if(isset($list['pro_id']) && $list['pro_id']==$key['projectid']){echo 'selected';} ?>  value="<?php echo isset($key['projectid'])?$key['projectid']:''; ?>" ><?php echo isset($key['pname'])?$key['pname']:''; ?></option>
         		<?php 
         	}
         } ?>
         </select>
       </td>
     </tr>
      <tr>
         <th class="textR">change_user<font color="red"></font>：</th>
         <td>
         <select  name="hist[change_user]">
         <?php if(count($user)>0){
         	foreach ($user as $key){
         		?>
         		 <option  <?php if(isset($list['change_user']) && $list['change_user']==$key['username']){echo 'selected';} ?>  value="<?php echo isset($key['username'])?$key['username']:''; ?>" ><?php echo isset($key['username'])?$key['username']:''; ?></option>
         		<?php 
         	}
         } ?>
         </select>
       </td>
     </tr>
      <tr>
         <th class="textR">Time<font color="red"></font>：</th>
         <td><input type="text" name="hist[change_time]" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd H:m:s',el:$dp.$('startTime')})" style="width:160px"  value="<?php echo isset($list['change_time'])?$list['change_time']:''; ?>"/></td>
     </tr>
     <tr>
          <td><input type="SUBMIT" value="SUBMIT"/></td>
     </tr>
     </table>
</form>
</body>
</html>