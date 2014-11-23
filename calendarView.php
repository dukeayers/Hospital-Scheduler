<?php
include_once "php/headSection.php";
?>
<body  ng-app="calendarApp" ng-controller="controller" ng-init="getCalendarData()">
<?php
include_once "php/navBar.php";
?>
<div class="container">
    <div class="row text-center">
        <h3 style="border-bottom:1px solid lightgray">Calendar View</h3>
    </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="calendarHead">
                    <td>Name</td>
                    <td>Monday</td>
                    <td>Tuesday</td>
                    <td>Wednesday</td>
                    <td>Thursday</td>
                    <td>Friday</td>
                    <td>Saturday</td>
                    <td>Sunday</td>
                </thead>
                <tbody>
                    <tr ng-repeat="data in requestData">
                        <td>{{data.Name}}</td>
                        <td class="popOut" data-toggle="modal" data-target="#shiftDetails" ng-click="getShiftDetails(data.Name,data.Start, data.End)" ng-repeat="shifts in data.Shift track by $index">
                                {{shifts}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>

<!-- Modal For Shift Details-->
<div class="modal fade" id="shiftDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Shift Details</h4>
            </div>
            <div class="modal-body">
                this will pull from the data base to display information regarding a persons shift.
                <tr ng-repeat="data in requestData">
                    Working: {{data.Name}}
                    Hours: {{shifts}}
                </tr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#swapShift">Swap Shift</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal For Swapping Shifts -->
<div class="modal fade" id="swapShift" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Swap Shift</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="shiftDay">Date to swap:</label>
                    <input type="text" class="form-control" ng-model="" id="shiftDay" placeholder="Date to swap shift">
                </div>
                <div class="form-group">
                    <label for="person">Person to swap:</label>
                    <input type="text" class="form-control" ng-model="" id="person" placeholder="Person to swap shift">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#timeOff">
    Request Time Off
</button>

<!-- Modal For Requesting Time Off-->
<div class="modal fade" id="timeOff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Shift Details</h4>
            </div>
            <div class="modal-body">
                From:
                <select>
                    <option value="Monday">Monday</option>
                    <option value="Monday">Tuesday</option>
                    <option value="Monday">Wednesday</option>
                    <option value="Monday">Thursday</option>
                    <option value="Monday">Friday</option>
                    <option value="Monday">Saturday</option>
                    <option value="Monday">Sunday</option>
                </select>
                To:
                <select>
                    <option value="Monday">Monday</option>
                    <option value="Monday">Tuesday</option>
                    <option value="Monday">Wednesday</option>
                    <option value="Monday">Thursday</option>
                    <option value="Monday">Friday</option>
                    <option value="Monday">Saturday</option>
                    <option value="Monday">Sunday</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#swapShift">Submit</button>
            </div>
        </div>
    </div>
</div>

<!--The below calls two partial templates-->
<div ng-include="'js/Template/dataTable.tpl.html'"></div>
<div ng-include="'js/Template/calendarData.tpl.html'"></div>
<!-- This will call the modal template -->
<div ng-view></div>


</body>
</html>