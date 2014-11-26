<!-- Includes -->
<?php
$title = 'Employee Editor';
include_once "php/headSection.php";
include_once "php/navBar.php";
include_once "php/sideBar.php";
include_once "php/footer.php";
?>

<body  ng-app="calendarApp" ng-controller="controller" ng-init="getEmployees()">

<div class="container">
    <div class="row text-center">
        <h3 style="border-bottom:1px solid lightgray">Administration View - Employee Editor</h3>
    </div>
</div>

<div class="container">
    <div class="btn-group btn-group-lg" role="group" aria-label="...">
        <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#newEmployee">New Employee</button>
        <button type="button" class="btn btn-default disabled">Edit</button>
        <button type="button" class="btn btn-danger disabled">Delete</button>
    </div>



    <table id="staff" class="table table-striped table-hover tablebordertop">
        <thead>
        <tr>
            <!--<th>ID</th>-->
            <th>UID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>User Type</th>
        </tr>
        </thead>

        <tbody>
        <tr class="" ng-repeat="data in employee" data-toggle="modal" data-target="#updateEmployee" ng-click="getEmployeeDetails(data.ID, data.uid, data.fname, data.lname, data.usertype)">
            <!--<td>{{data.ID}}</td> -->
            <td>{{data.uid}}</td>
            <td>{{data.fname}}</td>
            <td>{{data.lname}}</td>
            <td>{{data.usertype}}</td>
        </tr>
        </tbody>
    </table>
</div>

<!--Modal for Adding a New Employee to Employees Table -->
<div class="modal fade" id="newEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Employee</h4>
            </div>
            <form ng-submit="addNewEmployee()" name="formAddEmployee" role="form">
                <div class="modal-body">
                    <div class="alert alert-success text-center" ng-show="successMessage" role="alert">
                        <h3>{{successMessage}}</h3>
                    </div>

                    <!--UserID Input -->
                    <div class="form-group">
                        <label for="employeeUID">User ID (UID):</label>
                        <input type="text" name="addEmployeeUID" class="form-control" style="width:230px;" required maxlength="20" ng-model="addEmployee.employeeUID" id="employeeUID" placeholder="">
                    </div>
                    <!--UserID Validation -->
                    <div ng-messages="formAddEmployee.addEmployeeUID.$error" style="margin-bottom:10px; font-style: italic; color: red">
                        <div ng-message="required">*This Field is Required</div>
                    </div>
                    <!--First Name Input -->
                    <div class="form-group">
                        <label for="employeeFirstName">Employee First Name:</label>
                        <input type="text" name="addEmployeeFirstName" class="form-control" style="width:460px;" required maxlength="40" ng-model="addEmployee.employeeFirstName" id="employeeFirstName" placeholder="">
                    </div>
                    <!--First Name Validation -->
                    <div ng-messages="formAddEmployee.addEmployeeFirstName.$error" style="margin-bottom:10px; font-style: italic; color: red">
                        <div ng-message="required">*This Field is Required</div>
                    </div>
                    <!--Last Name Input -->
                    <div class="form-group">
                        <label for="employeeLastName">Employee Last Name:</label>
                        <input type="text" name="addEmployeeLastName" class="form-control" style="width:460px" required maxlength="40" ng-model="addEmployee.employeeLastName" id="employeeLastName" placeholder="">
                    </div>
                    <!--Last Name Validation -->
                    <div ng-messages="formAddEmployee.addEmployeeLastName.$error" style="margin-bottom:10px; font-style: italic; color: red">
                        <div ng-message="required">*This Field is Required</div>
                    </div>
                    <!--Employee Role -->
                    <div class="form-group">
                        <label for="employeeType">Select Employee Type: </label>
                        <select name="addEmployeeType" required id="employeeType" class="form-control" ng-model="addEmployee.employeeType" style="font-size: large">
                            <!--<option value="0">Former Employee</option>-->
                            <option value="">-Select your option-</option>
                            <option value="1">Employee</option>
                            <option value="2">Administrator</option>
                        </select>
                    </div>
                    <!--Employee Role Validation -->
                    <div ng-messages="formAddEmployee.addEmployeeType.$error" style="margin-bottom:10px; font-style: italic; color: red">
                        <div ng-message="required">*This Field is Required</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add New Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal for Updating an Employee in the Employees Table -->
<div class="modal fade" id="updateEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel2">View Employee Details</h4>
            </div>
            <form ng-submit="updateEmployee()" name="formUpdateEmployee" role="form">
                <div class="modal-body">
                    <div class="alert alert-success text-center" ng-show="successMessage" role="alert">
                        <h3>{{successMessage}}</h3>
                    </div>

                    <!--UserID Input -->
                    <div class="form-group">
                        <label for="employeeUID">User ID (UID):</label>
                        <input type="text" name="updateEmployeeUID" class="form-control" style="width:230px;" required maxlength="20" ng-model="formData.employeeUID" id="employeeUID">
                    </div>
                    <!--UserID Validation -->
                    <div ng-messages="formUpdateEmployee.updateEmployeeUID.$error" style="margin-bottom:10px; font-style: italic; color: red">
                        <div ng-message="required">*This Field is Required</div>
                    </div>
                    <!--First Name Input -->
                    <div class="form-group">
                        <label for="employeeFirstName">Employee First Name:</label>
                        <input type="text" name="updateEmployeeFirstName" class="form-control" style="width:460px;" required maxlength="40" ng-model="formData.employeeFirstName" id="employeeFirstName">
                    </div>
                    <!--First Name Validation -->
                    <div ng-messages="formUpdateEmployee.updateEmployeeFirstName.$error" style="margin-bottom:10px; font-style: italic; color: red">
                        <div ng-message="required">*This Field is Required</div>
                    </div>
                    <!--Last Name Input -->
                    <div class="form-group">
                        <label for="employeeLastName">Employee Last Name:</label>
                        <input type="text" name="updateEmployeeLastName" class="form-control" style="width:460px" required maxlength="40" ng-model="formData.employeeLastName" id="employeeLastName">
                    </div>
                    <!--Last Name Validation -->
                    <div ng-messages="formUpdateEmployee.updateEmployeeLastName.$error" style="margin-bottom:10px; font-style: italic; color: red">
                        <div ng-message="required">*This Field is Required</div>
                    </div>
                    <!--Employee Role -->
                    <div class="form-group">
                        <label for="employeeType">Select Employee Type: </label>
                        <select name="updateEmployeeType" id="employeeType" required class="form-control" ng-model="formData.employeeType" style="font-size: large">
                            <!--<option value="0">Former Employee</option>-->
                            <option value="">-Select your option-</option>
                            <option value="1">Employee</option>
                            <option value="2">Administrator</option>
                        </select>
                    </div>
                    <!--Employee Role Validation -->
                    <div ng-messages="formUpdateEmployee.updateEmployeeType.$error" style="margin-bottom:10px; font-style: italic; color: red">
                        <div ng-message="required">*This Field is Required</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Employee Details</button>

                </div>
            </form>
        </div>
    </div>
</div>
</body>