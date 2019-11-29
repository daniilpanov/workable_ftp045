<?php
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
//
$links = \app\factories\Factory::models()
    ->createSomeModels(
        "Pages",
        ['language' => \engine\root\Kernel::get()->app()->language],
        "id, name",
        "menu"
    );
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
                $id = $link->id;
                $name = $link->name;

                tagA($id, $name);
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
    <div class="col-md-4 sidebar">
        <?php
        //
        show_view("sidebar", "components");
        ?>
    </div>

    <!-- Content -->
    <div class="col-md-8" id="content">
        <?php
        //
        \app\commands\RenderCommands::makeVisible();
        ?>
    </div>
</div>
