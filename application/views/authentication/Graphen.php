<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<div class="content-wrapper" style="min-height: 901px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Charts
            <small>Traning panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Theplan</a></li>
            <li class="active">Charts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
        <span class="info-box-icon bg-<? if($sparkline['trend']>0){echo 'green';}elseif($sparkline['trend']==0) {echo 'orange'; } else { echo 'red';} ?>">
          <i class="fa fa-caret-<? if($sparkline['trend']>0){echo 'up';}elseif($sparkline['trend']==0) {echo 'right'; } else { echo 'down';} ?>"></i>
        </span>
                    <div class="info-box-content" style="position:relative;">
                        <span class="info-box-text">Power of last 100 exercises</span>
                        <span class="info-box-number"> <small>   </small>
            <span class="info-box-chart" style="position:absolute; left:10px; right:10px;">
              <div class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="black"
                   data-min-Spot-Color="black" data-max-Spot-Color="black" data-line-Width="3"
                   data-spot-Color="black" data-offset="10" data-width="100%" data-height="60px"
                   data-highlight-Line-Color="<? if($sparkline['trend']>0){echo 'rgba(0, 166, 90, 0.3)';}elseif($sparkline['trend']==0) {echo 'rgba(255, 133, 27, 0.3)'; } else { echo 'rgba(221, 75, 57, 0.3)';} ?>"
                   data-line-Color="<? if($sparkline['trend']>0){echo 'rgba(0, 166, 90, 0.3)';}elseif($sparkline['trend']==0) {echo 'rgba(255, 133, 27, 0.3)'; } else { echo 'rgba(221, 75, 57, 0.3)';} ?>"
                   data-fill-Color="<? if($sparkline['trend']>0){echo 'rgba(0, 166, 90, 0.3)';}elseif($sparkline['trend']==0) {echo 'rgba(255, 133, 27, 0.3)'; } else { echo 'rgba(221, 75, 57, 0.3)';} ?>">
                <?=$sparkline['power']?>
              </div>
            </span>
          </span>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.info-box edit -->

        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
$(function() {
    $(".sparkline").each(function () {
        var $this = $(this);
        $this.sparkline('html', $this.data());
    });
});
</script>
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