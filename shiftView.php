<?php
$title = 'Shift Editor';
include_once "php/headSection.php";
include_once "php/navBar.php";
include_once "php/sideBar.php";
include_once "php/footer.php";
?>

    <body  ng-app="calendarApp" ng-controller="controller" ng-init="getShifts()">

    <div class="container">
        <div class="row text-center"">
        <h3 style="border-bottom:1px solid lightgray">Administration View - Shift Editor</h3>
    </div>
    </div>

    <div class="container">
        <div class="btn-group btn-group-lg" role="group" aria-label="...">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#newShift"">Add New Shift</button>
            <button type="button" class="btn btn-danger disabled"">Delete Shift</button>
        </div>


        <div class="table-responsive text-center">
            <table class="table table-striped table-hover tablebordertop">
                <thead>
                <!--<td>Shift ID</td>-->
                <td>Shift Start Time</td>
                <td>Shift End Time</td>
                <td></td>
                </thead>
                <tbody>
                <tr ng-repeat="data in shifts"  data-toggle="modal" data-target="#myModal" ng-click="getShiftDetails(data.ID,data.Start, data.End)"  >
                    <!--<td>{{data.ID}}</td>-->
                    <td>{{data.Start}}</td>
                    <td>{{data.End}}</td>
                    <td><span class="glyphicon glyphicon-info-sign"></span></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
    </body>
    <!--Modal for Adding a shift -->
    <div class="modal fade" id="newShift" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Shift</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success text-center" ng-show="successMessage" role="alert">
                        <h3>{{successMessage}}</h3>
                    </div>
                    <form ng-submit="addNewShift()" name="formAddShift" role="form">
                        <div class="form-group">
                            <label for="shiftBegin">Shift Start:</label>
                            <input type="text" name="addShiftStart" class="form-control" style="width:80px;" required ng-pattern="/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/" minlength="5" maxlength="5" ng-model="addShift.shiftBegin" id="shiftBegin" placeholder="HH:MM">
                        </div>
                        <div ng-messages="formAddShift.addShiftStart.$error" style="margin-bottom:10px;font-style: italic; color: red"">
                            <div ng-message="required">*This Field is Required</div>
                            <div ng-message="minlength">A minimum of 5 characters is required.</div>
                            <div ng-message="pattern">You Must enter the time in military format (e.g 02:30 or 14:23)</div>
                        </div>
                        <div class="form-group">
                            <label for="shiftClose">Shift End:</label>
                            <input type="text" name="addShiftEnd" class="form-control" style="width:80px;" required ng-pattern="/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/" minlength="5" maxlength="5" ng-model="addShift.shiftClose" id="shiftClose" placeholder="HH:MM">
                        </div>
                        <div ng-messages="formAddShift.addShiftEnd.$error" style="margin-bottom:10px;font-style: italic; color: red"" >
                            <div ng-message="required">*This Field is Required</div>
                            <div ng-message="minlength">A minimum of 5 characters is required.</div>
                            <div ng-message="pattern">You Must enter the time in military format (e.g 02:30 or 14:23)</div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Shift</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Shift Updates -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Shift Details</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success text-center" ng-show="successMessage" role="alert">
                        <h3>{{successMessage}}</h3>
                    </div>
                    <form ng-submit="updateShifts()" role="form" name="formUpdateShift">
                        <div class="form-group hide">
                            <label for="shiftID">Shift Start:</label>
                            <input type="number" class="form-control " ng-model="formData.shiftID" id="shiftID">
                        </div>
                        <div class="form-group">
                            <label for="shiftstart">Shift Start:</label>
                            <input type="type" ng-pattern="/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/" required style="width:70px;"  class="form-control input-xs" name="updateShiftStart" maxlength="5"  minlength="5" ng-model="formData.shiftStart" id="shiftStart" placeholder="HH:MM">
                        </div>
                        <div ng-messages="formUpdateShift.updateShiftStart.$error" style="margin-bottom:10px;font-style: italic; color: red"">
                            <div ng-message="required">*This Field is Required</div>
                            <div ng-message="minlength">A minimum of 5 characters is required.</div>
                            <div ng-message="pattern">You Must enter the time in military format (e.g 02:30 or 14:23)</div>
                        </div>
                        <div class="form-group">
                            <label for="shiftend">Shift End Time:</label>
                            <input type="text" class="form-control" style="width:70px;" required ng-model="formData.shiftEnd" ng-pattern="/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/" name="updateShiftEnd" minlength="5" maxlength="5" id="shiftEnd" placeholder="HH:MM">
                        </div>
                        <div ng-messages="formUpdateShift.updateShiftEnd.$error"  style="margin-bottom:10px;font-style: italic; color: red" ">
                            <div ng-message="required">*This Field is Required</div>
                            <div ng-message="minlength">A minimum of 5 characters is required.</div>
                            <div ng-message="pattern">You Must enter the time in military format (e.g 02:30 or 14:23)</div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
