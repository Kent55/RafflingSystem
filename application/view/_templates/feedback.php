<?php

// get the feedback (they are arrays, to make multiple positive/negative messages possible)
$feedback_positive = Session::get('feedback_positive');
$feedback_negative = Session::get('feedback_negative');

// echo out positive messages
if (isset($feedback_positive)) {
    ?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php
    foreach ($feedback_positive as $feedback) {
        echo $feedback . '<br />';
    }
    ?>
    </div>
    <?php
}

// echo out negative messages
if (isset($feedback_negative)) {
    ?>
        <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php
    foreach ($feedback_negative as $feedback) {
        echo $feedback . '<br />';
    }
    ?>
    </div>
    <?php
}
