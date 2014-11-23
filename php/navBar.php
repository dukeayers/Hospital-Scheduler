<!--<nav class="navbar navbar-default" role="navigation" style="background:#63B5FF !important; border-radius: 0;">-->
<!--    <div class="container-fluid">-->
<!--        <!-- Brand and toggle get grouped for better mobile display -->
<!--        <div class="navbar-header">-->
<!--            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#get_data-1">-->
<!--                <span class="sr-only">Toggle navigation</span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
<!--            <a class="navbar-brand" href="#"></a>-->
<!--        </div>-->
<!---->
<!--        <div class="collapse navbar-collapse" id="get_data-1" style="background:#63B5FF !important;">-->
<!--            <ul class="nav navbar-nav">-->
<!---->
<!--            </ul>-->
<!--            <ul class="nav navbar-nav navbar-right">-->
<!--<!--                <li><a href="#" data-toggle="modal" data-target="#submitBug">Submit Feedback</a></li>-->
<!--<!--                <li><a href="faq.php">FAQ</a></li>-->
<!--                <li class="text-center hover-nav">-->
<!--                    <span class="glyphicon glyphicon glyphicon-list-alt" style="color: white !important ; margin-right: 30px; margin-top:15px; font-size:26px;"></span>-->
<!--                    <a href="shiftView.php" style="color:white;margin-right: 30px; padding: 0px !important; font-size:20px;">Shifts</a>-->
<!--                </li>-->
<!--                <li class="text-center hover-nav">-->
<!--                    <span class="glyphicon glyphicon-calendar" style="color: white !important; margin-right: 30px; margin-top:15px;  font-size:26px;"></span>-->
<!--                    <a href="calendarView.php" style="color:white;margin-right: 30px; padding: 0px !important; font-size:20px;">Calendar</a>-->
<!--                </li>-->
<!--                <li class="text-center hover-nav">-->
<!--                    <span class="glyphicon glyphicon-log-in" style="margin-right: 30px; color: white !important; margin-top:15px;font-size:24px; "></span>-->
<!--                    <a href="php/UserLogout.php" style="color:white;margin-right: 30px; padding: 0px !important; margin-bottom:15px; font-size:20px;">Log Out</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->

<nav class="navbar navbar-default" role="navigation" style="background:#63B5FF !important; border-radius: 0; border-color:#63B5FF !important;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#get_data-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="color:white; cursor:default;"> Flexible Maintenance Calendar</a>
        </div>

        <div class="collapse navbar-collapse" id="get_data-1">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" style="color:white;"><span class="glyphicon glyphicon-bell"></span></a></li>
                <li><a href="#" style="color:white;"><span class="glyphicon glyphicon-envelope"></span></a></li>
                <li><a href="../Hospital-Scheduler/index.php" style="color:white;"><span class="glyphicon glyphicon-home"></span></a></li>
                <li><a href="#" style="color:white;"><span class="glyphicon glyphicon-user" style="margin-right:8px;"></span>Joe Schmo</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="modal fade" id="submitBug" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Submit Feedback</h4>
            </div>
            <div class="modal-body">
                    <form action="php/submitEmail.php" method="post">
                        <div class="form-group">
                            <label for="">Your Email:</label>
                            <input type="text" class="form-control" name="from" placeholder="Enter Your Email Address">
                        </div>
                        <div class="form-group">
                            <label for="">Message:</label>
                            <textarea class="form-control" rows="8"  name="message" placeholder="Enter your message here..."></textarea>
                        </div>
                   <div class="row">
                       <div class="col-sm-6 col-sm-offset-3">
                           <button type="submit" name="contactForm" class="btn btn-primary col-sm-12">Submit</button>
                       </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
