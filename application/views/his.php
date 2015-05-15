function dis(){
        var id = document.getElementById('cl');
        var hty = document.getElementById('dhistory');
       if(hty.style.display == "none"){
              id.setAttribute('class','fa fa-minus');
              hty.style.display = 'block';
         }else if(hty.style.display = 'block'){
              id.setAttribute('class','fa fa-plus');
              hty.style.display = 'none';
         }
        }
        
       
	function move(e){
		$(e).parent().parent().remove();
		}
    $(document).ready(function() {
    
        $('#dataTables-example').DataTable({
        responsive: true
        });
		
		$("#showhistory").click(function(){
		$("dhistory").hide();
		});
      <?php if(isset($pen) && $pen!=array()){$index = count($pen);}else{ $index=0;}?>
         var index = <?php echo $index;?> ;
		$("#save_opt").click(function(){
		
            var str="<div class='modal-body col-lg-12' id='"+index+"'><div class='col-lg-2'><label>Category1:</label><select name='c1["+index+"]' class='form-control' id='"+index+"' onchange='aa($(this))'><?php  foreach($category1 as $key){?><option  value=<?php echo isset($key['id'])?$key['id']:''; ?>><?php echo isset($key['cate_name'])?$key['cate_name']:''; ?></option> <?php }?></select></div><div class='col-lg-2'><label>Category2:</label><select name='c2["+index+"]' class='form-control' id='c"+index+"'><?php  foreach($category2 as $key){?><option value=<?php echo isset($key['id'])?$key['id']:''; ?>><?php echo isset($key['nc_name'])?$key['nc_name']:''; ?></option> <?php }?></select></div><div class='col-lg-2'><label>Pending Issue:</label><input class='form-control' name='pending["+index+"]'></div><div class='col-lg-3'><label>Status:</label><select name='sta["+index+"]' class='form-control'><?php  foreach($status as $key){?><option id=<?php echo isset($key['sid'])?$key['sid']:''; ?>><?php echo isset($key['stype'])?$key['stype']:''; ?></option> <?php }?></select></div><div class='col-lg-3'><label></label><input type='button' class='btn btn-primary del' onclick='move(this)' value='delete' style='margin-top: 25px;' /></div></div>" ;
                 $("#pending_opt").append(str);
                 index++;
			});
			
			$("#save_svc").click(function(){
		
            var str="<div class='modal-body col-lg-12' id='"+index+"'><div class='col-lg-2'><label>Category1:</label><select name='c1["+index+"]' class='form-control' id='"+index+"' onchange='aa($(this))'><?php  foreach($category1 as $key){?><option  value=<?php echo isset($key['id'])?$key['id']:''; ?>><?php echo isset($key['cate_name'])?$key['cate_name']:''; ?></option> <?php }?></select></div><div class='col-lg-2'><label>Category2:</label><select name='c2["+index+"]' class='form-control' id='c"+index+"'><?php  foreach($category2 as $key){?><option value=<?php echo isset($key['id'])?$key['id']:''; ?>><?php echo isset($key['nc_name'])?$key['nc_name']:''; ?></option> <?php }?></select></div><div class='col-lg-2'><label>Pending Issue:</label><input class='form-control' name='pending["+index+"]'></div><div class='col-lg-3'><label>Status:</label><select name='sta["+index+"]' class='form-control'><?php  foreach($status as $key){?><option id=<?php echo isset($key['sid'])?$key['sid']:''; ?>><?php echo isset($key['stype'])?$key['stype']:''; ?></option> <?php }?></select></div><div class='col-lg-3'><label></label><input type='button' class='btn btn-primary del' onclick='move(this)' value='delete' style='margin-top: 25px;' /></div></div>" ;
                 $("#pending_svc").append(str);
                 index++;
			});
			
			$("#save_comp").click(function(){
            var str="<div class='modal-body col-lg-12' id='"+index+"'><div class='col-lg-2'><label>Category1:</label><select name='c1["+index+"]' class='form-control' id='"+index+"' onchange='aa($(this))'><?php  foreach($category1 as $key){?><option  value=<?php echo isset($key['id'])?$key['id']:''; ?>><?php echo isset($key['cate_name'])?$key['cate_name']:''; ?></option> <?php }?></select></div><div class='col-lg-2'><label>Category2:</label><select name='c2["+index+"]' class='form-control' id='c"+index+"'><?php  foreach($category2 as $key){?><option value=<?php echo isset($key['id'])?$key['id']:''; ?>><?php echo isset($key['nc_name'])?$key['nc_name']:''; ?></option> <?php }?></select></div><div class='col-lg-2'><label>Pending Issue:</label><input class='form-control' name='pending["+index+"]'></div><div class='col-lg-3'><label>Status:</label><select name='sta["+index+"]' class='form-control'><?php  foreach($status as $key){?><option id=<?php echo isset($key['sid'])?$key['sid']:''; ?>><?php echo isset($key['stype'])?$key['stype']:''; ?></option> <?php }?></select></div><div class='col-lg-3'><label></label><input type='button' class='btn btn-primary del' onclick='move(this)' value='delete' style='margin-top: 25px;' /></div></div>" ;
                 $("#pending_comp").append(str);
                 index++;
			});
			$("#save").click(function(){
            var str="<div class='modal-body col-lg-12' ><div class='col-lg-2'><label>Category1:</label><select name='c1["+index+"]' class='form-control' id='"+index+"' onchange='aa($(this))'><?php  foreach($category1 as $key){?><option  value=<?php echo isset($key['id'])?$key['id']:''; ?>><?php echo isset($key['cate_name'])?$key['cate_name']:''; ?></option> <?php }?></select></div><div class='col-lg-2'><label>Category2:</label><select name='c2["+index+"]' class='form-control' id='c"+index+"'><?php  foreach($category2 as $key){?><option value=<?php echo isset($key['id'])?$key['id']:''; ?>><?php echo isset($key['nc_name'])?$key['nc_name']:''; ?></option> <?php }?></select></div><div class='col-lg-2'><label>Pending Issue:</label><input class='form-control' name='pending["+index+"]'></div><div class='col-lg-3'><label>Status:</label><select name='sta["+index+"]' class='form-control'><?php  foreach($status as $key){?><option id=<?php echo isset($key['sid'])?$key['sid']:''; ?>><?php echo isset($key['stype'])?$key['stype']:''; ?></option> <?php }?></select></div><div class='col-lg-2'><label></label><input type='button' class='btn btn-primary del' onclick='move(this)' value='delete' style='margin-top: 25px;' /></div></div>" ;
                 $("#pending_issue").append(str);
                 index++;
			});
           $("#btn").click(function(){
	           var url = $("#url").val();
	           var id  = $("#id").val();
               var val = $("#btn").val();

	           $.ajax({
	           type:'POST',
	           url:url,
	           data:{id:id,val:val},
	           async:true,
	           success:function(result){

	                if(result == 'success' && val=='Archive'){
	                  $("#btn").val('NoArchive');
	                }
	                 if(result == 'success' && val=='NoArchive'){
	                  $("#btn").val('Archive');
	                }
	            }
           });
           });
$("#opt_btn").click(function(){
var url = $("#opt_url").val();
var id  = $("#opt_id").val();
var val = $("#opt_btn").val();

$.ajax({
type:'POST',
url:url,
data:{id:id,val:val},
async:true,
success:function(result){

if(result == 'success' && val=='Archive'){
$("#opt_btn").val('NoArchive');
}
if(result == 'success' && val=='NoArchive'){
$("#opt_btn").val('Archive');
}
}
});
});
$("#svc_btn").click(function(){
var url = $("#svc_url").val();
var id  = $("#svc_id").val();
var val = $("#svc_btn").val();

$.ajax({
type:'POST',
url:url,
data:{id:id,val:val},
async:true,
success:function(result){

if(result == 'success' && val=='Archive'){
$("#svc_btn").val('NoArchive');
}
if(result == 'success' && val=='NoArchive'){
$("#svc_btn").val('Archive');
}
}
});
});
$("#comp_btn").click(function(){
var url = $("#comp_url").val();
var id  = $("#comp_id").val();
var val = $("#comp_btn").val();

$.ajax({
type:'POST',
url:url,
data:{id:id,val:val},
async:true,
success:function(result){

if(result == 'success' && val=='Archive'){
$("#comp_btn").val('NoArchive');
}
if(result == 'success' && val=='NoArchive'){
$("#comp_btn").val('Archive');
}
}
});
});
    });

  function aa(index){
    var dis = $("#hid").val();
    var c1_id =  index.val();
    if(dis == 'www'){
       var url = "<?php echo site_url('Ial_admin/IAL_category/findcategory2');?>";
    }else{
       var url = "<?php echo site_url('admin/category/findcategory2');?>";
    }
    
       $.ajax({
           type:'POST',
           url:url,
           data:{id:c1_id},
           async:true,
           dataType:'json',
           success:function(json){
          
           if(json){
           str = '';
           $.each(json, function(key, val){
			   str += '<option value="'+val.id+'">'+val.nc_name+'</option>';
		   })
		   index.parent().next().children('select').html(str);
		   }
            }
           });
  }