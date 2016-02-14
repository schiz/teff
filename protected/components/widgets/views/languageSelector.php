<?php
/**
 *@var $languages
 *@var $currentLang
 */

if(sizeof($languages) < 5)
{
    $lastElement = end($languages);
    foreach($languages as $key=>$lang) {
        if($key != $currentLang) {
            echo CHtml::link( $lang, $this->getOwner()->createMultilanguageReturnUrl($key));
        }
        else {
            echo '<a href class="active">'.$lang.'</a>';
        }
        if($lang != $lastElement) echo '  ';
    }
}

?>