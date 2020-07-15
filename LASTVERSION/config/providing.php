<?php

$pc = new \app\models\ProvidingConfig();
\app\App::get()->setInfo('default_providers', $pc);

return [
    // <Providing class (namespace)> => <provider (class only)>

];