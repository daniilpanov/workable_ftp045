<span class="header red">Отзывы</span>
<hr>

<?php

/** @var $reviews \app\models\ReviewsModel[] */

function reviewItem($item_name, $item_class, $item)
{
    if ($item)
        echo "<div class='row $item_class'><div class='col-md-4'>$item_name</div><div class='col-md-5'>$item</div></div>";
}
if ($reviews)
{
    foreach ($reviews as $review)
    {
        echo "<blockquote class='review'>";
        reviewItem("Автор", "author", $review->name);
        reviewItem("E-Mail", "email", $review->email);
        reviewItem("Рейтинг", "rating", echoRatingStars(5, "", (int) $review->rating, true));
        reviewItem("Отзыв", "content", $review->content);
        echo "</blockquote>";
    }
}
else
    echo "<h4>Здесь пока ещё нет ни одного отзыва. Будьте первым, кто его оставит!</h4>";
?>

<hr>
<br>
<!-- THE FORM FOR SENDING REVIEWS -->
<form method="post">
    <fieldset class="standard-form">
        <legend>ЗАПОЛНИТЕ ЭТУ ФОРМУ, ЧТОБЫ ОСТАВИТЬ ОТЗЫВ</legend>
        <!--  -->
        <input type="hidden" name="review">
        <!--  -->
        <div class="row">
            <div class="col-md-4">
                <label for="review-author">
                    Ваше имя <sup>&starf;</sup>:
                </label>
            </div>
            <div class="col-md-8">
                <input name="name" id="review-author" placeholder="Your name:" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="review-email">
                    Ваш e-mail <sup>&starf;</sup>:
                </label>
            </div>
            <div class="col-md-8">
                <input name="email" id="review-email" placeholder="Your email:" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>
                    Рейтинг:
                </label>
            </div>
            <div class="col-md-8">
                <div class="radio-label">
                    <?= echoRatingStars(5, "rating") ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="review-content">
                    Текст отзыва:
                </label>
            </div>
            <div class="col-md-8">
                <textarea name="content" id="review-content" placeholder="Your review:"></textarea>
            </div>
        </div>
        <div class="row"><hr></div>
        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">
                    Отправить отзыв
                </button>
            </div>
            <div class="col-md-4">
                <button type="reset" class="btn btn-warning">
                    Отмена
                </button>
            </div>
        </div>
    </fieldset>
</form>