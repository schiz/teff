
<!--Block Calculate-->
<script type="text/javascript">
    $(document).ready(function() {
        $("a[rel*=modal]").leanModal({ top : 80, overlay : .6, closeButton: ".modal_close" });
    });
</script>

<div id="modal">
    <div id="calculate">
        <div id="modal-title-back">
            <h2 class="modal-title"><?php echo Yii::t('strings', 'The calculation of the unit cost of heat') ?> <br>
                <?php echo Yii::t('strings', 'the combustion of different types of fuel') ?></h2>
            <a class="modal_close" href="#modal"></a>
        </div>
        <form class="calculate-modal-value">
            <label for="enterValue">Введите значение тепловой нагрузки оборудования [кВт]</label><br>
            <input type="text" id="enterValue">
        </form>

        <div class="table-calculate-wrapper">
            <table class="table-calculate">

                    <tr>
                        <th></th>
                        <?php foreach($fuels as $fuel): ?>
                            <?php switch(Yii::app()->language):
                                case 'ru':
                                    $name_parts = explode(' ',Yii::t('admin',$fuel->fuel_name_ru));
                                    break;
                                case 'ua':
                                    $name_parts = explode(' ',Yii::t('admin',$fuel->fuel_name_ua));
                                    break;
                                case 'en':
                                    $name_parts = explode(' ',Yii::t('admin',$fuel->fuel_name_en));
                                    break;
                            endswitch ?>
                            <th>
                            <?php foreach($name_parts as $name_part): ?>
                                <?php echo $name_part ?><br>
                            <?php endforeach ?>
                            </th>
                        <?php endforeach ?>
                    </tr>
                <tr id='ncv'>
                    <td class="left-header">Низшая теплота <br>сгорания [кг]</td>
                    <?php foreach($fuels as $fuel): ?>
                        <td class="grey-value" id="fuel_<?php echo $fuel->id ?>"><?php echo $fuel->net_calorific_value ?></td>
                    <?php endforeach ?>
                </tr>
                <tr class="bottom-padding">
                    <td></td>
                </tr>
                <tr id='expenditure'>
                    <td class="left-header">Расходa <br>топлива [кг/ч]</td>
                    <td class="grey-value" id='gas'></td>
                    <td class="grey-value" id='heating_fuel'></td>
                    <td class="grey-value" id='husks'></td>
                    <td class="grey-value" id='husks_granulated'></td>
                    <td class="grey-value" id='chopped_straw'></td>
                </tr>
                <tr class="bottom-padding">
                    <td></td>
                </tr>
                <tr id='fuel_cost'>
                    <td class="left-header">Стоимость <br>топлива [грн]</td>
                    <?php foreach($fuels as $fuel): ?>
                    <td class="another-value" id="fuel_cost_<?php echo $fuel->id ?>"><?php echo $fuel->cost->cost ?><br></td>
                    <?php endforeach ?>
                </tr>
            </table>
        </div>

    </div>
</div>

<a href="#modal" name="modal" rel="modal" class="calculate-button">
    <div class="column6 calculate">
        <div class="calc-icon">
            <!-- <a href="#modal" name="modal" rel="modal"> -->
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/calc.png" alt=""/>
            <!-- </a> -->
        </div>
        <h2 class="calc-title"><?php echo Yii::t('strings', 'Calculator efficiency'); ?></h2>
        <p>
        <?php echo Yii::t('strings', 'The calculator can calculate the efficiency of how various factors affect the cost of fuel.') ?>
        </p>
    </div>
</a>

<script type='text/javascript'>
    $(function() {
        var kpd = {
            0: 0.98, //gas
            1: 0.98,  //heating fuel
            2: 0.8,   //husks granulated
            3:  0.8,  //husks
            4: 0.8  //chopped straw
        }
        var ncv = $('#ncv').find('td.grey-value');
        var expenditure = $('#expenditure').find('td.grey-value');
        console.log('***ncv',ncv.eq(1).text());
        $('#enterValue').on('textchange',function() {
            $.each(kpd,function(i,val) {
                //expenditure[i] = ncv.eq(i)/1,163;
                var value = ncv.eq(i).text()/1.163/$('#enterValue').val() * 1000/kpd[i];
                if (!value || value == 'Infinity') {
                    value = '';
                } else {
                    value = parseFloat(value).toFixed(4);
                }

                expenditure.eq(i).html(value);
            })
            console.log('%%expenditure',expenditure);
        });


    });
</script>