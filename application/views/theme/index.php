<!--Statt Main Content-->
<section>
<div class="main-content">
<div class="row">
<div class="col-md-12 col-lg-12 col-sm-12 content-title"><h4>Dashboard</h4></div>

<!--Start container-fluid Div-->
<div class="container-fluid">
    <div class="clo-md-3 col-lg-3 col-sm-6">
    <div class="card-box">
        <div class="box-callout-green">
            <div class="rightside-cart">
                <p class="card-head">Current Day Income<br>  
                <canvas id="current-day-income" height="100" width="160"></canvas>
                <div class="cart-caption">
                <div class="cart-symbol"><b><?php echo get_current_setting('currency_code') ?></b></div>
                <div id="current-income-preview" class="cart-preview"></div></div>
            </div>
        </div>
    </div>
    </div>

    <div class="clo-md-3 col-lg-3 col-sm-6">
    <div class="card-box">
        <div class="box-callout-orange">

            <div class="rightside-cart">
                <p class="card-head">Current Day Expense<br>
                <canvas id="current-day-expense" height="100" width="160"></canvas>
                <div class="cart-caption">
                <div class="cart-symbol"><b><?php echo get_current_setting('currency_code') ?></b></div>
                <div id="current-expense-preview" class="cart-preview"></div></div>
            </div>
        </div>
    </div>
    </div>

    <div class="clo-md-3 col-lg-3 col-sm-6">
    <div class="card-box">
        <div class="box-callout-green">
            <div class="rightside-cart">
                <p class="card-head">Current Month Income<br>
                  <canvas id="current-month-income" height="100" width="160"></canvas>
                <div class="cart-caption">
                <div class="cart-symbol"><b><?php echo get_current_setting('currency_code') ?></b></div>  
                <div id="month-income-preview" class="cart-preview"></div></div>
            </div>
        </div>
    </div>
    </div>



    <div class="clo-md-3 col-lg-3 col-sm-6">
    <div class="card-box">
        <div class="box-callout-orange">
            <div class="rightside-cart">
                <p class="card-head">Current Month Expense<br>      
                <canvas id="current-month-expense" height="100" width="160"></canvas>
                <div class="cart-caption">
                <div class="cart-symbol"><b><?php echo get_current_setting('currency_code') ?></b></div>   
                <div id="month-expense-preview" class="cart-preview"></div></div>
            </div>
        </div>
    </div>
    </div>

    </div>
    <!--End Card box-->
</div>
<!--End container-fluid Div-->

<!--Start container-fluid Div-->
<div class="container-fluid">
    <div class="row">
            <!--Start Income Vs Expense Line Chart-->
            <div class="col-md-12 col-sm-12 col-lg-12">
            <!--Start Panel-->
            <div class="panel panel-default custom-box">
                <!-- Default panel contents -->
                <div class="panel-heading">Income Vs Expense</div>
                <div class="panel-body">
                    <!--<canvas id="inc_vs_exp2"></canvas>-->
                    <div id="inc_vs_exp2"></div>
                </div>
                <!--End Panel Body-->

            </div>
            <!--End Panel-->
            </div>
            <!--End Income Col-->


            <!--Start Income-->
            <div class="col-md-6 col-sm-6 col-lg-6">
            <!--Start Panel-->
            <div class="panel panel-default custom-box">
                <!-- Default panel contents -->
                <div class="panel-heading">Latest 5 Income</div>
                <div class="panel-body">
                    <!--Income Table-->
                    <table class="table table-bordered">
                        <th>Date</th>
                        <th>Description</th>
                        <th class="text-right">Amount</th>
                     <?php foreach($latest_income as $income){ ?>   
                        <tr>
                            <td><?php echo $income->trans_date ?></td>
                            <td><?php echo $income->note ?></td>
                            <td class="text-right"><?php echo get_current_setting('currency_code')." ".decimalPlace($income->amount) ?></td>
                        </tr>

                      <?php } ?>  

                    </table>
                </div>
                <!--End Panel Body-->

            </div>
            <!--End Panel-->
            </div>
            <!--End Income Col-->

            <!--Start Expense-->
            <div class="col-md-6 col-sm-6 col-lg-6">
            <!--Start Panel-->
            <div class="panel panel-default custom-box">
                <!-- Default panel contents -->
                <div class="panel-heading">Latest 5 Expense</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <th>Date</th>
                        <th>Description</th>
                        <th class="text-right">Amount</th>
                         <?php foreach($latest_expense as $expense){ ?>   
                        <tr>
                            <td><?php echo $expense->trans_date ?></td>
                            <td><?php echo $expense->note ?></td>
                            <td class="text-right"><?php echo get_current_setting('currency_code')." ".decimalPlace($expense->amount) ?></td>
                        </tr>

                      <?php } ?>  
                    </table>
                </div>
                <!--End Panel Body-->
            </div>
            <!--End Panel-->
            </div>
            <!--End Expense Col-->

            <!--Start Income Vs Expense Chart-->
            <div class="col-md-6 col-sm-6 col-lg-6">
            <div class="panel panel-default medium-box">
                <!-- Default panel contents -->
                <div class="panel-heading">Income Vs Expense </div>
                <div class="panel-body">
                    <div id="inc_vs_exp"></div>

                </div>
                <!--End Panel Body-->
            </div>
            <!--End Panel-->
            </div>
            <!--End Income Vs Expense Chart-->

            <!--Start Account Status-->
            <div class="col-md-6 col-sm-6 col-lg-6">
            <!--Start Panel-->
            <div class="panel panel-default medium-box">
                <!-- Default panel contents -->
                <div class="panel-heading">Financial Balance Status</div>
                <div class="panel-body financial-bal">
                    <table class="table table-bordered ">
                        <th>Account</th>
                        <th class="text-right">Balance</th>
                        <?php foreach($financialBalance as $balance) {?>
                        <tr>
                            <td><?php echo $balance->account ?></td>
                            <td class="text-right"><?php echo get_current_setting('currency_code')." ".decimalPlace($balance->balance) ?></td>
                        </tr>

                        <?php } ?>
               
                    </table>
                </div>
                <!--End Panel Body-->
            </div>
            <!--End Panel-->
            </div>
            <!--End Account Status Col-->
       
