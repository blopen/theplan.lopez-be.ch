<div class="content-wrapper" style="min-height: 901px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sassion
            <small>Traning panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Theplan</a></li>
            <li class="active">Sassions</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?=var_dump($session[0]['date']);?>
        <?php foreach($session as $key => $value){ ?>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="material-icons">timeline</i></span>
                <div class="info-box-content">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <span class="info-box-text">Session:<?=$value['name']?></span>
                        <span class="info-box-text">Date: <?=$value['date']?></span>
                        <span class="info-box-number">Motivation:<?=$value['motivation']?></span>
                        <span class="info-box-number">Kalories:<?=$value['kalories']?></span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">

                        <a>
                            <i class="material-icons">
                                delete
                            </i>
                        </a>

                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-right">

                        <a href="Sessions/watch/<?=$value['id']?>">
                            <i class="material-icons " >
                                visibility
                            </i>
                        </a>

                    </div>
                </div>
                <!-- /.info-box-content -->

            </div>
            <!-- /.info-box -->
        </div>
        <?php } ?>
        </div>
        <!-- /.info-box edit -->

        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<style>
    i.material-icons {
        font-size: -webkit-xxx-large;
        position: relative;
        top: 10%;
    }
    a i.material-icons{
        color: black;
        position: relative;
        top: 10%;
        cursor: pointer;
        margin-top: 10%;

    }
</style>
<script>
    $( document ).ready(function() {
        console.log( "ready!" );
        $( '#plusBtn' ).click(function() {
            window.location="Sessions";
        });
    });
</script>