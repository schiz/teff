<?php $lang = Yii::app()->language; ?>
<div class="yellow-stripe-title-full">
    <h2 class="yellow-title"><?php echo Yii::t('strings', 'News') ?></h2>
</div>
<div class="container">
    <div class="row">
        <?php switch($lang):
            case 'ru' : ?>
                <?php foreach ($news as $_news) : ?>
                    <div class="page-item-block">
                        <h2 class="page-item-title"><?php date('d-m-Y',$_news->created_at) ?> <?php echo $_news->title_ru ?></h2>
                        <div class="small-description">
                            <?php if (isset($_news->image)): ?>
                            <a href='#img_modal' rel='img'>
                                <img src="images/news/<?php echo $_news->image ?>" alt="" class="page-item-img">
                            </a>
                            <?php endif ?>
                            <p class="page-item-description">
                                <?php echo $_news->content_ru ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endforeach;
                break;
            case 'ua' : ?>
                <?php foreach ($news as $_news) : ?>
                    <div class="page-item-block">
                        <h2 class="page-item-title"><?php date('d-m-Y',$_news->created_at) ?> <?php echo $_news->title_ua ?></h2>
                        <div class="small-description">
                            <?php if (isset($_news->image)): ?>
                            <a href='#img_modal' rel='img'>
                                <img src="images/news/<?php echo $_news->image ?>" alt="" class="page-item-img">
                            </a>
                            <?php endif ?>
                            <p class="page-item-description">
                                <?php echo $_news->content_ua ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endforeach;
                break;
            case 'en': ?>
                <?php foreach ($news as $_news) : ?>
                    <div class="page-item-block">
                        <h2 class="page-item-title"><?php date('d-m-Y',$_news->created_at) ?> <?php echo $_news->title_en ?></h2>
                        <div class="small-description">
                            <?php if (isset($_news->image)): ?>
                            <a href='#img_modal' rel='img'>
                                <img src="images/news/<?php echo $_news->image ?>" alt="" class="page-item-img">
                            </a>
                            <?php endif ?>
                            <p class="page-item-description">
                                <?php echo $_news->content_en ?>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endforeach;
                break;
        endswitch ?>

    </div>

</div>

<div class="overlay"></div>
<div class="popup" id="img_modal">
    <span class="close"></span>
    <img src='' style='width: 100%'>
    <div style='clear: both;'></div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("a[rel*=img]").click(function() {
            var popup_id = $('#img_modal');
            var img = $(this).children('img').attr('src');
            var img_arr = img.split('.');
            var img_origin = img_arr[0];
            $('#img_modal').children('img').attr('src',img_origin+'_origin.'+img_arr[1]);
            $(popup_id).show();
            $('.overlay').show();
        })

        $('.popup .close, .overlay').click(function() {
            $('.overlay, .popup').hide();

        })
    });
</script>