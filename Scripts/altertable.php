<?php

$con=mysqli_connect('localhost','indxx_demo','NA2;G+^}hcge','go_live');

$sql = "ALTER TABLE `index_description`
ADD `methodology` varchar(255) COLLATE 'latin1_swedish_ci' NOT NULL,
ADD `benchmark` text COLLATE 'latin1_swedish_ci' NOT NULL AFTER `methodology`";

mysqli_query($con, $sql);

$sql = "ALTER TABLE `indxx_charecterstics` ADD `live_date` varchar(255) COLLATE 'latin1_swedish_ci' NOT NULL ";

mysqli_query($con, $sql);
?>