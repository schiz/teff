<?php $lang = Yii::app()->language; ?>
<?php if ($menu->parent_id == 0) : ?>
<div class="yellow-stripe-title">
    <?php switch($lang) :
        case 'ru': ?>
            <h2 class="yellow-title"><?php echo $menu->name_ru; ?></h2>
            <?php break;
        case 'ua': ?>
            <h2 class="yellow-title"><?php echo $menu->name_ua; ?></h2>
            <?php break;
        case 'en': ?>
            <h2 class="yellow-title"><?php echo $menu->name_en; ?></h2>
            <?php break;
    endswitch;?>

</div>
<div class="sub-menu-yellow-stripe">
    <div class="container">
        <ul class="menu-navs-items">
            <?php switch($lang) :
                case 'ru': ?>
                    <?php foreach ($sub_menus as $sub_menu) : ?>
                        <?php if ($sub_menu->id == $active_id): ?>
                            <li class="any-block"><a href="/menus/<?php echo $sub_menu->id ?>" class="active"><?php echo $sub_menu->name_ru ?></a></li>
                        <?php else: ?>
                            <li><a href="/menus/<?php echo $sub_menu->id ?>"><?php echo $sub_menu->name_ru ?></a></li>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php break;
                case 'ua': ?>
                    <?php foreach ($sub_menus as $sub_menu) : ?>
                        <?php if ($sub_menu->id == $active_id): ?>
                            <li class="any-block"><a href="/menus/<?php echo $sub_menu->id ?>" class="active"><?php echo $sub_menu->name_ua ?></a></li>
                        <?php else: ?>
                            <li><a href="/menus/<?php echo $sub_menu->id ?>"><?php echo $sub_menu->name_ua ?></a></li>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php break;
                case 'en': ?>
                    <?php foreach ($sub_menus as $sub_menu) : ?>
                        <?php if ($sub_menu->id == $active_id): ?>
                            <li class="any-block"><a href="/menus/<?php echo $sub_menu->id ?>" class="active"><?php echo $sub_menu->name_en ?></a></li>
                        <?php else: ?>
                            <li><a href="/menus/<?php echo $sub_menu->id ?>"><?php echo $sub_menu->name_en ?></a></li>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php break;
            endswitch;?>
        </ul>
    </div>
</div>
<?php endif ?>

<div class="container">
    <div class="row">
        <?php switch($lang) :
            case 'ru': ?>
                <?php foreach($articles as $article): ?>
                    <div class="page-item-block">
                        <h2 class="page-item-title"><?php echo $article->name_ru ?></h2>
                        <div class="small-description">
                            <?php if (isset($article->image)): ?>
                            <a href='#img_modal' rel='img'>
                                <img src="/images/articles/<?php echo $article->image ?>" alt="" class="page-item-img">
                            </a>
                            <?php endif ?>
                            <p class="page-item-description">
                                <?php echo $article->content_ru ?>
                            </p>
                        </div>
                        <div class='clear'></div>
                    </div>
                <?php endforeach;
                break;
            case 'ua':
                foreach($articles as $article): ?>
                    <div class="page-item-block">
                        <h2 class="page-item-title"><?php echo $article->name_ua ?></h2>
                        <div class="small-description">
                            <?php if (isset($article->image)): ?>
                            <a href='#img_modal' rel='img'>
                                <img src="/images/articles/<?php echo $article->image ?>" alt="" class="page-item-img">
                            </a>
                            <?php endif ?>
                            <p class="page-item-description">
                                <?php echo $article->content_ua ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach;
                break;
            case 'en': ?>
                <?php foreach($articles as $article): ?>
                    <div class="page-item-block">
                        <h2 class="page-item-title"><?php echo $article->name_en ?></h2>
                        <div class="small-description">
                            <?php if (isset($article->image)): ?>
                            <a href='#img_modal' rel='img'>
                                <img src="/images/articles/<?php echo $article->image ?>" alt="" class="page-item-img">
                            </a>
                            <?php endif ?>
                            <p class="page-item-description">
                                <?php echo $article->content_en ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach;
                break;
        endswitch;?>
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