<?php
session_start()
    ?>

<script src="../../scripts/js/search.js"></script>
<div class="container">
    <div class="row">
        <div class="col-sm-9 ">

            <div class="form-group row">
                <div class="col-xs-4">
                    <input class="form-control" type="text" id="searchWord" value="" onkeyup="search(this.value)">
                </div>
                <div class="col-xs-2">
                    <button class="btn btn-success" onclick="searchAll()"> get All</button>
                </div>
                <div class="col-xs-6">
                    <em>Please use input field to search for first and last name (as well as for supervisor) and position.</em>
                </div>
            </div>

        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Position</th>
                    <th>Phone number</th>
                    <th>Supervisor</th>
                </tr>
                </thead>
                <tbody id="searchbody">
                </tbody>
            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
    </div>
</div>

<script src="../../scripts/js/search.js"></script>
