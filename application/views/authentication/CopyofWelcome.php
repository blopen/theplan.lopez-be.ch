<div class="content-wrapper" style="min-height: 901px;">
<!-- Content Header (Page header) -->
<script type="text/javascript" src="<?=base_url().index_page()?>assets/js/jquery-3.2.0.js"></script>
<script type="text/javascript">
	/*problem mit string zusammens etzten*/
	$(document).ready(function(){
	console.log('dokument radi browse');
	var url ='Home/browse/';
	$.ajax({
  		dataType: "json",
  		url: url,
		success: function(result){
		console.log(result); 
		$.each(result['breadcrump'], function(key, val) {
		$('#bredcrump').append('<a class="browse" path="'+ val+'" id="'+key+'">'+val+'</a>');
		
		});
		$.each(result['data'], function(key, val) {
			
		$('#s3datas > tbody:last-child').append('\
			<tr class="dRow">\
			<td ><a class="browse" path="'+ val.key+'" id="'+key+'">'+val.name+'</a></td>\
			<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.type+'</td>\
			<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.date+'</td>\
			<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.hSize+'</td>\
			<td class="download" path="'+val.key+'" id="'+key+'"><a href="<?=base_url()?>home/download/?path='+val.key+'" target="_self"><i class="glyphicon glyphicon-save-file"></a></td>\
			<td class="delete" path="'+val.key+'" id="'+key+'"><a><i class="glyphicon glyphicon-trash"></a></td>\
			</tr>\
						');
					});
					
}
				});
    		});		
</script>
	<section class="content-header">
		<ol class="breadcrumb">
			<li>
				<a href="#"><i class="fa fa-dashboard"></i>CloudBox</a>
			</li>
			<li class="active">
				Dashboard
			</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div id="container">
		<h1>Welcome to CloudBox</h1>
			<div id="body">
				<div id="container">
					<div class="row">
						<div class="col-xs-12">
							<h3 class="box-title ">
								<a class="browse" path="/">Cloudbox</a>/<a id ="bredcrump"></a>	
									</h3>
							<div class="box">
								<div class="box-header">
									<div class="input-group input-group-sm" style="width: 100%;">
											<input name="table_search" class="form-control pull-right" placeholder="Search" type="text">
											<div class="input-group-btn">
												<button type="submit" class="btn btn-default">
													<i class="fa fa-search"></i>
												</button>
											</div>
										</div>
									<div class="box-tools">
									</div>
								</div>
								<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
									<table id="s3datas" class="table table-hover">
									<thead>
											<tr class="table table-hover">
												<th>Name</th>
												<th>Type</th>
												<th>Date</th>
												<th>Size</th>
												<th>Doweload</th>
												<th>Delete</th>
											</tr> 
											</thead>
											<tbody></tbody>									
									</table>								
									<div id="containerPre">
										<!-- <center><img style='width:100%;' border="0" alt="Null"<?=(isset($map[0]["imgUrl"]) ? 'src="'.$map[0]["imgUrl"].'"' : 'src="'.base_url().'dist/img/cloudboxlogo.png"')?>> </center> -->
									</div>
								</div>
								
							</div>
							<div class="form-group has-feedback controlelemets">
								<form id="formAddFolder" method="post"><!---->
									<input type="text" class="form-control" id="makefolder" name="folder" placeholder="folder">
									<span class=" glyphicon glyphicon-folder-open form-control-feedback form-group"></span>
									<input type="submit" id="btnMakeFolder" class="btn btn-success objekt" value="Make new Folder" name="createfolder" />
								</form>
							</div>
							
							<!-- <div class="form-group has-feedback controlelemets">
								<form action="<?=base_url().index_page()?>Home/renamefolder" method="post">
									<input type="text" class="form-control" name="rename"placeholder="folder to rename">
									<span class=" glyphicon glyphicon-folder-open form-control-feedback form-group"></span>
									<input type="text" class="form-control" name="renameto"placeholder="on">
									<span class=" glyphicon glyphicon-folder-open form-control-feedback form-group"></span>
									<input type="submit" class="btn btn-success objekt" value="rename" name="createfolder" />
								</form>
							</div> -->
							
							<div class="form-group has-feedback controlelemets">
							<form id="formUpload" method="post" enctype="multipart/form-data">
									<input type="file" class="form-control"  id="userfile" name="userfile" placeholder="file"> 
									<span class=" glyphicon glyphicon-folder-open form-control-feedback form-group"> </span>
									<input type="submit" id="btnUpload"class="btn btn-success objekt" value="Upload" name="submit" /> 
									
							</form>
							<center><progress class="progress-bar-striped" id="progress" style="width: 100%" value="0"></progress></center>
							</div>
							<!-- <div class="form-group has-feedback">
								<?php echo form_open_multipart(base_url().index_page().'Home/do_upload') ; ?>
									<input type="file" class="form-control" name="userfile" placeholder="file">
									<span class=" glyphicon glyphicon-folder-open form-control-feedback form-group"></span>
									<input type="submit" class="btn btn-success objekt" value="Upload" name="submit" />
								<?php echo "</form>"?>
							</div> -->
							<!-- <form id="result1" target="hidden-form" method="POST">
								
							</form> -->
							<!-- /.box -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row (main row) -->
	</section>
	<!-- /.content -->
</div>

<script>
$(document).on('click', '.browse',function(){
	var path = $(this).attr('path');
	console.log(path+' wurde gedrückt');
	var url ='Home/browse/?path='+$(this).attr('path');
	$.ajax({
  		dataType: "json",
  		url: url,
		success: function(result){
		if(result['imgUrl'] == "Leer" ){
			$('.controlelemets').show();
		console.log('ajax relut =',result);
		$('.dRow').remove();
		$('#bredcrump').empty();
		$('#containerPre').empty();
		$.each(result['breadcrump'], function(key, val) {
		$('#bredcrump').append('<a class="browse" path="'+ val+'" id="'+key+'">'+val+'</a>');
		});
			$.each(result['data'], function(key, val) {
				$('#s3datas > tbody:last-child').append('\
							<tr class="dRow">\
								<td class="browse" path="'+ val.key+'" id="'+key+'"><a >'+val.name+'</a></td>\
								<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.date+'</td>\
								<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.type+'</td>\
								<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.hSize+'</td>\
								<td class="download" path="'+val.key+'" id="'+key+'"><a href="<?=base_url()?>home/download/?path='+val.key+'" target="blank"><i class="glyphicon glyphicon-save-file"></a></td>\
								<td class="delete" path="'+val.key+'" id="'+key+'"><a><i class="glyphicon glyphicon-trash"></a></td>\
							</tr>\
						');
					});
					//console.log(result);
				}else if(result['imgUrl'].length > 30 ){
					$('.dRow').empty();
					$('#bredcrump').empty();
					$.each(result['breadcrump'], function(key, val) {
					$('#bredcrump').append('<a class="browse" path="'+ val+'" id="'+key+'">'+val+'</a>');
					});
					$('.controlelemets').hide(0);
					$('#containerPre').append('<center><img size="100%"src="'+result['imgUrl']+'"></center>');
				}else{
					$('.controlelemets').show();
					$('.dRow').empty();
					$('#bredcrump').empty();
					$.each(result['breadcrump'], function(key, val) {
					$('#bredcrump').append('<a class="browse" path="'+ val+'" id="'+key+'">'+val+'</a>');
					});
					$('#containerPre').append('<center><img size="100%"src="'+result['imgUrl']+'"></center>');
				}}
    		});		
    		});
</script>
<script>
		$("table").on('click', '.delete', function(){
			var path = $(this).attr('path');
			var encoded = encodeURIComponent(path);
			var base_url = '<?=base_url()?>';
			var $tr = $(this).closest('tr');
			$.ajax({
				type:"POST",
				data: {path: path},
				url: "/Home/deleteObject/", 
				success: function(result){
					console.log(path+' wird gelöschen '+ result);
					$tr.find('td').fadeOut(500,function(){ 
                            $tr.remove();                    
                        }); 
				}
			})
			
		});
</script>

<script>
		$("#formAddFolder").on('submit', function(event){
				$.ajax({
  						type: 'post',
  						url: "/Home/makefolder/",
  						data: {folder: $("#makefolder").val()},
					  success: function(){
								console.log(8888);
								var url2 ='home/browse/';
								$.ajax({
  										dataType: "json",
  										url: url2,
					  					success: function(result){
					  					$('.dRow').remove();
					  					$('#containerPre').empty()
					  					$('#bredcrump').empty()
										$.each(result['breadcrump'], function(key, val) {
										$('#bredcrump').append('<a class="browse" path="'+ val+'" id="'+key+'">'+val+'</a>');
													});
										$.each(result['data'], function(key, val) {
										$('#s3datas > tbody:last-child').append('\
										<tr class="dRow">\
										<td class="browse" path="'+ val.key+'" id="'+key+'"><a >'+val.name+'</a></td>\
										<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.date+'</td>\
										<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.type+'</td>\
										<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.hSize+'</td>\
										<td class="download" path="'+val.key+'" id="'+key+'"><a href="<?=base_url()?>home/download/?path='+val.key+'" target="blank"><i class="glyphicon glyphicon-save-file"></a></td>\
										<td class="delete" path="'+val.key+'" id="'+key+'"><a><i class="glyphicon glyphicon-trash"></a></td>\
										</tr>\
						');
					});
				}
				});
		}
		});
		event.preventDefault();
		});
</script> 

<script>
		$("#formUpload").on('submit', function(event){
			event.stopPropagation();
			event.preventDefault();
			var progressBar = document.getElementById("progress");
			console.log('in upload funktion js');
			var formData = new FormData(this);
				$.ajax({
						xhr: function(){
    					var xhr = new window.XMLHttpRequest();
    					//Upload progress
    					xhr.upload.addEventListener("progress", function(evt){
      					if (evt.lengthComputable) {
        					var percentComplete = evt.loaded / evt.total;
        					
        					progressBar.value = percentComplete;
        					//Do something with upload progress
        					//alert(percentComplete);
      					}}, false);
    					return xhr;
  						},
  						type: 'POST',
  						url: "Home/do_upload/",
  						data: formData,
  						dataType: 'json',
		                contentType: false,
		                processData: false,
					  success: function(returndata){
					  	progressBar.value = 0;
					  	console.log(returndata);
					  	if(returndata.status == 'good'){
					  	//alert(returndata);
								console.log(returndata);
								var url2 ='home/browse/';
								$.ajax({
  										dataType: "json",
  										url: url2,
					  					success: function(result){
					  					$('.dRow').remove();
					  					$('#containerPre').empty()
					  					$('#bredcrump').empty()
										$.each(result['breadcrump'], function(key, val) {
										$('#bredcrump').append('<a class="browse" path="'+ val+'" id="'+key+'">'+val+'</a>');
													});
										$.each(result['data'], function(key, val) {
										$('#s3datas > tbody:last-child').append('\
										<tr class="dRow">\
										<td class="browse" path="'+ val.key+'" id="'+key+'"><a >'+val.name+'</a></td>\
										<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.date+'</td>\
										<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.type+'</td>\
										<td class="manipulate" path="'+val.key+'" id="'+key+'">'+val.hSize+'</td>\
										<td class="download" path="'+val.key+'" id="'+key+'"><a href="<?=base_url()?>home/download/?path='+val.key+'" target="blank"><i class="glyphicon glyphicon-save-file"></a></td>\
										<td class="delete" path="'+val.key+'" id="'+key+'"><a><i class="glyphicon glyphicon-trash"></a></td>\
										</tr>\
						');
					});
				}
				});
		}else{
			console.log(returndata.status);
		}
		}
	
		});
		
		});

</script>