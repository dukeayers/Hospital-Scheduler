<?php
include_once "php/headSection.php";
?>
<body  ng-app="calendarApp" ng-controller="controller" ng-init="getShifts()">
<?php
include_once "php/navBar.php";
?>

<div class="container">
    <div class="row text-center" style="margin-bottom:30px;">
        <h2 style="border-bottom:1px solid lightgray">Current Shift Blocks</h2>
    </div>

    <div class="row">
        <div class="col-sm-9">
            <div class="table-responsive text-center">
                <table class="table table-striped">
                    <thead>
                    <td>Shift ID</td>
                    <td>Shift Start Time</td>
                    <td>Shift End Time</td>
                    <td></td>
                    </thead>
                    <tbody>
                    <tr class="popOut" ng-repeat="data in shifts"  data-toggle="modal" data-target="#myModal" ng-click="getShiftDetails(data.ID,data.Start, data.End)"  >
                        <td>{{data.ID}}</td>
                        <td>{{data.Start}}</td>
                        <td>{{data.End}}</td>
                        <td><span class="glyphicon glyphicon-info-sign"></span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-3">
            <button class="btn btn-transparent" data-toggle="modal" data-target="#newShift" style="width:100%; font-weight:800;">Add New Shift</button>
            <button class="btn btn-transparent" style="width:100%; font-weight:800; margin-top:10px;">Delete Shift</button>
        </div>
    </div>

    <div class="row">

    </div>

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
                            <label for="shiftID">Shift ID:</label>
                            <input type="text" class="form-control" ng-model="addShift.shiftID" id="shiftID" placeholder="Enter Shift ID">
                        </div>
                        <div class="form-group">
                            <label for="shiftBegin">Shift Start:</label>
                            <input type="text" name="addShiftStart" class="form-control" style="width:80px;" required ng-pattern="/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/" minlength="5" maxlength="5" ng-model="addShift.shiftBegin" id="shiftBegin" placeholder="HH:MM">
                        </div>
                        <div ng-messages="formAddShift.addShiftStart.$error" style="margin-bottom:10px;">
                            <div ng-message="minlength">A minimum of 5 characters is required.</div>
                            <div ng-message="pattern">You Must enter the time in military format (e.g 02:30 or 14:23)</div>
                        </div>
                        <div class="form-group">
                            <label for="shiftClose">Shift End:</label>
                            <input type="text" name="addShiftEnd" class="form-control" style="width:80px;" required ng-pattern="/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/" minlength="5" maxlength="5" ng-model="addShift.shiftClose" id="shiftClose" placeholder="HH:MM">
                        </div>
                        <div ng-messages="formAddShift.addShiftEnd.$error" style="margin-bottom:10px;">
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
                            <input type="type" ng-pattern="/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/" style="width:70px;"  class="form-control input-xs" name="updateShiftStart" maxlength="5"  minlength="5" ng-model="formData.shiftStart" id="shiftStart" placeholder="HH:MM">
                        </div>
                        <div ng-messages="formUpdateShift.updateShiftStart.$error" style="margin-bottom:10px;">
                            <div ng-message="minlength">A minimum of 5 characters is required.</div>
                            <div ng-message="pattern">You Must enter the time in military format (e.g 02:30 or 14:23)</div>
                        </div>
                        <div class="form-group">
                            <label for="shiftend">Shift End Time:</label>
                            <input type="text" class="form-control" style="width:70px;"  ng-model="formData.shiftEnd" ng-pattern="/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/" name="updateShiftEnd" minlength="5" maxlength="5" id="shiftEnd" placeholder="HH:MM">
                        </div>
                        <div ng-messages="formUpdateShift.updateShiftEnd.$error" style="margin-bottom:10px;">
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