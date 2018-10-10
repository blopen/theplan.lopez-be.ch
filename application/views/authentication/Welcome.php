
<div class="content-wrapper" style="min-height: 901px;">
<!-- Content Header (Page header) -->
<script type="text/javascript" src="<?=base_url().index_page()?>assets/js/jquery-3.2.0.js"></script>
	<section class="content-header">
		<ol class="breadcrumb">
			<li>
				<a href="#"><i class="fa fa-dashboard"></i>theplan</a>
			</li>
			<li class="active">
				Home
			</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div id="container">
		<h1>Welcome to theplan</h1>
			<div id="body">
				<div id="container">
					<div class="row">
						<div class="col-xs-12">
							<h3 class="box-title ">
								<a class="browse touch" path="/">theplan</a>/<a id ="bredcrump"></a>
									</h3>
									
							<div class="box">
								<div class="box-header">
									<!-- <div class="input-group input-group-sm" style="width: 100%;">
											<input name="table_search" class="form-control pull-right" placeholder="Search" type="text">
											<div class="input-group-btn">
												<button type="submit" class="btn btn-default">
													<i class="fa fa-search"></i>
												</button>
											</div>
										</div> -->
									<div class="box-tools">
									</div>
								</div>
								<!-- /.box-header -->
								<div class="box-body table-responsive no-padding">
									<table id="s3datas" class="table table-hover">
									<thead>
											<tr class="table table-hover">
												<th >Name</th>
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
								<div  class="overlay">
              			<i  class="fa fa-refresh fa-spin"></i>
            				</div>
								
							</div>
							<div class="form-group has-feedback controlelemets">
								<form id="formAddFolder" method="post">
									<input type="text" class="form-control" id="makefolder" name="folder" placeholder="folder">
									<span class=" glyphicon glyphicon-folder-open form-control-feedback form-group"></span>
									<input type="submit" id="btnMakeFolder" class="btn btn-success objekt" value="Make new Folder" name="createfolder" />
								</form>
							</div>
							
							<div class="form-group has-feedback controlelemets">
								<form id="formRenameObject" method="post">
									<input type="text" class="form-control" id="rename" name="rename"placeholder="folder/file to rename">
									<span class=" glyphicon glyphicon-folder-open form-control-feedback form-group"></span>
									<input type="text" class="form-control" id="renameto" name="renameto"placeholder="on">
									<span class=" glyphicon glyphicon-folder-open form-control-feedback form-group"></span>
									<input type="submit" class="btn btn-success objekt" value="rename" name="createfolder" />
								</form>
							</div>
							
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
							<!-- <div class="loader">
						</div> -->
						
					</div>
				</div>
			</div>
		</div>
		</div>
		<!-- /.row (main row) -->
	</section>
	<!-- /.content -->
</div>