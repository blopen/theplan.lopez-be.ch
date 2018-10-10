<div class="content-wrapper" style="min-height: 901px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		
		<body>

  <div id="container">
  
    <h1>Directory Contents</h1>
    <?php
	foreach ($das as $k)
{?>
     <img src="<?php echo base_url()."uploads/".$k;?>" alt="">
   
<?php }
          
?> 

    
  </div>
  
</body>

</html>
</div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>