<?php
if (($mail = \app\factories\Factory::controllers()->getController("GuestActions")->mail_sent) !== null)
{
    if ($mail)
    {
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">Ваше письмо успешно отправлено!</h4>
            <p>Мы пришлём Вам ответ на указанную Вами почту в течение нескольких дней.
        </div>
        <?php
    }
    else
    {
        ?>
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">При отправке Вашего письма произошла ошибка!</h4>
            <p>Ваше письмо не было отправлено! Попробуйте перезагрузить страницу и повторить попытку.
            <p>Вы также можете связаться с нами по телефону, или написав письмо на адрес электронной почты:
            <p class="m-b-0 center"><a href="mailto:memonik@inbox.ru">memonik@inbox.ru</a></p>
        </div>
        <?php
    }
}
?>
<p>
    <span class="header red">Контакты</span>
</p>

<?php
if (@$_GET['product'])
{
    ?>
    <form method="post">
        <fieldset class="lpadd standard-form">
            <legend>ОБРАТНАЯ СВЯЗЬ ПО ПОВОДУ ТОВАРА <br> <?= $_GET['product'] ?></legend>

            <input type="hidden" name="contacts">
            <div class="row">
                <div class="col-md-3">
                    <label for="1">ФИО/Фирма <sup>&starf;</sup>:</label>
                </div>
                <div class="col-md">
                    <input type="text" id="1" name="company" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="2">E-Mail <sup>&starf;</sup>:</label>
                </div>
                <div class="col-md">
                    <input type="email" id="2" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="3">Тема:</label>
                </div>
                <div class="col-md">
                    <input type="text" id="3" name="subject" value='<?= $_GET['product'] ?>'>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label for="4">Текст: </label>
                </div>
                <div class="col-md">
                    <textarea id="4" name="message"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md">
                    <button type="submit" class="btn btn-outline-success">Отправить</button>
                </div>
            </div>
        </fieldset>
    </form>
    <?php
}
else
{
    ?>
    <div class="frame" itemscope itemtype="http://schema.org/Organization">
        <div class="frame-item center lpadd">
            <p><span class="excl darkblue" itemprop="name">
                Группа компаний "Студия Ступени"<br> и Дизайн-студия Panoff-design
            </span></p>
            <p></p>
            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                <span itemprop="addressLocality">Санкт-Петербург,</span>
                <span itemprop="streetAddress">
                Ленинский пр., 140Е оф 351<br>
                тц "Загородный дом", модуль 351
            </span>
            </div>
            <p>
            <h5><u>время работы</u>:</h5>
            <ul style="text-align: left; width: 40%; display: inline-block">
                <li><i>будни</i> &mdash; <time><b>с 10-00 до 20-00</b></time></li>
                <li><i>суббота &mdash; <b>выходной</b></i></li>
                <li><i>воскресенье &mdash; <time><b>с 11-00 до 18-00</b></time></i></li>
            </ul>
            </p>
            <p><span class="excl darkblue">Звоните нам!</span></p>
            <div class="row">
                <div class="col-md">
                    Телефон:
                </div>
                <div class="col-md">
                    <b>
                    <span itemprop="telephone">
                        +7 (921) 960-95-51
                    </span>
                        <br>
                        <span itemprop="telephone">
                        +7 (901) 301-25-52
                    </span>
                    </b>
                </div>
            </div>
            <p><span class="excl darkblue">Пишите нам!</span></p>
            <div class="row">
                <div class="col-md">
                    Электронная почта:
                </div>
                <div class="col-md">
                    <a class="red no-underline" href="mailto:memonik@inbox.ru">
                    <span itemprop="email">
                        memonik@inbox.ru
                    </span>
                    </a>
                </div>
            </div>
        </div>
        <form class="frame-item center standard-form text-left" method="post">
            <input type="hidden" name="contacts">
            <p><div class="excl darkblue text-center">Или заполните контактный формуляр:</div></p>
            <div class="row">
                <div class="col-md-3">
                    <label for="1">ФИО/Фирма <sup>&starf;</sup>:</label>
                </div>
                <div class="col-md">
                    <input type="text" id="1" name="company" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="2">E-Mail <sup>&starf;</sup>:</label>
                </div>
                <div class="col-md">
                    <input type="email" id="2" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="3">Тема:</label>
                </div>
                <div class="col-md">
                    <input type="text" id="3" name="subject">
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label for="4">Текст: </label>
                </div>
                <div class="col-md">
                    <textarea id="4" name="message"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md">
                    <button type="submit" class="btn btn-outline-success">Отправить</button>
                </div>
            </div>
        </form>
    </div>
    <?php
}
?>

