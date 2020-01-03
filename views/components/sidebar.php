<?php

function printImgs($models, $top = false)
{
    $counted = count($models);

    echo ($top)
        ? "<div class='frame'><div class='frame-item row center zoom-imgs'>"
        : "<div class='row center zoom-imgs'>";
    $i = 1;
    foreach ($models as $model)
    {
        echo "<div class='col-md'><img src='" . (is_v3() ? "" : "v3/") . "files/" . $model->value . "' alt='Img№$i' class='img'></div>";

        if ($i % 2 == 0 && $i < $counted)
            echo "<div class='w-100'></div>";

        $i++;
    }

    echo ($top) ? "<i class='red'>Мы предлагаем <wbr>различные стилевые решения.</i></div>" : "";
    echo "</div>";
}

/** @var $factory_models \app\factories\ModelsFactory */
$factory_models = factory("models");

if (!$factory_models->searchModel("Constants", [], "const", true))
{
    $factory_models->addGroup(
        \engine\base\GroupModel
            ::createGroupFromDB(
                "const",
                "ConstantsModel",
                "*", ['where' => [[]]]
            )
    );
    //createSomeModels("Constants", ['name' => []], '*', "const");
}

/** @var $top_products \app\models\ConstantsModel[] */
$top_products = $factory_models->searchModel("Constants", ['name' => "top-products"], "const");
/** @var $sidebar_img \app\models\ConstantsModel[] */
$sidebar_img = $factory_models->searchModel("Constants", ['name' => "sidebar-img"], "const");

//
echo "<hr>";
printImgs($sidebar_img);
//
echo "<hr>";
printImgs($top_products, true);