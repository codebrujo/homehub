<?php

/* @var $this yii\web\View */
/* @var $title */

$this->title = $title;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>HOME HUB</h1>

        <p class="lead">Smart home sensors and devices connected for you.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Architecture</h2>

                <p>This section describes how smart components interface with each other and server side.
                    Due to different WiFi signal level microcontroller firmware implements mesh-network.
                    In other words each controller knows about his neighbours and play router role to
                    forward the messages from controllers placed out of WiFi coverage.
                </p>

                <p><a class="btn btn-default" href="?r=site/architecture">Architecture view &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>API</h2>

                <p>This section describes server API for smart devices and external services. Server side implements
                    RESTful methods to collect IoT data or provide the telemetry to external consumers.
                </p>

                <p><a class="btn btn-default" href="?r=site/api-description">API description &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Visualization</h2>

                <p>Page to view controllers and it's sensors data placement in house layout.
                    In accordance to user role it is possible to view indicators or manage
                    electrical equipment switches, temperature control settings and behavior scenarios.
                    </p>

                <p><a class="btn btn-default" href="?r=site/visualisation">Visualisation page &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
