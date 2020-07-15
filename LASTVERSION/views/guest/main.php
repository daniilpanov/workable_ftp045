<?php

//
function pagesSort($id = 0)
{
    $result = [];
    $pages = \app\factories\Factory::models()->searchModel("PagesModel", ['parent' => $id], "menu");

    if ($pages)
    {
        foreach ($pages as $item)
        {
            if ($tmp = pagesSort($item->id))
                $result[] = ['parent' => $item, 'submenu' => $tmp];
            else
                $result[] = $item;
        }
    }

    return $result;
}

//
function tagA($id, $name)
{
    echo "<li class='nav-item"
        . (@$_GET['page'] == $id
            ? " active" : "")
        . "'>";
    $name = mb_strtoupper($name);
    echo ($id === null)
        ? "<a class='nav-link' href='" . PHP_DOMAIN . "'>$name</a>"
        : "<a class='nav-link' href='?page=$id'>$name</a>";
    echo "</li>";
}

function dropdownItem($id, $name)
{
    echo "<li><a href='?page=$id'>$name</a></li>";
}

/**
 * @param $menu \app\models\PagesModel[]
 * @param $first_level bool
 */
function dropdownMenu($menu, $first_level = true)
{
    echo "<li class='dropdown" . ($first_level ? "" : " dropdown-submenu") . "'>";
    if ($menu['parent']->is_link)
    {
        echo "<a href='?page=" . $menu['parent']->id . "'>" . $menu['parent']->name . "</a>";
        echo "<a class='dropdown-toggle empty' data-toggle='dropdown'><b class='caret'></b></a>";
    }
    else
    {
        echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>" . $menu['parent']->name . "&emsp;<b class='caret'></b></a>";
    }
    echo "<ul class='dropdown-menu'>";

    foreach ($menu['submenu'] as $submenu_item)
    {
        if (is_array($submenu_item))
            dropdownMenu($submenu_item, false);
        else
            dropdownItem($submenu_item->id, $submenu_item->name);
    }

    echo "</ul>";
    echo "</li>";
}

//
$links = pagesSort();
?>
<!-- Top Menu -->
<nav id="menu" class="navbar navbar-expand-md">
    <button class="navbar-toggler" type="button"
            data-toggle="collapse" data-target="#menu-links"
            aria-controls="menu-links" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">Показать меню</span>
    </button>

    <div class="collapse navbar-collapse" id="menu-links">
        <ul class="navbar-nav mr-auto">
            <?php
            tagA(null, "home");
            tagA("contacts", "contacts");
            tagA("reviews", "reviews");

            foreach ($links as $link)
            {
                if (is_array($link))
                {
                    dropdownMenu($link);
                }
                else
                {
                    $id = $link->id;
                    $name = $link->name;

                    tagA($id, $name);
                }
            }
            ?>
        </ul>
        <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
    </div>
</nav>


<div class="row" id="after-menu">
    <!-- Sidebar -->
    <div class="col-4 sidebar">
        <?php
        //
        show_view("sidebar", "components");
        ?>
    </div>

    <!-- Content -->
    <div class="col-8" id="content">
        <?php
        //
        controller("Render")->makeVisible();
        ?>
    </div>
</div>
