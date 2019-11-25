<?php
/** @var $reviews \app\models\ReviewsModel[] */

function reviewItem($item_name, $item_class, $item)
{
    if ($item)
        echo "<p class='$item_class'>$item_name: $item</p>";
}

foreach ($reviews as $review)
{
    echo "<div class='review'>";
    reviewItem("Автор", "author", $review->name);
    reviewItem("E-Mail", "email", $review->email);
    reviewItem("Рейтинг", "rating", (int) $review->rating);
    reviewItem("Отзыв", "content", $review->content);
    echo "</div>";
}
?>

<!-- THE FORM FOR SENDING REVIEWS -->
<form method="post">
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
                <?php
                echoRatingStars(5, "rating")
                ?>
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
    <div class="row">
        <div class="col-md-12">
            <button type="submit">
                Отправить отзыв
            </button>
        </div>
    </div>
</form>