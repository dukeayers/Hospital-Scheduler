<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#get_data-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>

        <div class="collapse navbar-collapse" id="get_data-1">
            <ul class="nav navbar-nav">
                <li><a href="calendarView.php">Home Page</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Calendar<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Weekly</a></li>
                        <li><a href="#">Monthly</a></li>
                        <li><a href="#">Yearly</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Scheduler<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Add Appointment</a></li>
                        <li><a href="#">Remove Appointment</a></li>
                        <li><a href="#">Change Appointment</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admins Only<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Add Employee</a></li>
                        <li><a href="#">Remove Employee</a></li>
                        <li><a href="#">Change Employee</a></li>
                    </ul>
                </li>
                <li><a href="shiftView.php">Shift View</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#submitBug">Submit Feedback</a></li>
                <li><a href="faq.php">FAQ</a></li>

                <li><a href="#">Log Out</a></li>
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