</div>
<!--End container-fluid Div-->


</div>
<!--End Row-->
</div>
</section>
<!--End Main-content-->
<script src="<?php echo base_url() ?>/theme/js/gauge.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
    var chart;
    chart = c3.generate({
    bindto: '#inc_vs_exp2',
    data: {
        x: 'x',
//        xFormat: '%Y%m%d', // 'xFormat' can be used as custom format of 'x'
        columns: [
            ['x'

            <?php for($i=1;$i<=count($line_chart[0]);$i++){ 
             echo ",";    
             echo "'".$line_chart[0][$i]['date']."'"; 
            } ?>

            ],

           ['Income', 
            <?php for($i=1;$i<=count($line_chart[0]);$i++){ 
            echo  $line_chart[0][$i]['amount'].",";
            } ?>
            ],


            ['Expense', 
            <?php for($i=1;$i<=count($line_chart[1]);$i++){ 
            echo  $line_chart[1][$i]['amount'].",";
            } ?>
            ]
        ]
    },
    axis: {
        x: {
            type: 'timeseries',
            tick: {
                format: '%Y-%m-%d'
            }
        }
    }
});



chart = c3.generate({
bindto: '#inc_vs_exp',
data: {
columns: [
['Income', <?php echo $pie_data['income'] ?>],
['Expense', <?php echo $pie_data['expense'] ?>],
],
type: 'donut',
onclick: function(d, i) {
console.log("onclick", d, i);
},
onmouseover: function(d, i) {
console.log("onmouseover", d, i);
},
onmouseout: function(d, i) {
console.log("onmouseout", d, i);
}
},
color: {
pattern: ['#23c6c8', '#f39c12']
},
donut: {
title: "Income VS Expense"
}
});
  
});

//Current Day Income Gauge init
var opts = {
lines: 12, // The number of lines to draw
angle: 0, // The length of each line
lineWidth: 0.40, // The line thickness
pointer: {
length: 0.8, // The radius of the inner circle
strokeWidth: 0.035, // The rotation offset
color: '#34495e' // Fill color
},
limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
colorStart: '#23c6c8',   // Colors
colorStop: '#23c6c8',    // just experiment with them
strokeColor: '#E0E0E0',   // to see which ones work best for you
generateGradient: true
};
var target = document.getElementById('current-day-income'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = <?php echo $cart_summery['current_day_income']*1.4 ?>; // set max gauge value
gauge.animationSpeed = 100; // set animation speed (32 is default value)
gauge.set(<?php echo $cart_summery['current_day_income'] ?>); // set actual value	
gauge.setTextField(document.getElementById("current-income-preview"));	

//Current Day Expense Gauge init
var opts = {
lines: 12, // The number of lines to draw
angle: 0, // The length of each line
lineWidth: 0.40, // The line thickness
pointer: {
length: 0.8, // The radius of the inner circle
strokeWidth: 0.035, // The rotation offset
color: '#34495e' // Fill color
},
limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
colorStart: '#f39c12',   // Colors
colorStop: '#f39c12',    // just experiment with them
strokeColor: '#E0E0E0',   // to see which ones work best for you
generateGradient: true
};
var target = document.getElementById('current-day-expense'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = <?php echo $cart_summery['current_day_expense']*1.3 ?>; // set max gauge value
gauge.animationSpeed = 100; // set animation speed (32 is default value)
gauge.set(<?php echo $cart_summery['current_day_expense'] ?>); // set actual value	
gauge.setTextField(document.getElementById("current-expense-preview"));

//Current Month Income Gauge init
var opts = {
lines: 12, // The number of lines to draw
angle: 0, // The length of each line
lineWidth: 0.40, // The line thickness
pointer: {
length: 0.8, // The radius of the inner circle
strokeWidth: 0.035, // The rotation offset
color: '#34495e' // Fill color
},
limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
colorStart: '#23c6c8',   // Colors
colorStop: '#23c6c8',    // just experiment with them
strokeColor: '#E0E0E0',   // to see which ones work best for you
generateGradient: true
};
var target = document.getElementById('current-month-income'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = <?php echo $cart_summery['current_month_income']*1.4 ?>; // set max gauge value
gauge.animationSpeed = 100; // set animation speed (32 is default value)
gauge.set(<?php echo $cart_summery['current_month_income'] ?>); // set actual value	
gauge.setTextField(document.getElementById("month-income-preview"));

//Current Month Expense Gauge init
var opts = {
lines: 12, // The number of lines to draw
angle: 0, // The length of each line
lineWidth: 0.40, // The line thickness
pointer: {
length: 0.8, // The radius of the inner circle
strokeWidth: 0.035, // The rotation offset
color: '#34495e' // Fill color
},
limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
colorStart: '#f39c12',   // Colors
colorStop: '#f39c12',    // just experiment with them
strokeColor: '#E0E0E0',   // to see which ones work best for you
generateGradient: true
};
var target = document.getElementById('current-month-expense'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue =<?php echo $cart_summery['current_month_expense']*1.6 ?>  // set max gauge value
gauge.animationSpeed = 100; // set animation speed (32 is default value)
gauge.set(<?php echo $cart_summery['current_month_expense'] ?>); // set actual value	
gauge.setTextField(document.getElementById("month-expense-preview"));


</script>