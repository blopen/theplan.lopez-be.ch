<div class="content-wrapper" style="min-height: 901px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Set
            <small>Traning panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Theplan</a></li>
            <li class="active">Set</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sets</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table class="table table-bordered x">
                                <tbody>
                                <tr>
                                    <th>Setname</th>
                                    <th>Description</th>
                                    <th>Repiations</th>
                                    <th>Wighth</th>
                                </tr>
                                <?php foreach ($set as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['description'] ?></td>
                                        <td><?= $value['repetition'] ?></td>
                                        <td>
                                            <?= $value['weight'] ?> Kg
                                        </td>
                                        <td>
                                            <a href="https://theplan.lopez-be.ch/Set/delete/<?=$value['set_id']?>/<?=$session[0]['id']?>">
                                                <i class="material-icons">
                                                    delete
                                                </i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="https://theplan.lopez-be.ch/Set/watch/<?=$value['set_id']?>/<?=$session[0]['id']?>">
                                                <i class="material-icons " >
                                                    visibility
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>-->
                    </div>
               
            </div>
        </div>
        <!-- /.info-box edit -->

        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<style>
    @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
        i.material-icons {
            font-size: -webkit-xxx-large;
            position: relative;
            top: 10%;
        }

        input {
            width: 50%;
            margin-top: 7%;
        }

        a i.material-icons {
            color: black;
            position: relative;
            top: 10%;
            cursor: pointer;
            margin-top: 10%;

        }

        #datepicker {
            margin-top: 31%;
        }

        .input-kalories {
            margin-top: 3%;
        }

        .form-control.input-md {
            margin-top: 31%;
        }
    }

</style>
<script>
    $(document).ready(function () {
        console.log("ready!");
        var id = <?=$session[0]['id']?>;
        $('#plusSetBtn').click(function () {
            window.location = 'https://theplan.lopez-be.ch/Set/add/' + id;
        });
        $(function () {
            $("#datepicker").datepicker();
        });
    });
</script>