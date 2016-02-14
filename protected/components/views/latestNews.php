<?php
/**
 * @var $lastNews
 * @var $this LatestNews
 */ ?>

<div class="column6 news">
    <div class="news-icon">
        <a href="news">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/news.png" alt=""/>
        </a>
    </div>
    <h2 class="news-title"><?php echo Yii::t('strings', 'News') ?></h2>
    <a href="news" class="spec-link push_right"><?php echo Yii::t('strings', 'All news'); ?></a>
    <ul class="latest-news">
    <?php foreach($lastNews as $news): ?>
        <?php switch (Yii::app()->language) {
            case 'ru': ?>
                <li><i><?php echo date('d-m-Y',$news->created_at) ?></i> <span><?php echo $news->title_ru ?></span> <a href="news/<?php echo $news->id ?>" class="news-link"><?php echo Yii::t('strings', 'Read more'); ?></a></li>
            <?php break;
            case 'ua': ?>
                <li><i><?php echo date('d-m-Y',$news->created_at) ?></i> <?php echo $news->title_ua ?> <span><a href="news/<?php echo $news->id ?>" class="news-link"><?php echo Yii::t('strings', 'Read more'); ?></a></span></li>
            <?php break;
            case 'en': ?>
                <li><i><?php echo date('d-m-Y',$news->created_at) ?></i> <?php echo $news->title_en ?> <span><a href="news/<?php echo $news->id ?>" class="news-link"><?php echo Yii::t('strings', 'Read more'); ?></a></span></li>
            <?php break;
        } ?>

    <?php endforeach; ?>
    </ul>
</div>

