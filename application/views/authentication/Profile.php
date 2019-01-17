<script type="text/javascript" src="<?=base_url().index_page()?>assets/js/jquery-3.2.0.js"></script>
<script type="text/javascript">
	/*problem mit string zusammens etzten*/
	$(document).ready(function() {
		console.log('Profile Rady Edit');
		$('.controlelemetsPW').hide(0);
		$('.controlelemetsMail').hide(0);
		$('.controlelemetsImage').hide(0);
		$('.overlay').hide();
	});
</script>

<div class="content-wrapper" style="min-height: 901px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1> CloudBox <small>Profile</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="#"><i class="fa fa-dashboard"></i> CloudBox</a>
			</li>
			<li class="active">
				Profile
			</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div id="container">
			<h1>Change you Settings:</h1>

			<div id="body">

				<body>

					<div id="container">
						<div class="box box-default">
							<div class="box-body box-profile">
								<img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>dist/img/IchAug2016.jpg" alt="User profile picture">

								<h3 class="profile-username text-center"><?=$firstname." ".$lastname?></h3>

								<p class="text-muted text-center">
									Member
								</p>

								<ul class="list-group list-group-unbordered">
									<li class="list-group-item">
										<b>Name:</b><a class="pull-right"><?=$firstname?></a>
									</li>
									<li class="list-group-item">
										<b>Lastname:</b><a class="pull-right"><?=$lastname?></a>
									</li>
									<li class="list-group-item">
										<b>Email:</b><a class="pull-right"><?=$email?></a>
									</li>
								</ul>
								<a id="showPasswordChange" class="btn btn-primary btn-block"><b>Change Passwort</b></a>
								<a id="showMailChange" class="btn btn-primary btn-block"><b>Change Mail</b></a>
								<!--<a id="showImageChange" class="btn btn-primary btn-block"><b>Change Profile Image</b></a>-->
							</div>
							<!-- /.box-body -->
								
							<div  class="overlay">
              			<i  class="fa fa-refresh fa-spin"></i>
            				</div>
						</div>
						<div class="controlelemetsPW">
						<div class="form-group has-feedback">
								<form id="formchangePassword" method="post"> <!--   -->
									<div class="form-group has-feedback">
											<input type="password" class="form-control" id="password" name="password"placeholder="Old Password">
											<span class="glyphicon glyphicon-lock form-control-feedback"></span>
										</div>
										<div class="form-group has-feedback">
											<input type="password" class="form-control" id="password1" name="password1"placeholder="New Password">
											<span class="glyphicon glyphicon-lock form-control-feedback"></span>
										</div>
										<div class="form-group has-feedback">
											<input type="password" class="form-control" id="password2" name='password2' placeholder="Retype password">
											<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
										</div>
										<input type="submit" class="btn btn-success objekt" value="Change Password"/>
									</form>
							</div>
							</div>
							<div class="controlelemetsMail">
							<div class="form-group has-feedback">
									<div class="form-group has-feedback controlelemets">
										<form id="formchangeMail" method="post"> 
											<div class="form-group has-feedback">
												<input type="email" class="form-control" id="emailM" name="emailM" placeholder="Email">
												<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
											</div>
											<div class="form-group has-feedback">
											<input type="password" class="form-control" id="passwordM" name="passwordM"placeholder="Password">
											<span class="glyphicon glyphicon-lock form-control-feedback"></span>
										</div>
											<input type="submit" class="btn btn-success objekt" value="Change Mail" name="mailbtn" />
										</form>
									</div>
						</div>
						</div>
								<div class="form-group has-feedback controlelemetsImage">
								<form id="formUserPic" method="post" enctype="multipart/form-data">
									<input type="file" class="form-control"  id="userfileimge" name="userfileimge" placeholder="file"> 
									<span class=" glyphicon glyphicon-folder-open form-control-feedback form-group"> </span>
									<input type="submit" class="btn btn-success objekt" value="Upload" name="submit" /> 
								
								<center><progress class="progress-bar-striped" id="progress" style="width: 100%" value="0"></progress></center>
							</form>
							</div>
							
				</body>

				</html>
			</div>
			<!-- /.row (main row) -->

	</section>
	<!-- /.content -->
</div>
<script>
	$("#showPasswordChange").click(function() {
		$('.controlelemetsPW').show();
		$('.controlelemetsMail').hide(0);
		$('.controlelemetsImage').hide(0);
	}); 
</script>
<script>
	$("#showMailChange").click(function() {
		$('.controlelemetsMail').show();
		$('.controlelemetsPW').hide(0);
		$('.controlelemetsImage').hide(0);
	}); 
</script>
<script>
	$("#showImageChange").click(function() {
		$('.controlelemetsImage').show();
		$('.controlelemetsMail').hide(0);
		$('.controlelemetsPW').hide(0);
	}); 
</script>

<script>
		$("#formchangePassword").on('submit', function(event){
			//console.og(result+$("#password").val()+$("#password1").val()+$("#password2").val());
			$('.overlay').show();
				$.ajax({
					  	type: 'POST',
  						url: "/Profile/changePassword/",
  						data: {password: $("#password").val(),password1: $("#password1").val(),password2: $("#password2").val()},
					  success: function(result){
								if(result == 'done'){
								$('.overlay').hide();
								$('.controlelemetsPW').hide(0);
								alert('Password was changed');
								}else{

								alert(result);
								}
								
		}
		});
		event.preventDefault();
		});
</script> 

<script>
		$("#formchangeMail").on('submit', function(event){
			$('.overlay').show();
				$.ajax({
					  	type: 'POST',
  						url: "/Profile/changeMail/",
  						data: {emailM: $("#emailM").val(),passwordM: $("#passwordM").val()},
					  success: function(result){
								if(result == 'done'){
								$('.overlay').hide();
								$('.controlelemetsMail').hide(0);
								alert('Mail was changed');
								}else{
								alert(result+$("#passwordM").val()+$("#emailM").val());
								}
								
		}
		});
		event.preventDefault();
		});
</script> 
<script>
		$("#formUserPic").on('submit', function(event){
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
  						url: "Profile/setProfileImage/",
  						data: formData,
  						dataType: 'json',
		                contentType: false,
		                processData: false,
					  success: function(returndata){
					  	progressBar.value = 0;
					  	console.log(returndata);
		}
		});
		
		});

</script>
