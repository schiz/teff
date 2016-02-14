<!--Slider Wrapper-->
<script type="text/javascript">
    $(function(){
        $('#slides').slides({
            preload: true,
            generateNextPrev: true,
            generatePagination: false
        });
    });
</script>
<?php $lang = Yii::app()->language ?>

<div class="container footer-slider" id="slides">

    <ul class="slider-wrapper slides_container">
        <?php foreach ($articles as $article): ?>
        <li class="footer-slide">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/articles/<?php echo $article->image ?>" alt=""/>
            <a href="menus/<?php echo $article->menu_id ?>" class="titles-bottom">
                <?php switch($lang){
                    case 'ru': ?>
                        <h2><?php echo $article->name_ru; ?></h2>
                        <?php break;
                    case 'ua': ?>
                        <h2><?php echo $article->name_ua; ?></h2>
                <?php break;
                    case 'en': ?>
                        <h2><?php echo $article->name_en; ?></h2>
                        <?php break;
                } ?>

            </a>
            <?php switch($lang){
                case 'ru':
                    echo '<p>'.$article->content_ru.'</p>';
                    break;
                case 'ua':
                    echo '<p>'.$article->content_ua.'</p>';
                    break;
                case 'en':
                    echo '<p>'.$article->content_en.'</p>';
                    break;
            } ?>
        </li>
        <?php endforeach ?>
    </ul>
</div>