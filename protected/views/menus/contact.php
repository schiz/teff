<?php
$this->pageTitle=Yii::t('strings', 'Contacts');
?>
</div>

<!--Контент-->
<div class="yellow-stripe-title-full">
    <h2 class="yellow-title"><?php echo Yii::t('strings', 'Contacts') ?></h2>
</div>

<div class="container contacts">
    <div class="contact-blocks">
        <i class="icons-contacts-place"></i>
        <div class="contacts-field">
            <h4 class="contact-title"><?php echo Yii::t('strings', 'Address') ?></h4>
            <p>65013 <br/>
                <?php echo Yii::t('strings', 'Odessa region') ?><br/>
                <?php echo Yii::t('strings', 'sity Odessa'); ?><br/>
                <?php echo Yii::t('strings', 'Nikolaevskaya doroga'); ?><br/>
                <?php echo Yii::t('strings', 'house 128') ?></p>
        </div>
    </div>
    <div class="contact-blocks">
        <i class="icons-contacts-phone"></i>
        <div class="contacts-field">
            <h4 class="contact-title"><?php echo Yii::t('strings', 'Phone') ?> <br>
                <?php echo Yii::t('strings', 'Fax') ?></h4>
            <br><br>
            <a href="tel:0487786776">
                <p>[048] 778-67-76</p>
            </a>
        </div>
    </div>
    <div class="contact-blocks">
        <div class="icons-contacts-mail"></div>
        <div class="contacts-field">
            <h4 class="contact-title"><?php echo Yii::t('strings', 'E-mail') ?><br>
                <?php echo Yii::t('strings', 'address') ?></h4>
            <br><br>
            <a href="mailto:teff@meta.ua">
                <p>teff@meta.ua</p>
            </a>
        </div>
    </div>
    <!-- Карта -->
    <script type="text/javascript">


    </script>

    <div class="contact-map" id="map">
        <iframe width="901" height="401" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ua/maps?f=d&amp;source=s_d&amp;saddr=46.534274,30.735792&amp;daddr=&amp;hl=ru&amp;geocode=&amp;sll=46.534274,30.73576&amp;sspn=0.002,0.005284&amp;mra=mift&amp;mrsp=0&amp;sz=18&amp;ie=UTF8&amp;t=m&amp;ll=46.534274,30.735755&amp;spn=0.00296,0.009656&amp;z=17&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.ua/maps?f=d&amp;source=embed&amp;saddr=46.534274,30.735792&amp;daddr=&amp;hl=ru&amp;geocode=&amp;sll=46.534274,30.73576&amp;sspn=0.002,0.005284&amp;mra=mift&amp;mrsp=0&amp;sz=18&amp;ie=UTF8&amp;t=m&amp;ll=46.534274,30.735755&amp;spn=0.00296,0.009656&amp;z=17" style="color:#0000FF;text-align:left"></small></a>
    </div>
</div>
<div class="back-for-bottom"></div>

