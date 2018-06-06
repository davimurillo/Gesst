 <?php require_once('common.php'); checkUser(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gessalud</title>
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/fullcalendar.min.css"/>
	<link href="asset/css/style.css" rel="stylesheet">
	<!-- end: Css -->
	<link rel="shortcut icon" href="asset/img/logomi.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 <body id="mimin" class="dashboard">
      <!-- start: Header -->
			  <?php require("cfg_cabecera.php"); ?>
	  <!-- end: Header -->
      <div class="container-fluid mimin-wrapper">
           <!-- start:Left Menu -->
		     <?php require("cfg_menu_izquierdo_actuar.php"); ?>
		    <!-- end:Left Menu -->
			<!-- start: content -->
            <div id="content">
                <div class="col-md-12" style="padding:20px;">
				<div class="col-md-12 padding-0">
						<div class="col-md-12 padding-0">
							
							<div class="col-md-3">
								<a href="#" >
									<div class="panel box-v1">
										<div class="progress progress-mini">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
												</div>
										</div>
										<div class="panel-heading bg-white border-none">
											<div class="col-md-12 col-sm-12 col-xs-12 text-left">
													<span class=" icon-direction icon text-left" style="font-Size:24px"></span>
											</div>
										</div>
										<div class="panel-body text-left" style="margin-top:-20px">
											<h1><strong>Informes</strong></h1>
											<p>Registro de Informes</p>
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-3">
								<a href="#" >
								<div class="panel box-v1">
									<div class="progress progress-mini">
											<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
											</div>
									</div>
									<div class="panel-heading bg-white border-none">
										<div class="col-md-12 col-sm-12 col-xs-12 text-left">
												<span class="icon-layers icon text-left" style="font-Size:24px"></span>
										</div>
									</div>
									<div class="panel-body text-left" style="margin-top:-20px">
										<h1><strong>Notificaciones</strong></h1>
										<p>Registro de Noticicación</p>
									</div>
								</div>
								</a>
							</div>
							<div class="col-md-3">
								<div class="panel box-v1">
									<div class="progress progress-mini">
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
											</div>
									</div>
									<div class="panel-heading bg-white border-none">
										<div class="col-md-12 col-sm-12 col-xs-12 text-left">
												<span class="icon-map icon text-left" style="font-Size:24px"></span>
										</div>
									</div>
									<div class="panel-body text-left" style="margin-top:-20px">
										<h1><strong>Planes Correctivos</strong></h1>
										<p>Registro y Control de Planes</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="panel box-v1">
									<div class="progress progress-mini">
											<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
											</div>
									</div>
									<div class="panel-heading bg-white border-none">
										<div class="col-md-12 col-sm-12 col-xs-12 text-left">
												<span class=" icon-drawar icon text-left" style="font-Size:24px"></span>
										</div>
									</div>
									<div class="panel-body text-left" style="margin-top:-20px">
										<h1><strong>Alertas</strong></h1>
										<p>Reporte de Alertas</p>
									</div>
								</div>
							</div>
					
					</div>
                    
					<div class="col-md-12 card-wrap padding-0">
                    <div class="col-md-6">
                        <div class="panel">
                          <div class="panel-heading bg-white border-none" style="padding:20px;">
                            <div class="col-md-6 col-sm-6 col-sm-12 text-left">
                              <h4>Line Chart</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-sm-12">
                                <div class="mini-onoffswitch pull-right onoffswitch-danger" style="margin-top:10px;">
                                  <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch1" checked>
                                  <label class="onoffswitch-label" for="myonoffswitch1"></label>
                                </div>
                            </div>
                          </div>
                          <div class="panel-body" style="padding-bottom:50px;">
                              <div id="canvas-holder1">
                                    <canvas class="line-chart" style="margin-top:30px;height:240px;"></canvas>
                              </div>
                              <div class="col-md-12" style="padding-top:20px;">
                                  <div class="col-md-4 col-sm-4 col-xs-6 text-center">
                                      <h2 style="line-height:.4;">$100.21</h2>
                                      <small>Total Accidentes</small>
                                  </div>
                                  <div class="col-md-4 col-sm-4 col-xs-6 text-center">
                                      <h2 style="line-height:.4;">2000</h2>
                                      <small>Total Emergencias</small>
                                  </div>
                                  <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                      <h2 style="line-height:.4;">$291.1</h2>
                                      <small>Total Incidencias</small>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                          <div class="panel-heading bg-white border-none" style="padding:20px;">
                            <div class="col-md-6 col-sm-6 col-sm-12 text-left">
                              <h4>Ocurrencias</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-sm-12">
                                <div class="mini-onoffswitch pull-right onoffswitch-primary" style="margin-top:10px;">
                                  <input type="checkbox" name="onoffswitch3" class="onoffswitch-checkbox" id="myonoffswitch3" checked>
                                  <label class="onoffswitch-label" for="myonoffswitch3"></label>
                                </div>
                            </div>
                          </div>
                          <div class="panel-body" style="padding-bottom:50px;">
                              <div id="canvas-holder1">
                                <canvas class="bar-chart"></canvas>
                              </div>
                              <div class="col-md-12 padding-0" >
                                <div class="col-md-4 col-sm-4 hidden-xs" style="padding-top:20px;">
                                  <canvas class="doughnut-chart2" style="height:220px"></canvas>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <h4>Progress Planificacion Vs Real</h4>
                                    <p>Aquí se puede verificar la ejecución de metas y objetivos alcanzados</p>
                                    <div class="progress progress-mini">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                        <span class="sr-only">60% Complete</span>
                                      </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    </div>
					 <div class="col-md-12">
						<div class="panel box-v4">
							<div class="panel-heading bg-white border-none">
							  <h4><span class="icon-notebook icons"></span> Agenda</h4>
							</div>
							<div class="panel-body padding-0">
								<div class="col-md-12 col-xs-12 col-md-12 padding-0 box-v4-alert">
									<h2>Noticicación de Auditoria</h2>
									<p>Advertencia se debe realizar una auditoria en el area 1</p>
									<b><span class="icon-clock icons"></span> Hoy a las 15:00</b>
								</div>
								<div class="calendar">
								</div>
							</div>
						</div> 
                  </div>
                    <div class="col-md-12">
                        <div class="panel bg-green text-white">
                            <div class="panel-body">
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="maps" style="height:300px;">
                                </div>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                  <canvas class="doughnut-chart hidden-xs"></canvas>
                                  <div class="col-md-12">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                      <h1>72.993</h1>
                                      <p>People</p>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                       <h1>12.000</h1>
                                       <p>Active</p>
                                    </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
      		</div>
			<!-- end: content -->
			<!-- start: right menu -->
			<?php require('cfg_menu_derecho.php'); ?>
			<!-- end: right menu -->
      </div>
      <!-- start: Mobile -->
			<?php require('cfg_menu_movil.php'); ?>
       <!-- end: Mobile -->
    <!-- start: Javascript -->
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/jquery.ui.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <!-- plugins -->
    <script src="asset/js/plugins/moment.min.js"></script>
    <script src="asset/js/plugins/fullcalendar.min.js"></script>
    <script src="asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="asset/js/plugins/jquery.vmap.min.js"></script>
    <script src="asset/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="asset/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="asset/js/plugins/chart.min.js"></script>
    <!-- custom -->
     <script src="asset/js/main.js"></script>
     <script type="text/javascript">
      (function(jQuery){
        // start: Chart =============
        Chart.defaults.global.pointHitDetectionRadius = 1;
        Chart.defaults.global.customTooltips = function(tooltip) {
            var tooltipEl = $('#chartjs-tooltip');
            if (!tooltip) {
                tooltipEl.css({
                    opacity: 0
                });
                return;
            }
            tooltipEl.removeClass('above below');
            tooltipEl.addClass(tooltip.yAlign);
            var innerHtml = '';
            if (undefined !== tooltip.labels && tooltip.labels.length) {
                for (var i = tooltip.labels.length - 1; i >= 0; i--) {
                    innerHtml += [
                        '<div class="chartjs-tooltip-section">',
                        '   <span class="chartjs-tooltip-key" style="background-color:' + tooltip.legendColors[i].fill + '"></span>',
                        '   <span class="chartjs-tooltip-value">' + tooltip.labels[i] + '</span>',
                        '</div>'
                    ].join('');
                }
                tooltipEl.html(innerHtml);
            }
            tooltipEl.css({
                opacity: 1,
                left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
                top: tooltip.chart.canvas.offsetTop + tooltip.y + 'px',
                fontFamily: tooltip.fontFamily,
                fontSize: tooltip.fontSize,
                fontStyle: tooltip.fontStyle
            });
        };
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };
        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                fillColor: "rgba(21,186,103,0.4)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(66,69,67,0.3)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                 data: [18,9,5,7,4.5,4,5,4.5,6,5.6,7.5]
            }, {
                label: "My Second dataset",
                fillColor: "rgba(21,113,186,0.5)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [4,7,5,7,4.5,4,5,4.5,6,5.6,7.5]
            }]
        };
        var doughnutData = [
                {
                    value: 300,
                    color:"#129352",
                    highlight: "#15BA67",
                    label: "Alfa"
                },
                {
                    value: 50,
                    color: "#1AD576",
                    highlight: "#15BA67",
                    label: "Beta"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#15BA67",
                    label: "Gamma"
                },
                {
                    value: 40,
                    color: "#0F5E36",
                    highlight: "#15BA67",
                    label: "Peta"
                },
                {
                    value: 120,
                    color: "#15A65D",
                    highlight: "#15BA67",
                    label: "X"
                }
            ];
        var doughnutData2 = [
                {
                    value: 100,
                    color:"#129352",
                    highlight: "#15BA67",
                    label: "Alfa"
                },
                {
                    value: 250,
                    color: "#FF6656",
                    highlight: "#FF6656",
                    label: "Beta"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#15BA67",
                    label: "Gamma"
                },
                {
                    value: 40,
                    color: "#FD786A",
                    highlight: "#15BA67",
                    label: "Peta"
                },
                {
                    value: 120,
                    color: "#15A65D",
                    highlight: "#15BA67",
                    label: "X"
                }
            ];
        var barChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(21,186,103,0.4)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(21,186,103,0.2)",
                        highlightStroke: "rgba(21,186,103,0.2)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(21,113,186,0.5)",
                        strokeColor: "rgba(151,187,205,0.8)",
                        highlightFill: "rgba(21,113,186,0.2)",
                        highlightStroke: "rgba(21,113,186,0.2)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };
         window.onload = function(){
                var ctx = $(".doughnut-chart")[0].getContext("2d");
                window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
                    responsive : true,
                    showTooltips: true
                });
                var ctx2 = $(".line-chart")[0].getContext("2d");
                window.myLine = new Chart(ctx2).Line(lineChartData, {
                     responsive: true,
                        showTooltips: true,
                        multiTooltipTemplate: "<%= value %>",
                     maintainAspectRatio: false
                });
                var ctx3 = $(".bar-chart")[0].getContext("2d");
                window.myLine = new Chart(ctx3).Bar(barChartData, {
                     responsive: true,
                        showTooltips: true
                });
                var ctx4 = $(".doughnut-chart2")[0].getContext("2d");
                window.myDoughnut2 = new Chart(ctx4).Doughnut(doughnutData2, {
                    responsive : true,
                    showTooltips: true
                });
            };
        //  end:  Chart =============
        // start: Calendar =========
         $('.dashboard .calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2015-02-12',
            businessHours: true, // display business hours
            editable: true,
            events: [
                {
                    title: 'Business Lunch',
                    start: '2015-02-03T13:00:00',
                    constraint: 'businessHours'
                },
                {
                    title: 'Meeting',
                    start: '2015-02-13T11:00:00',
                    constraint: 'availableForMeeting', // defined below
                    color: '#20C572'
                },
                {
                    title: 'Conference',
                    start: '2015-02-18',
                    end: '2015-02-20'
                },
                {
                    title: 'Party',
                    start: '2015-02-29T20:00:00'
                },
                // areas where "Meeting" must be dropped
                {
                    id: 'availableForMeeting',
                    start: '2015-02-11T10:00:00',
                    end: '2015-02-11T16:00:00',
                    rendering: 'background'
                },
                {
                    id: 'availableForMeeting',
                    start: '2015-02-13T10:00:00',
                    end: '2015-02-13T16:00:00',
                    rendering: 'background'
                },
                // red areas where no events can be dropped
                {
                    start: '2015-02-24',
                    end: '2015-02-28',
                    overlap: false,
                    rendering: 'background',
                    color: '#FF6656'
                },
                {
                    start: '2015-02-06',
                    end: '2015-02-08',
                    overlap: true,
                    rendering: 'background',
                    color: '#FF6656'
                }
            ]
        });
        // end : Calendar==========
        // start: Maps============
          jQuery('.maps').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#fff',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#C8EEFF', '#006491'],
            normalizeFunction: 'polynomial'
        });
        // end: Maps==============
      })(jQuery);
     </script>
  <!-- end: Javascript -->
  </body>
</html>