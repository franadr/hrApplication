<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 13/11/2017
 * Time: 08:25
 */
session_start();
require_once __DIR__."/../../scripts/php/dbscripts.php";
?>






<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div id="facultyCount" style="height: 400px; width: 100%;"></div>
        </div>
        <div class="col-sm-4">
            <div id="catcount" style="height: 400px; width: 100%;"></div>
        </div>
        <div class="col-sm-4">
            <div id="salavg" style="height: 400px; width: 100%;"></div>
        </div>

    </div>
    <div class="row">

        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
    </div>
</div>
<script src="../../scripts/js/statistics.js"></script>

