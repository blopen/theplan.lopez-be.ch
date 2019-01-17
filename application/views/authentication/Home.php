<div class="content-wrapper" style="min-height: 901px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sessions
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-calendar"></i> Theplan</a></li>
            <li class="active">Sessions</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php foreach ($session as $value) { ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <span class="info-box-icon bg-green"><i class="material-icons">timeline</i></span>
                    <div class="info-box">
                        <div class="info-box-content">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <span class="info-box-number">Session:<?= $value['name'] ?> <?= $value['date'] ?></span>
                                    <ul class="hidden-xs">
                                        <li><span class="info-box-text">Motivation:<?= $value['motivation'] ?></span>
                                        </li>
                                        <li><span class="info-box-text">Kalories:<?= $value['kalories'] ?></span></li>
                                    </ul>
                                    <span class="info-box-text visible-xs">Motivation:<?= $value['motivation'] ?></span>
                                    <span class="info-box-text visible-xs">Kalories:<?= $value['kalories'] ?></span>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 text-right">
                                    <A><button class="deleteSession" value="<?= $value['id'] ?>">
                                           <!-- <a href="https://theplan.lopez-be.ch/Sessions/delete/<=$value['id']?>"> rEST UF GIT-->
                                        <i class="material-icons">
                                            delete
                                        </i>
                                        </button></A>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 text-left">
                                    <a href="https://theplan.lopez-be.ch/Sessions/edit/<?= $value['id'] ?>"><button >
                                        <i class="material-icons ">
                                            visibility
                                        </i>
                                    </button></a>
                                </div>
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
        font-size: 44px;
        margin: 0;
    }

    a i.material-icons {
        color: #0c3a17;
        cursor: pointer;
        padding: 15px;
    }
    .row{
        display: flow-root;
    }
    button{
        BACKGROUND-COLOR: TRANSPARENT;
        border-radius: 50%;
    }
    @media (max-width : 370px) {
        .info-box-text {
            position: relative;
            right: 90px;
            width: 100%;
            min-width: 100px;
        }
        .row{
            display: block;
        }
    }
</style>
<script>
    $(document).ready(function () {
        $('#plusBtn').click(function () {
            window.location = "https://theplan.lopez-be.ch/Sessions";
        });
        $('.deleteSession').click(function () {
            event.preventDefault();
            var id = this.value;
            console.log("ready!"+id);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this session!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Poof! Your session has been deleted!", {
                                icon: "success",
                            });
                            window.location = "https://theplan.lopez-be.ch/Sessions/delete/"+id;
                        } else {
                            swal("Your session is safe!");
                        }
                    });
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        });
    });
</script>