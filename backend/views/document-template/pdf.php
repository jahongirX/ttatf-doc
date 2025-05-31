<?php

use common\components\StaticFunctions;
?>
<!DOCTYPE html>
<html>
<head>
    <title>PDF Document</title>
    <style>
        body { font-family: sans-serif; }
        h1 { color: #2e6da4; }
    </style>
</head>
<body>
    <?=StaticFunctions::kcfinder($model->body)?>
</body>
</html>