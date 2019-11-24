<?php

function printImgs($models)
{
    echo "<div class='row center zoom-imgs'>";

    for ($i = 0; $i < count($models); $i++)
    {
        echo "<div class='col-md'><img src='files/" . $models[$i]->value . "' alt='Img№$i' class='img'></div>";

        if (($i+1) % 2 == 0)
            echo "<div class='w-100'></div>";
    }

    echo "</div>";
}

/** @var $factory_models \app\factories\ModelsFactory */
$factory_models = factory("models");

if (!$factory_models->searchModel("Constants", [], "const", true))
{
    $factory_models->createSomeModels("Constants", ['name' => []], '*', "const");
}

/** @var $top_products \app\models\ConstantsModel[] */
$top_products = $factory_models->searchModel("Constants", ['name' => "top-products"], "const");
/** @var $sidebar_img \app\models\ConstantsModel[] */
$sidebar_img = $factory_models->searchModel("Constants", ['name' => "sidebar-img"], "const");

//
printImgs($sidebar_img);

//
echo "<div class='header'>Top Products</div>";
printImgs($top_products);