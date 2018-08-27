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

<section class="result-sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Tabs</a>
                <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked results-tab">
                    <li class="active"><a href="#vtab1" data-toggle="tab"><h4>NEET</h4></a></li>
                    <li><a href="#vtab2" data-toggle="tab"><h4>MHT - CET</h4></a></li>
                    <li><a href="#vtab3" data-toggle="tab"><h4>JEE (Main)</h4></a></li>
                    <li><a href="#vtab4" data-toggle="tab"><h4>XI + XII (Science)</h4></a></li>
                </ul>
            </div><!--col-md-3-->
            <div class="col-sm-9">
                <div class="tab-content result-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
                        <h3>Results For NEET Students</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Year 2017
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/Anmol.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Anmol</h2>
                                                        <p class="marg0"><b>PCM: 92 %</b></p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/Ajay.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Ajay</h2>
                                                        <p class="marg0"><b>PCM: 89 %</b></p>
                                                        <p class="marg0">M-93, P-90</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/sanjana.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Sanjana</h2>
                                                        <p class="marg0"><b>PCMB: 87 %</b></p>
                                                        <p class="marg0">M-93, B-91</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/Tamandeep.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Tamandeep</h2>
                                                        <p class="marg0"><b>Agg: 85 %</b></p>

                                                    </div><!--col-md-3-->



                                                    <div class="col-md-12 text-right">
                                                        <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 1-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Year 2016
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="row rowalign">
                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/Abeena.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Abeena</h2>
                                                        <p class="marg0"><b>PCMB: 90.25 %</b></p>
                                                        <p class="marg0">B-93 ,C-92 ,M - 91</p>
                                                    </div><!--col-md-2-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/Satish.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Satish</h2>
                                                        <p class="marg0"><b>PCM: 83 %</b></p>
                                                        <p class="marg0">M-95</p>
                                                    </div><!--col-md-2-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/Nishma.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Nishma</h2>
                                                        <p class="marg0"><b>Agg: 80 %</b></p>
                                                        <p class="marg0">B-91</p>
                                                    </div><!--col-md-2-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/Abhishek.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Abhishek</h2>
                                                        <p class="marg0"><b>Agg: 80 %</b></p>
                                                        <p class="marg0">M-95, B-95</p>
                                                    </div><!--col-md-2-->
                                                    <div class="col-md-12 text-right">
                                                        <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 2-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Year 2015
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3 text-center">
                                                                <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                                <h2 class="marg0">Steffi</h2>
                                                                <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                                <p class="marg0">M-95, B-95</p>
                                                            </div><!--col-md-2-->

                                                            <div class="col-md-3 text-center">
                                                                <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/IRIN.jpg" class="img-responsive" alt=""></p>
                                                                <h2 class="marg0">IRIN</h2>
                                                                <p class="marg0"><b>PCM: 87 %</b></p>
                                                                <p class="marg0">M-97</p>
                                                            </div><!--col-md-2-->

                                                            <div class="col-md-3 text-center">
                                                                <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/Ankit.jpg" class="img-responsive" alt=""></p>
                                                                <h2 class="marg0">Ankit</h2>
                                                                <p class="marg0"><b>PCMB: 85 %</b></p>
                                                                <p class="marg0">M-93</p>
                                                            </div><!--col-md-2-->

                                                            <div class="col-md-3 text-center">
                                                                <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/Prasad.jpg" class="img-responsive" alt=""></p>
                                                                <h2 class="marg0">Prasad</h2>
                                                                <p class="marg0"><b>Agg: 84 %</b></p>
                                                            </div><!--col-md-2-->

                                                            <div class="col-md-12 text-right">
                                                                <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                            </div><!--col-md-12-->
                                                        </div><!--row-->
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 3-->
                                </div><!--panel Group-->
                            </div><!--col-md-12-->
                        </div><!--row-->
                    </div><!--tab 1-->

                    <div role="tabpanel" class="tab-pane fade" id="vtab2">
                        <h3>Results For MHT - CET Students</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingFour">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                    Year 2017
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p >M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-12 text-right">
                                                        <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 1-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingFive">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                    Year 2016
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p >M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-12 text-right">
                                                        <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 2-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingSix">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                    Year 2015
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p >M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-12 text-right">
                                                        <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 3-->
                                </div><!--panel Group-->
                            </div><!--col-md-12-->
                        </div><!--row-->
                    </div><!--tab 2-->

                    <div role="tabpanel" class="tab-pane fade in" id="vtab3">
                        <h3>Results For JEE (Main) Students</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingSeven">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion3" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                    Year 2017
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseSeven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSeven">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p >M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-12 text-right">
                                                        <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 1-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingEight">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                    Year 2016
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p >M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-12 text-right">
                                                        <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 2-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingNine">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                    Year 2015
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p >M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-12 text-right">
                                                        <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 3-->
                                </div><!--panel Group-->
                            </div><!--col-md-12-->
                        </div><!--row-->
                    </div><!--tab 3-->

                    <div role="tabpanel" class="tab-pane fade in" id="vtab4">
                        <h3>Results For XI + XII (Science) Students</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion4" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTen">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion4" href="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                                                    Year 2017
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseTen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTen">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p >M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-12 text-right">
                                                        <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 1-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingEleven">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion4" href="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                                    Year 2016
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEleven">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p >M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-12 text-right">
                                                        <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 2-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwelve">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion4" href="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                                    Year 2015
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseTwelve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwelve">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p>M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-3 text-center">
                                                        <p class="marg0"><img src="<?php echo base_url().ASSETS ?>/img/ranker/1.jpg" class="img-responsive" alt=""></p>
                                                        <h2 class="marg0">Steffi</h2>
                                                        <p class="marg0"><b>Agg: 91.38 %</b></p>
                                                        <p >M-95, B-95</p>
                                                    </div><!--col-md-3-->

                                                    <div class="col-md-12 text-right">
                                                        <p class="result-read"><a href="<?php echo base_url(); ?>home/all_results">Read More...</a></p>
                                                    </div><!--col-md-12-->
                                                </div><!--row-->
                                            </div>
                                        </div>
                                    </div><!--panel 3-->
                                </div><!--panel Group-->
                            </div><!--col-md-12-->
                        </div><!--row-->
                    </div><!--tab 3-->

                </div><!--tab content-->
            </div><!--col-md-9-->
        </div><!--row-->
    </div><!--container-->
</section>

<div class="clearfix"></div>
<?php require_once('footer.php');?>

<script>
    $('.nav-tabs-dropdown').each(function(i, elm) {

        $(elm).text($(elm).next('ul').find('li.active a').text());

    });

    $('.nav-tabs-dropdown').on('click', function(e) {

        e.preventDefault();

        $(e.target).toggleClass('open').next('ul').slideToggle();

    });

    $('#nav-tabs-wrapper a[data-toggle="tab"]').on('click', function(e) {

        e.preventDefault();

        $(e.target).closest('ul').hide().prev('a').removeClass('open').text($(this).text());

    });

</script>

</body>
</html>