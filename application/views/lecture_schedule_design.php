<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Arvind Tutorials</title>
    <?php require_once('head.php');?>
</head>
<body>
<?php require_once('header.php');?>

<div class="clearfix"></div>

<section class="sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    XI Std. Students
                                </a>
                            </h4>

                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>STD.</th>
                                                <th>SUBJECT</th>
                                                <th>TIME</th>
                                                <th>LECTURER</th>
                                            </tr>
                                            <tr>
                                                <td>XI</td>
                                                <td>ABC</td>
                                                <td>12 PM To 1 PM</td>
                                                <td>VIJAY SIR</td>
                                            </tr>
                                            <tr>
                                                <td>XI</td>
                                                <td>XYZ</td>
                                                <td>1 PM To 2 PM</td>
                                                <td>AMIT SIR</td>
                                            </tr>
                                            <tr>
                                                <td>XI</td>
                                                <td>ABC</td>
                                                <td>12 PM To 1 PM</td>
                                                <td>VIJAY SIR</td>
                                            </tr>
                                            <tr>
                                                <td>XI</td>
                                                <td>XYZ</td>
                                                <td>1 PM To 2 PM</td>
                                                <td>AMIT SIR</td>
                                            </tr>
                                        </table>
                                    </div><!--col-md-12-->
                                </div><!--row-->
                            </div>
                        </div>
                    </div><!--panel 1-->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    XII Std. Students
                                </a>
                            </h4>

                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>STD.</th>
                                                <th>SUBJECT</th>
                                                <th>TIME</th>
                                                <th>LECTURER</th>
                                            </tr>
                                            <tr>
                                                <td>XII</td>
                                                <td>ABC</td>
                                                <td>12 PM To 1 PM</td>
                                                <td>VIJAY SIR</td>
                                            </tr>
                                            <tr>
                                                <td>XII</td>
                                                <td>XYZ</td>
                                                <td>1 PM To 2 PM</td>
                                                <td>AMIT SIR</td>
                                            </tr>
                                            <tr>
                                                <td>XII</td>
                                                <td>ABC</td>
                                                <td>12 PM To 1 PM</td>
                                                <td>VIJAY SIR</td>
                                            </tr>
                                            <tr>
                                                <td>XII</td>
                                                <td>XYZ</td>
                                                <td>1 PM To 2 PM</td>
                                                <td>AMIT SIR</td>
                                            </tr>
                                        </table>
                                    </div><!--col-md-12-->
                                </div><!--row-->
                            </div>
                        </div>
                    </div><!--panel 2-->

                </div><!--panel Group-->
            </div><!--col-md-12-->
        </div><!--row-->
    </div><!--container-->
</section>

<div class="clearfix"></div>

<?php require_once('footer.php');?>

</body>
</html>