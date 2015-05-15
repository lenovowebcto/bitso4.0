<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div class="m">
	<div class="breadcrumb"><a href="#">History</a> &gt; <a href="#">HistoryList</a></div>
</div>
<div class="m container clearfix">
	<div class="main">
    	<div class="title"><h2>History List </h2></div>
        <div class="baseInfo">
            <div>
         <div class="tabList">
        <table>
        	<thead>
            	<tr>
            	    <th style="width:20px;">task_id</th>
            	    <th style="width:30px;">project</th>
            	    <th style="width:30px;">changeuser</th>
            	    <th style="width:50px;">changetime</th>
                    <th style="width:50px;">operate</th>
                </tr>
            </thead>
    <?php
		if(count($list)==0):
			?>
				<tr><td colspan='11'>No Data</td></tr>
			<?php
			  endif;
              for($i = 0;$i<count($list); $i++){
			?>
					<tr>
						<td><a href="<?php echo site_url('task/changehistory/addhistory') ?>?id=<?php echo isset($list[$i]["id"]) ?$list[$i]["id"]:""?>"><?php echo isset($list[$i]['id']) ?$list[$i]['id']:'';?></a></td>
						<td><?php echo isset($list[$i]['pname']) ?$list[$i]['pname']:'';?></td>
						<td><?php echo isset($list[$i]['change_user']) ?$list[$i]['change_user']:'';?></td>
						<td><?php echo isset($list[$i]['change_time']) ?$list[$i]['change_time']:'';?></td>
						<td><?php echo isset($list[$i]['oper']) ?$list[$i]['oper']:'';?></td>
					</tr>
						<?php } ?>
			</table>
    </div>
    </div>
      </div>
    </div>
</body>
</html>

