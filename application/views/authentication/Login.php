<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<div id="body">
	<body>
		<div id="container">

			<body class="hold-transition login-page">
				<div class="login-box">
					<div class="login-logo">
						<a href="../../index2.html"><b>theplan</b><br/>lopez-be.ch</a>
					</div>
					<!-- /.login-logo -->
					<div class="login-box-body">
						<form action="<?=base_url().index_page()?>Verifylogin" method="post">
							<div class="form-group has-feedback">
								<input type="email" class="form-control" placeholder="Email" name="email">
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<input type="password" class="form-control" placeholder="Password" name="password">
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
							<div class="row">
								<div class="col-xs-8">
									<div class="checkbox icheck">
                                        <a href="<?=base_url().index_page()?>Register">Register</a>
									</div>
								</div>
								<!-- /.col -->
								<div class="col-xs-4">
									<button type="submit" class="btn btn-primary btn-block btn-flat">
										Sign In
									</button>
								</div>
								<!-- /.col -->
							</div>
						</form>
					</div>
					<!-- /.login-box-body -->
				</div>
				<!-- jQuery 2.2.0 -->
			</body>
		</div>
	</body>
	</html>
</div>
<!-- /.row (main row) -->
</section>
<!-- /.content -->
</div>