
<?php
$data["menu"] = $menu;
$data["majorcolor"] = $rtnmajorcolor;
$data["minorcolor"] = $rtnminorcolor;
$data["schoolidentity"] = $rtnschoolidentity;
?>
<?php $this->load->view("frontend/header", $data); ?>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper" style="background-color:<?php // echo $rtnminorcolor ?>;">
    <div id="slider" style="background-color:<?php //echo $rtnminorcolor ?>;">
        <div id="slide-wrapper" class="rounded clear" style="background-color:<?php echo$rtnminorcolor ?>;"> 
            <!-- ################################################################################################ -->
                <?php echo $rtncarousel ?>
            <!-- ################################################################################################ -->
            <ul id="slide-tabs">
<?php echo $rtnslide ?> 
            </ul>
            <!-- ################################################################################################ --> 
        </div>
    </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3" style="background-color:<?php // echo$rtnminorcolor ?>;">
    <div class="rounded" style="background-color:<?php echo$rtnminorcolor ?>;">
        <main class="container clear" style="background-color:<?php echo$rtnminorcolor ?>;"> 
            <!-- main body --> 
            <!-- ################################################################################################ -->
            <div class="group btmspace-30"> 
                <!-- Left Column -->
                <div class="one_quarter first"> 
                    <!-- ################################################################################################ -->
                    <ul class="nospace">
                        <li class="btmspace-15"><a href="#"><em class="heading">Prospective Students</em> <img class="borderedbox" src="images/demo/220x95.gif" alt=""></a></li>
                        <li class="btmspace-15"><a href="#"><em class="heading">Current Students</em> <img class="borderedbox" src="images/demo/220x95.gif" alt=""></a></li>
                        <li class="btmspace-15"><a href="#"><em class="heading">International Students</em> <img class="borderedbox" src="images/demo/220x95.gif" alt=""></a></li>
                        <li class="btmspace-15"><a href="#"><em class="heading">International Students</em> <img class="borderedbox" src="images/demo/220x95.gif" alt=""></a></li>
                        <li><a href="#"><em class="heading">Alumni</em> <img class="borderedbox" src="images/demo/220x95.gif" alt=""></a></li>
                    </ul>
                    <!-- ################################################################################################ --> 
                </div>
                <!-- / Left Column --> 
                <!-- Middle Column -->
                <div class="one_half"> 
                    <!-- ################################################################################################ -->
                    <h2>Latest News &amp; Events</h2>
                    <ul class="nospace listing">
                       <?php echo $news;?>
                       
                    </ul>
                    <p class="right"><a href="#">Click here to view all of the latest news and events &raquo;</a></p>
                    <!-- ################################################################################################ --> 
                </div>
                <!-- / Middle Column --> 
                <!-- Right Column -->
                <div class="one_quarter sidebar"> 
                    <!-- ################################################################################################ -->
                    <div class="sdb_holder">
                        <h6>Virtual Tour</h6>
                        <div class="mediacontainer"><img src="images/demo/video.gif" alt="">
                            <p><a href="#">View More Tour Videos Here</a></p>
                        </div>
                    </div>
                    <div class="sdb_holder">
                        <h6>Quick Information</h6>
                        <ul class="nospace quickinfo">
                            <li class="clear"><a href="#"><img src="images/demo/80x80.gif" alt=""> Make An Application</a></li>
                            <li class="clear"><a href="#"><img src="images/demo/80x80.gif" alt=""> Order A Prospectus</a></li>
                            <li class="clear"><a href="#"><img src="images/demo/80x80.gif" alt=""> Order A Prospectus</a></li>
                            <li class="clear"><a href="#"><img src="images/demo/80x80.gif" alt=""> Order A Prospectus</a></li>
                        </ul>
                    </div>
                    <!-- ################################################################################################ --> 
                </div>
                <!-- / Right Column --> 
            </div>
            <!-- ################################################################################################ --> 
            <!-- ################################################################################################ -->
            <div id="twitter" class="group btmspace-30" style="background-color:<?php echo $rtnmajorcolor ?>;">
                <div class="one_quarter first center"><a href="#"><i class="fa fa-twitter fa-3x"></i><br>
                        Follow Us On Twitter</a></div>
                <div class="three_quarter bold">
                    <p>Inteligula congue id elis donec sce sagittis intes id laoreet aenean. Massawisi condisse leo sem ac tincidunt nibh quis dui fauctor et donecnibh elis velit <a href="#">@name</a> - 10:15 AM yesterday</p>
                </div>
            </div>
            <!-- ################################################################################################ --> 
            <!-- ################################################################################################ -->
            <div class="group">
                <h2>Quickly Find What You Are Looking For</h2>
                <div class="one_quarter first"> 
                    <!-- ################################################################################################ -->
                    <ul class="nospace">
                        <li><a href="#">Academic Advisory</a></li>
                        <li><a href="#">Academic Assistance</a></li>
                        <li><a href="#">Academic Calendars</a></li>
                        <li><a href="#">Academics Office</a></li>
                        <li><a href="#">Administration</a></li>
                        <li><a href="#">Adult Learners</a></li>
                        <li><a href="#">Alumni Chapters</a></li>
                        <li><a href="#">Alumni Events</a></li>
                        <li><a href="#">Athletics</a></li>
                        <li><a href="#">Campus Life At a Glance</a></li>
                        <li><a href="#">Campus Recreation</a></li>
                        <li><a href="#">Campus Safety &amp; Security</a></li>
                    </ul>
                    <!-- ################################################################################################ --> 
                </div>
                <div class="one_quarter"> 
                    <!-- ################################################################################################ -->
                    <ul class="nospace">
                        <li><a href="#">Class Schedules</a></li>
                        <li><a href="#">Counselling Center</a></li>
                        <li><a href="#">Course Descriptions &amp; Catalogue</a></li>
                        <li><a href="#">Department Directory</a></li>
                        <li><a href="#">Departments &amp; Programs</a></li>
                        <li><a href="#">Fellowships</a></li>
                        <li><a href="#">Finals Schedules</a></li>
                        <li><a href="#">Financial Aid</a></li>
                        <li><a href="#">Fitness and Recreation Facilities</a></li>
                        <li><a href="#">Global Learning</a></li>
                        <li><a href="#">Graduate</a></li>
                        <li><a href="#">Graduate Admissions</a></li>
                    </ul>
                    <!-- ################################################################################################ --> 
                </div>
                <div class="one_quarter"> 
                    <!-- ################################################################################################ -->
                    <ul class="nospace">
                        <li><a href="#">Graduate Health Services</a></li>
                        <li><a href="#">Graduate Housing</a></li>
                        <li><a href="#">Graduate Programs</a></li>
                        <li><a href="#">Graduate Student Association</a></li>
                        <li><a href="#">Graduate Studies</a></li>
                        <li><a href="#">Honours Program</a></li>
                        <li><a href="#">Interactive Schedule</a></li>
                        <li><a href="#">International Programs</a></li>
                        <li><a href="#">International Students</a></li>
                        <li><a href="#">Intramural Sports</a></li>
                        <li><a href="#">Language Resources</a></li>
                        <li><a href="#">Maps and Directions</a></li>
                    </ul>
                    <!-- ################################################################################################ --> 
                </div>
                <div class="one_quarter"> 
                    <!-- ################################################################################################ -->
                    <ul class="nospace">
                        <li><a href="#">Office of the Registrar</a></li>
                        <li><a href="#">Online Learning</a></li>
                        <li><a href="#">Parent Information</a></li>
                        <li><a href="#">Residence Life</a></li>
                        <li><a href="#">Residential Colleges</a></li>
                        <li><a href="#">Schools and Colleges</a></li>
                        <li><a href="#">Student Activities</a></li>
                        <li><a href="#">Student Affairs</a></li>
                        <li><a href="#">Student Development</a></li>
                        <li><a href="#">Student Financial Services</a></li>
                        <li><a href="#">Student Group Directory</a></li>
                        <li><a href="#">Student Life</a></li>
                    </ul>
                    <!-- ################################################################################################ --> 
                </div>
            </div>
            <!-- ################################################################################################ --> 
            <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<?php $this->load->view("frontend/footer", $data); ?>
