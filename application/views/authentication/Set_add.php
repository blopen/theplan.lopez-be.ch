<div class="content-wrapper" style="min-height: 901px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sassion add
            <small><?= $session['name'] ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-calendar"></i> <?= $session['name'] ?></a></li>
            <li class="active">Sassions add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <form name="sessionadd" action="https://theplan.lopez-be.ch/Set/save" method="post">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="material-icons">directions_run</i></span>
                        <div class="info-box-content">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3>Exercise Name</h3>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left align-middle">
                                <input name="name" type="text" placeholder="" value="<?= $set['name'] ?>"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div><div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="material-icons">description</i></span>
                        <div class="info-box-content">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3>Description</h3>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left align-middle">
                                <input name="description" type="text" placeholder="" value="<?= $set['description'] ?>"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="material-icons">sync</i></span>
                        <div class="info-box-content">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3>Repetation</h3>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right align-middle">
                                <input name="repetition" onkeypress="return isNumberKey(event)" type="text" placeholder="" value="<?= $set['repetition'] ?>"
                                       class="form-control input-md input-kalories">
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="material-icons">fitness_center</i></span>
                        <div class="info-box-content">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3>weight</h3>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right align-middle">
                                <input name="weight" onkeypress="return isNumberKey(event)" type="text" placeholder="" value="<?= $set['weight'] ?>"
                                       class="form-control input-md input-kalories">
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <input name="session_id" type="text" style="visibility: hidden" placeholder="" value="<?=$session_id; ?>"
                       class="form-control input-md">
                <input name="set_id" type="text" style="visibility: hidden" placeholder="" value="<?= $set['id'] ?>"
                       class="form-control input-md">
                <input name="exercise_id" type="text" style="visibility: hidden" placeholder="" value="<?= $set['exercise_id'] ?>"
                       class="form-control input-md">
                <input id="submitSetAdd" style="visibility: hidden" placeholder="" type="submit" value="Submit">
            </form>
        </div>


        <!-- /.info-box edit -->

        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<script>
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
    $(document).ready(function () {
        console.log("ready!");
        var saveButton = document.getElementById('saveSetBtn');
        var saveButtonHidden = document.getElementById('submitSetAdd');

        saveButton.addEventListener('click', function () {
            saveButtonHidden.click();
        }, false);
    });
</script>
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

        .input-kalories {
            margin-top: 3%;
        }

        .form-control.input-md {
            margin-top: 31%;
        }
    }

</style>
