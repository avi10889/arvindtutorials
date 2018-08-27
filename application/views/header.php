<?php $page =explode('/',current_url()); ?>
<section style="border-bottom: 1px solid #e4e3e3;">
    <nav class="navbar navbar-default marg0">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url().ASSETS; ?>/img/logo-arvind.png" class="img-responsive"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">About Us</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Courses <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">XI</a></li>
                            <li><a href="#">XII</a></li>
                            <li><a href="#">MHT-CET</a></li>
                            <li><a href="#">JEE(MAINS)</a></li>
                            <li><a href="#">NEET</a></li>
                        </ul>
                    </li>
                    <!--<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parents Login<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Parents</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">One more separated link</a></li>
                      </ul>
                    </li>-->
                    <li>
                        <a href="#">Online Entrance Exam </a>
                        <!--<ul class="dropdown-menu">
                          <li><a href="#">MHT - CET</a></li>
                          <li><a href="#">NEET</a></li>
                          <li><a href="#">JEE (Main)</a></li>
                        </ul>-->
                    </li>
                    <li class="<?php echo (end($page)=='result')?'active':'';?>"><a href="<?php echo base_url(); ?>home/result">Results</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right hide">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section>