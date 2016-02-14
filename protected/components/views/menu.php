<?php
/**
 * @var $this Menu
 * @var $menus
 * @var $submenu
 */
?>
<?php $lang = Yii::app()->language; ?>
<div class="row">
    <ul class="nav">
        <?php foreach($menus as $menuItem):  ?>
        <li>
            <a href="/menus/<?php echo $menuItem->id ?>">
            <i class="<?php echo $menuItem->icon ?>"></i>
                <?php switch($lang) :
                    case 'ru': ?>
                        <?php echo $menuItem->name_ru ?></a>
                        <?php break;
                    case 'ua': ?>
                        <?php echo $menuItem->name_ua ?></a>
                        <?php break;
                    case 'en': ?>
                        <?php echo $menuItem->name_en ?></a>
                        <?php break;
                endswitch;?>

            <?php if (array_key_exists($menuItem->id,$submenu)): ?>
            <div class="sub-nav">
                <ul>
                <?php foreach($submenu[$menuItem->id] as $submenuItem) : ?>
                    <?php switch($lang) :
                        case 'ru': ?>
                            <li><a href="/menus/<?php echo $submenuItem->id ?>"><?php echo $submenuItem->name_ru ?></a></li>
                            <?php break;
                        case 'ua': ?>
                            <li><a href="/menus/<?php echo $submenuItem->id ?>"><?php echo $submenuItem->name_ua ?></a></li>
                            <?php break;
                        case 'en': ?>
                            <li><a href="/menus/<?php echo $submenuItem->id ?>"><?php echo $submenuItem->name_en ?></a></li>
                            <?php break;
                    endswitch;?>
                <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
        <li>
            <a href="/menus/contact"><i class="icons-contact"></i> <?php echo Yii::t('strings', 'Contacts'); ?></a>
        </li>
</ul>
</div>