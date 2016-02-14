<?php

class Menu extends CWidget
{
    public function run()
    {
        $menus = Menus::model()->findAll(array('condition' => 'parent_id = 0 AND dynamic = 1','order' => 'position','limit'=>6));
        $submenus = Menus::model()->findAll('parent_id > 0');
        $menu_sub = array();
        foreach($submenus as $submenu) {
            $menu_sub[$submenu->parent_id][] = $submenu;
        }
        $this->render('menu', array(
            'menus'=> $menus,
            'submenu'=>$menu_sub
        ));
    }
}