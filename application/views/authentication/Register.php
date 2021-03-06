<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href="../../index2.html"><b>Admin</b>LTE</a>
		</div>
        <section>
            <div class="modal fade" id="modViewDetailPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title task_title">Term</h4>
                        </div>
                        <div class="modal-body">
                            <p>Its not deffined</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
		<div class="register-box-body">
			<p class="login-box-msg">
				Register a new membership
			</p>

			<form action="<?=base_url().index_page()?>/Register/registration" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="firstname"placeholder="Firstname">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="lastname" placeholder="Lastname">
					<span class="glyphicon glyphicon-user form-control-feedback form-group"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="email" class="form-control" name="email" placeholder="Email">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password"placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name='password2' placeholder="Retype password">
					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label class="">
								<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
									<input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
									<ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
								</div> I agree to the<a id="testbutton" class="btn" data-toggle="modal" data-target="#modViewDetailPassword" data-toggle="tooltip" title="Zahlungen" data-item-id="<?=1?>">terms</a> </label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">
							Register
						</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<div class="social-auth-links text-center">

			</div>

			<!--<a href="login.html" class="text-center">I already have a membership</a>-->
		</div>
		<!-- /.form-box -->
	</div>
	<!-- /.register-box -->

	<!-- jQuery 2.2.0 -->
	<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="../../plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function() {
			$('input').iCheck({
				checkboxClass : 'icheckbox_square-blue',
				radioClass : 'iradio_square-blue',
				increaseArea : '20%' // optional
			});
		});
	</script>

</body>