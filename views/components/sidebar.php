<?php

function printImgs($models, $top = false)
{
    $counted = count($models);

    echo ($top)
        ? "<div class='frame'><div class='frame-item row center zoom-imgs'>"
        : "<div class='row center zoom-imgs'>";

    for ($i = 0; $i < $counted; $i++)
    {
        echo "<div class='col-md'><img src='" . (is_v3() ? "" : "v3/") . "files/" . $models[$i]->value . "' alt='Img№$i' class='img'></div>";

        if (($i+1) % 2 == 0 && $i + 1 < $counted)
            echo "<div class='w-100'></div>";
    }

    echo ($top) ? "<i class='red'>Мы предлагаем <wbr>различные стилевые решения.</i></div>" : "";
    echo "</div>";
}

/**
 * @param $models \app\models\PagesModel[]
 */
function printList($models)
{
    echo "<ul>";

    foreach ($models as $model)
    {
        echo "<li><a href='?page=" . $model->id . "'>" . mb_strtoupper($model->name) . "</a></li>";
    }

    echo "</ul>";
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
/** @var $sidebar_img \app\models\PagesModel[] */
$samples = $factory_models->searchModel("Pages", ['is_in_top' => "0"], "menu");

//
echo "<hr>";
printImgs($sidebar_img);
//
if (!empty($samples))
{
    echo "<hr><span class='excl'>Образцы наших работ</span>";
    printList($samples);
}
//
echo "<hr>";
printImgs($top_products, true);