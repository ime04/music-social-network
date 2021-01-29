<?php

$projectPath = __DIR__ . '/../../../';
return array_merge(
    include('CommonDefinitions.php'),
    include($projectPath . 'Profile/Config/Definitions.php')
);