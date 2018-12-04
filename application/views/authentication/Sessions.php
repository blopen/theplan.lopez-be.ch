<div class="content-wrapper" style="min-height: 901px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Session add
            <small>Traning panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Theplan</a></li>
            <li class="active">Sessions add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <?=var_dump($session)?>
        <div class="row">
            <form name ="sessionadd" action="https://theplan.lopez-be.ch/Sessions/add" method="post">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="material-icons">directions_run</i></span>
                    <div class="info-box-content">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3>Name</h3>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left align-middle">
                            <input name="name" type="text" placeholder=""  value="<?=$session[0]['name']?>" class="form-control input-md">
                        </div>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="material-icons">date_range</i></span>
                    <div class="info-box-content">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3>Date</h3>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right align-middle">
                            <input name="date" type="text" placeholder="" value="<?=$session[0]['date']?>" class="form-control input-md" id="datepicker">
                        </div>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="material-icons">accessibility_new</i></span>
                    <div class="info-box-content">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3>Motivation</h3>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <select name="motivation" class="" multiple="true">
                                <option value="0" disabled selected><?=$session[0]['motivation']?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="material-icons">fastfood</i></span>
                    <div class="info-box-content">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3>Calories</h3>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right align-middle">
                            <input name="kalories" type="text" placeholder="" value="<?=$session[0]['kalories']?>" class="form-control input-md input-kalories">
                        </div>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
                <input name="id" type="text" style="visibility: hidden" placeholder="" value="<?=$session[0]['id']?>" class="form-control input-md">
                <input id="submitSessionAdd" style="visibility: hidden" placeholder="" type="submit" value="Submit">
            </form>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="https://theplan.lopez-be.ch/Set/edit/<?=($session[0]['id']);?>">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sets</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>Setname</th>
                                    <th>Repiations</th>
                                    <th>Wighth</th>
                                </tr>
                                <?php foreach($set as $key => $value){ ?>
                                <tr>
                                    <td><?=$value['name']?></td>
                                    <td><?=$value['repetition']?></td>
                                    <td>
                                        <?=$value['weight']?> Kg
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
                </a>
            </div>
        </div>
        <!-- /.info-box edit -->

        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<script>
    $( document ).ready(function() {
        console.log( "ready!" );
        var saveButton = document.getElementById('saveBtn');
        var saveButtonHidden = document.getElementById('submitSessionAdd');

        saveButton.addEventListener('click', function() {
            saveButtonHidden.click();
        }, false);
    });
</script>
<style>
    @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
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
        $('#plusBtn').click(function () {
            alert("Handler for .click() called.");
        });
        $(function () {
            $("#datepicker").datepicker();
        });
    });
</script>