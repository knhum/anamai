<?php

use kartik\grid\GridView;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['report/index']];
$this->params['breadcrumbs'][] = 'รายงานนับถือศาสนา';

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'before' => 'รายงาน xxxx',
        'after' => 'ประมวลผล ณ ' . date('Y-m-d H:i:s')
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [ 'attribute' => 'hoscode',
            'header' => 'รหัสถานบริการ',
        ],
        [ 'attribute' => 'hosname',
            'format' => 'raw',
            'value' => function ($model) {
                $hoscode = $model['hoscode'];
                $hosname = $model['hosname'];
                return Html::a(Html::encode($hosname), ['report/report3', 'hoscode' => $hoscode]);
            }
                ],
                [ 'attribute' => 'total',
                    'header' => 'ประชากรทั้งหมด(คน)',
                ],
                [ 'attribute' => 'buddha',
                    'header' => 'ศาสนาพุทธ(คน)',
                ],
                [ 'attribute' => 'other',
                    'header' => 'อื่นๆ',
                ],
            ],
        ]);
?>
<?php
use miloschuman\highcharts\Highcharts;

echo Highcharts::widget([
   'scripts'=>[
       'highcharts-more',
       'themes/grid'
   ]
]);
?>
<div id="chart"></div>
<?php
//เริ่ม
$this->registerJs("
$(function () {
    $('#chart').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style=\"font-size:10px\">{point.key}</span><table>',
            pointFormat: '<tr><td style=\"color:{series.color};padding:0\">{series.name}: </td>' +
                '<td style=\"padding:0\"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }]
    });
});
");
//จบ
?>