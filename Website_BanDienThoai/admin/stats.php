<?php
    include_once 'inc/header.php';
    include_once '../classes/stats.php';
?>
<?php
    $st = new stats();
?>
                    <div class="content-wrapper">
                        <!-- Page Title Header Starts-->
                        <!-- Page Title Header Ends-->
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                              <div class="card">
                                <div class="p-4 border-bottom bg-light">
                                  <!-- <h4 class="card-title mb-0">Mixed Chart</h4> -->
                                  <?php
                                    $i = 1;
                                    $m = array();
                                    while($i<13){
                                      $sts = $st->getStats($i);
                                      if($sts){
                                        while ($result = $sts->fetch_assoc()){      
                                      ?> 
                                      <?php $m[$i] = $result['TotalSales']/1000000; ?>
                                      <?php	$i++;
                                        }
                                      }
                                      else{
                                            $m[$i] = 0;
                                            $i++;
                                          }
                                      }
                                      ?>
                                      <?php
                                    $is = 1;
                                    $ms = array();
                                    while($is<13){
                                      $sts2 = $st->getStats_Soldout($is);
                                      if($sts2){
                                        while ($result = $sts2->fetch_assoc()){      
                                      ?> 
                                      <?php $ms[$is] = $result['TotalSales']; ?>
                                      <?php	$is++;
                                        }
                                      }
                                      else{
                                            $ms[$is] = 0;
                                            $is++;
                                          }
                                      }
                                      ?>
                                </div>
                                <div class="card-body">
                                  <canvas id="mixed-chart" height="100"></canvas>
                                  <div class="mr-5" id="mixed-chart-legend"></div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- container-scroller -->
            <!-- plugins:js -->
            <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
            <script src="../assets/vendors/js/vendor.bundle.addons.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page-->
            <!-- End plugin js for this page-->
            <!-- inject:js -->
            <script src="../assets/js/shared/off-canvas.js"></script>
            <script src="../assets/js/shared/misc.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page-->
            <!-- <script src="../assets/js/shared/chart.js"></script> -->
            <script type="text/javascript">
            
              $(function () {
                /* ChartJS */
                'use strict';
                if ($("#mixed-chart").length) {
                  var chartData = {
                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12'],
                    datasets: [{
                      type: 'line',
                      label: 'Doanh thu (Triệu)',
                      data: [<?php echo $m[1] ?>, <?php echo $m[2] ?>, <?php echo $m[3] ?>, <?php echo $m[4] ?>, <?php echo $m[5] ?>, <?php echo $m[6] ?>, <?php echo $m[7] ?>,
                      <?php echo $m[8] ?>, <?php echo $m[9] ?>, <?php echo $m[10] ?>, <?php echo $m[11] ?>, <?php echo $m[12] ?>],
                      backgroundColor: ChartColor[2],
                      borderColor: ChartColor[2],
                      borderWidth: 3,
                      fill: false,
                    }, {
                      type: 'bar',
                      label: 'Đã bán (Sản phẩm)',
                      data: [<?php echo $ms[1] ?>, <?php echo $ms[2] ?>, <?php echo $ms[3] ?>, <?php echo $ms[4] ?>, <?php echo $ms[5] ?>, <?php echo $ms[6] ?>, <?php echo $ms[7] ?>,
                      <?php echo $ms[8] ?>, <?php echo $ms[9] ?>, <?php echo $ms[10] ?>, <?php echo $ms[11] ?>, <?php echo $ms[12] ?>],
                      backgroundColor: ChartColor[1],
                      borderColor: ChartColor[1]
                    }]
                  };
                  var MixedChartCanvas = document.getElementById('mixed-chart').getContext('2d');
                  lineChart = new Chart(MixedChartCanvas, {
                    type: 'bar',
                    data: chartData,
                    options: {
                      responsive: true,
                      title: {
                        display: true,
                        text: 'Doanh thu và số liệu sản phẩm bán ra trong 12 tháng'
                      },
                      scales: {
                        xAxes: [{
                          display: true,
                          ticks: {
                            fontColor: '#212229',
                            stepSize: 50,
                            min: 0,
                            max: 150,
                            autoSkip: true,
                            autoSkipPadding: 15,
                            maxRotation: 0,
                            maxTicksLimit: 10
                          },
                          gridLines: {
                            display: false,
                            drawBorder: false,
                            color: 'transparent',
                            zeroLineColor: '#eeeeee'
                          }
                        }],
                        yAxes: [{
                          display: true,
                          scaleLabel: {
                            display: true,
                            labelString: 'Số liệu bán ra',
                            fontSize: 12,
                            lineHeight: 2
                          },
                          ticks: {
                            fontColor: '#212229',
                            display: true,
                            autoSkip: false,
                            maxRotation: 0,
                            stepSize: 500,
                            min: 0,
                            max: 5000
                          },
                          gridLines: {
                            drawBorder: false
                          }
                        }]
                      },
                      legend: {
                        display: false
                      },
                      legendCallback: function (chart) {
                        var text = [];
                        text.push('<div class="chartjs-legend d-flex justify-content-center mt-4"><ul>');
                        for (var i = 0; i < chart.data.datasets.length; i++) {
                          console.log(chart.data.datasets[i]); // see what's inside the obj.
                          text.push('<li>');
                          text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                          text.push(chart.data.datasets[i].label);
                          text.push('</li>');
                        }
                        text.push('</ul></div>');
                        return text.join("");
                      }
                    }
                  });
                  document.getElementById('mixed-chart-legend').innerHTML = lineChart.generateLegend();
                }
                if ($("#lineChart").length) {
                  var lineData = {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
                    datasets: [{
                      data: [0, 205, 75, 150, 100, 150, 50, 100, 80],
                      backgroundColor: ChartColor[0],
                      borderColor: ChartColor[0],
                      borderWidth: 3,
                      fill: 'false',
                      label: "Sales"
                    }]
                  };
                  var lineOptions = {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                      filler: {
                        propagate: false
                      }
                    },
                    scales: {
                      xAxes: [{
                        display: true,
                        scaleLabel: {
                          display: true,
                          labelString: 'Month',
                          fontSize: 12,
                          lineHeight: 2
                        },
                        ticks: {
                          fontColor: '#212229',
                          stepSize: 50,
                          min: 0,
                          max: 150,
                          autoSkip: true,
                          autoSkipPadding: 15,
                          maxRotation: 0,
                          maxTicksLimit: 10
                        },
                        gridLines: {
                          display: false,
                          drawBorder: false,
                          color: 'transparent',
                          zeroLineColor: '#eeeeee'
                        }
                      }],
                      yAxes: [{
                        display: true,
                        scaleLabel: {
                          display: true,
                          labelString: 'Number of sales',
                          fontSize: 12,
                          lineHeight: 2
                        },
                        ticks: {
                          fontColor: '#212229',
                          display: true,
                          autoSkip: false,
                          maxRotation: 0,
                          stepSize: 100,
                          min: 0,
                          max: 300
                        },
                        gridLines: {
                          drawBorder: false
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    legendCallback: function (chart) {
                      var text = [];
                      text.push('<div class="chartjs-legend"><ul>');
                      for (var i = 0; i < chart.data.datasets.length; i++) {
                        console.log(chart.data.datasets[i]); // see what's inside the obj.
                        text.push('<li>');
                        text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                        text.push(chart.data.datasets[i].label);
                        text.push('</li>');
                      }
                      text.push('</ul></div>');
                      return text.join("");
                    },
                    elements: {
                      line: {
                        tension: 0
                      },
                      point: {
                        radius: 0
                      }
                    }
                  }
                  var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
                  var lineChart = new Chart(lineChartCanvas, {
                    type: 'line',
                    data: lineData,
                    options: lineOptions
                  });
                  document.getElementById('line-traffic-legend').innerHTML = lineChart.generateLegend();
                }
                if ($("#areaChart").length) {
                  var gradientStrokeFill_1 = lineChartCanvas.createLinearGradient(1, 2, 1, 280);
                  gradientStrokeFill_1.addColorStop(0, "rgba(20, 88, 232, 0.37)");
                  gradientStrokeFill_1.addColorStop(1, "rgba(255,255,255,0.4)")
                  var lineData = {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
                    datasets: [{
                      data: [0, 205, 75, 150, 100, 150, 50, 100, 80],
                      backgroundColor: gradientStrokeFill_1,
                      borderColor: ChartColor[0],
                      borderWidth: 3,
                      fill: true,
                      label: "Marketing"
                    }]
                  };
                  var lineOptions = {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                      filler: {
                        propagate: false
                      }
                    },
                    scales: {
                      xAxes: [{
                        display: true,
                        scaleLabel: {
                          display: true,
                          labelString: 'Month',
                          fontSize: 12,
                          lineHeight: 2
                        },
                        ticks: {
                          autoSkip: true,
                          autoSkipPadding: 35,
                          maxRotation: 0,
                          maxTicksLimit: 10,
                          fontColor: '#212229'
                        },
                        gridLines: {
                          display: false,
                          drawBorder: false,
                          color: 'transparent',
                          zeroLineColor: '#eeeeee'
                        }
                      }],
                      yAxes: [{
                        display: true,
                        scaleLabel: {
                          display: true,
                          labelString: 'Number of user',
                          fontSize: 12,
                          lineHeight: 2
                        },
                        ticks: {
                          display: true,
                          autoSkip: false,
                          maxRotation: 0,
                          stepSize: 100,
                          min: 0,
                          max: 300
                        },
                        gridLines: {
                          drawBorder: false
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    legendCallback: function (chart) {
                      var text = [];
                      text.push('<div class="chartjs-legend"><ul>');
                      for (var i = 0; i < chart.data.datasets.length; i++) {
                        console.log(chart.data.datasets[i]); // see what's inside the obj.
                        text.push('<li>');
                        text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                        text.push(chart.data.datasets[i].label);
                        text.push('</li>');
                      }
                      text.push('</ul></div>');
                      return text.join("");
                    },
                    elements: {
                      line: {
                        tension: 0
                      },
                      point: {
                        radius: 0
                      }
                    }
                  }
                  var lineChartCanvas = $("#areaChart").get(0).getContext("2d");
                  var lineChart = new Chart(lineChartCanvas, {
                    type: 'line',
                    data: lineData,
                    options: lineOptions
                  });
                  document.getElementById('area-traffic-legend').innerHTML = lineChart.generateLegend();
                }
                if ($("#barChart").length) {
                  var barChartCanvas = $("#barChart").get(0).getContext("2d");
                  var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: {
                      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                      datasets: [{
                        label: 'Profit',
                        data: [15, 28, 14, 22, 38, 30, 40, 70, 85, 50, 23, 20],
                        backgroundColor: ChartColor[0],
                        borderColor: ChartColor[0],
                        borderWidth: 0
                      }]
                    },
                    options: {
                      responsive: true,
                      maintainAspectRatio: true,
                      layout: {
                        padding: {
                          left: 0,
                          right: 0,
                          top: 0,
                          bottom: 0
                        }
                      },
                      scales: {
                        xAxes: [{
                          display: true,
                          scaleLabel: {
                            display: true,
                            labelString: 'Sales by year',
                            fontSize: 12,
                            lineHeight: 2
                          },
                          ticks: {
                            fontColor: '#bfccda',
                            stepSize: 50,
                            min: 0,
                            max: 150,
                            autoSkip: true,
                            autoSkipPadding: 15,
                            maxRotation: 0,
                            maxTicksLimit: 10
                          },
                          gridLines: {
                            display: false,
                            drawBorder: false,
                            color: 'transparent',
                            zeroLineColor: '#eeeeee'
                          }
                        }],
                        yAxes: [{
                          display: true,
                          scaleLabel: {
                            display: true,
                            labelString: 'revenue by sales',
                            fontSize: 12,
                            lineHeight: 2
                          },
                          ticks: {
                            display: true,
                            autoSkip: false,
                            maxRotation: 0,
                            fontColor: '#bfccda',
                            stepSize: 50,
                            min: 0,
                            max: 150
                          },
                          gridLines: {
                            drawBorder: false
                          }
                        }]
                      },
                      legend: {
                        display: false
                      },
                      legendCallback: function (chart) {
                        var text = [];
                        text.push('<div class="chartjs-legend"><ul>');
                        for (var i = 0; i < chart.data.datasets.length; i++) {
                          console.log(chart.data.datasets[i]); // see what's inside the obj.
                          text.push('<li>');
                          text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
                          text.push(chart.data.datasets[i].label);
                          text.push('</li>');
                        }
                        text.push('</ul></div>');
                        return text.join("");
                      },
                      elements: {
                        point: {
                          radius: 0
                        }
                      }
                    }
                  });
                  document.getElementById('bar-traffic-legend').innerHTML = barChart.generateLegend();
                }
                if ($("#stackedbarChart").length) {
                  var stackedbarChartCanvas = $("#stackedbarChart").get(0).getContext("2d");
                  var stackedbarChart = new Chart(stackedbarChartCanvas, {
                    type: 'bar',
                    data: {
                      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                      datasets: [{
                          label: "Desktop",
                          backgroundColor: ChartColor[0],
                          borderColor: ChartColor[0],
                          borderWidth: 1,
                          data: [55, 45, 44, 54, 38, 40, 50]
                        },
                        {
                          label: "Mobile",
                          backgroundColor: ChartColor[1],
                          borderColor: ChartColor[1],
                          borderWidth: 1,
                          data: [34, 20, 54, 34, 65, 40, 35]
                        }
                      ]
                    },
                    options: {
                      responsive: true,
                      maintainAspectRatio: true,
                      legend: false,
                      categoryPercentage: 0.5,
                      stacked: true,
                      layout: {
                        padding: {
                          left: 0,
                          right: 0,
                          top: 0,
                          bottom: 0
                        }
                      },
                      scales: {
                        xAxes: [{
                          display: true,
                          scaleLabel: {
                            display: true,
                            labelString: 'User by time',
                            fontSize: 12,
                            lineHeight: 2
                          },
                          ticks: {
                            fontColor: '#bfccda',
                            stepSize: 50,
                            min: 0,
                            max: 150,
                            autoSkip: true,
                            autoSkipPadding: 15,
                            maxRotation: 0,
                            maxTicksLimit: 10
                          },
                          gridLines: {
                            display: false,
                            drawBorder: false,
                            color: 'transparent',
                            zeroLineColor: '#eeeeee'
                          }
                        }],
                        yAxes: [{
                          display: true,
                          scaleLabel: {
                            display: true,
                            labelString: 'Number of users',
                            fontSize: 12,
                            lineHeight: 2
                          },
                          ticks: {
                            fontColor: '#bfccda',
                            stepSize: 50,
                            min: 0,
                            max: 150,
                            autoSkip: true,
                            autoSkipPadding: 15,
                            maxRotation: 0,
                            maxTicksLimit: 10
                          },
                          gridLines: {
                            drawBorder: false
                          }
                        }]
                      },
                      legend: {
                        display: false
                      },
                      legendCallback: function (chart) {
                        var text = [];
                        text.push('<div class="chartjs-legend"><ul>');
                        for (var i = 0; i < chart.data.datasets.length; i++) {
                          console.log(chart.data.datasets[i]); // see what's inside the obj.
                          text.push('<li>');
                          text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
                          text.push(chart.data.datasets[i].label);
                          text.push('</li>');
                        }
                        text.push('</ul></div>');
                        return text.join("");
                      },
                      elements: {
                        point: {
                          radius: 0
                        }
                      }
                    }
                  });
                  document.getElementById('stacked-bar-traffic-legend').innerHTML = stackedbarChart.generateLegend();
                }
                if ($("#radarChart").length) {
                  var marksCanvas = document.getElementById("radarChart");
                  var marksData = {
                    labels: ["English", "Maths", "Physics", "Chemistry", "Biology", "History"],
                    datasets: [{
                      label: "Student A",
                      backgroundColor: ChartColor[0],
                      borderColor: ChartColor[0],
                      borderWidth: 0,
                      fill: true,
                      radius: 6,
                      pointRadius: 5,
                      pointBorderWidth: 0,
                      pointBackgroundColor: ChartColor[4],
                      pointHoverRadius: 10,
                      data: [54, 45, 60, 70, 54, 75]
                    }, {
                      label: "Student B",
                      backgroundColor: ChartColor[1],
                      borderColor: ChartColor[1],
                      borderWidth: 0,
                      fill: true,
                      radius: 6,
                      pointRadius: 5,
                      pointBorderWidth: 0,
                      pointBackgroundColor: ChartColor[1],
                      pointHoverRadius: 10,
                      data: [65, 75, 70, 80, 60, 80]
                    }]
                  };

                  var chartOptions = {
                    scale: {
                      ticks: {
                        beginAtZero: true,
                        min: 0,
                        max: 100,
                        stepSize: 20,
                        display: false,
                      },
                      pointLabels: {
                        fontSize: 14
                      }
                    },
                    legend: false,
                    legendCallback: function (chart) {
                      var text = [];
                      text.push('<div class="chartjs-legend"><ul>');
                      for (var i = 0; i < chart.data.datasets.length; i++) {
                        console.log(chart.data.datasets[i]); // see what's inside the obj.
                        text.push('<li>');
                        text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
                        text.push(chart.data.datasets[i].label);
                        text.push('</li>');
                      }
                      text.push('</ul></div>');
                      return text.join("");
                    },
                  };

                  var radarChart = new Chart(marksCanvas, {
                    type: 'radar',
                    data: marksData,
                    options: chartOptions
                  });
                  document.getElementById('radar-chart-legend').innerHTML = radarChart.generateLegend();
                }
                if ($("#doughnutChart").length) {
                  var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
                  var doughnutPieData = {
                    datasets: [{
                      data: [20, 80, 83],
                      backgroundColor: [
                        ChartColor[0],
                        ChartColor[1],
                        ChartColor[2]
                      ],
                      borderColor: [
                        ChartColor[0],
                        ChartColor[1],
                        ChartColor[2]
                      ],
                    }],

                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                      'Sales',
                      'Profit',
                      'Return',
                    ]
                  };
                  var doughnutPieOptions = {
                    cutoutPercentage: 75,
                    animationEasing: "easeOutBounce",
                    animateRotate: true,
                    animateScale: false,
                    responsive: true,
                    maintainAspectRatio: true,
                    showScale: true,
                    legend: false,
                    legendCallback: function (chart) {
                      var text = [];
                      text.push('<div class="chartjs-legend"><ul>');
                      for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                        text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                        text.push('</span>');
                        if (chart.data.labels[i]) {
                          text.push(chart.data.labels[i]);
                        }
                        text.push('</li>');
                      }
                      text.push('</div></ul>');
                      return text.join("");
                    },
                    layout: {
                      padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                      }
                    }
                  };
                  var doughnutChart = new Chart(doughnutChartCanvas, {
                    type: 'doughnut',
                    data: doughnutPieData,
                    options: doughnutPieOptions
                  });
                  document.getElementById('doughnut-chart-legend').innerHTML = doughnutChart.generateLegend();
                }
                if ($("#pieChart").length) {
                  var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
                  var pieChart = new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: {
                      datasets: [{
                        data: [30, 40, 30],
                        backgroundColor: [
                          ChartColor[0],
                          ChartColor[1],
                          ChartColor[2]
                        ],
                        borderColor: [
                          ChartColor[0],
                          ChartColor[1],
                          ChartColor[2]
                        ],
                      }],
                      labels: [
                        'Sales',
                        'Profit',
                        'Return',
                      ]
                    },
                    options: {
                      responsive: true,
                      animation: {
                        animateScale: true,
                        animateRotate: true
                      },
                      legend: {
                        display: false
                      },
                      legendCallback: function (chart) {
                        var text = [];
                        text.push('<div class="chartjs-legend"><ul>');
                        for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                          text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                          text.push('</span>');
                          if (chart.data.labels[i]) {
                            text.push(chart.data.labels[i]);
                          }
                          text.push('</li>');
                        }
                        text.push('</div></ul>');
                        return text.join("");
                      }
                    }
                  });
                  document.getElementById('pie-chart-legend').innerHTML = pieChart.generateLegend();
                }
                if ($('#scatterChart').length) {
                  var options = {
                    type: 'bubble',
                    data: {
                      datasets: [{
                          label: 'John',
                          data: [{
                            x: 3,
                            y: 10,
                            r: 5
                          }],
                          backgroundColor: ChartColor[0],
                          borderColor: ChartColor[0],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[0]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 2,
                            y: 2,
                            r: 10
                          }],
                          backgroundColor: ChartColor[1],
                          borderColor: ChartColor[1],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[1]
                        }, {
                          label: 'Paul',
                          data: [{
                            x: 12,
                            y: 32,
                            r: 13
                          }],
                          backgroundColor: ChartColor[2],
                          borderColor: ChartColor[2],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[2]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 29,
                            y: 52,
                            r: 5
                          }],
                          backgroundColor: ChartColor[0],
                          borderColor: ChartColor[0],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[0]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 49,
                            y: 62,
                            r: 5
                          }],
                          backgroundColor: ChartColor[1],
                          borderColor: ChartColor[1],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[1]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 22,
                            y: 22,
                            r: 5
                          }],
                          backgroundColor: ChartColor[2],
                          borderColor: ChartColor[2],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[2]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 23,
                            y: 25,
                            r: 5
                          }],
                          backgroundColor: ChartColor[1],
                          borderColor: ChartColor[1],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[1]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 12,
                            y: 10,
                            r: 5
                          }],
                          backgroundColor: ChartColor[1],
                          borderColor: ChartColor[1],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[1]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 34,
                            y: 23,
                            r: 5
                          }],
                          backgroundColor: ChartColor[1],
                          borderColor: ChartColor[1],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[1]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 30,
                            y: 20,
                            r: 10
                          }],
                          backgroundColor: ChartColor[1],
                          borderColor: ChartColor[1],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[1]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 12,
                            y: 17,
                            r: 5
                          }],
                          backgroundColor: ChartColor[1],
                          borderColor: ChartColor[1],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[1]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 32,
                            y: 37,
                            r: 5
                          }],
                          backgroundColor: ChartColor[0],
                          borderColor: ChartColor[0],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[0]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 52,
                            y: 57,
                            r: 5
                          }],
                          backgroundColor: ChartColor[0],
                          borderColor: ChartColor[0],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[0]
                        },
                        {
                          label: 'Paul',
                          data: [{
                            x: 77,
                            y: 40,
                            r: 5
                          }],
                          backgroundColor: ChartColor[0],
                          borderColor: ChartColor[0],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[0]
                        }, {
                          label: 'Paul',
                          data: [{
                            x: 67,
                            y: 40,
                            r: 5
                          }],
                          backgroundColor: ChartColor[0],
                          borderColor: ChartColor[0],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[0]
                        }, {
                          label: 'Paul',
                          data: [{
                            x: 47,
                            y: 20,
                            r: 10
                          }],
                          backgroundColor: ChartColor[0],
                          borderColor: ChartColor[0],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[0]
                        }, {
                          label: 'Paul',
                          data: [{
                            x: 77,
                            y: 10,
                            r: 5
                          }],
                          backgroundColor: ChartColor[0],
                          borderColor: ChartColor[0],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[0]
                        }, {
                          label: 'Paul',
                          data: [{
                            x: 57,
                            y: 10,
                            r: 10
                          }],
                          backgroundColor: ChartColor[0],
                          borderColor: ChartColor[0],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[0]
                        }, {
                          label: 'Paul',
                          data: [{
                            x: 57,
                            y: 40,
                            r: 5
                          }],
                          backgroundColor: ChartColor[3],
                          borderColor: ChartColor[3],
                          borderWidth: 0,
                          hoverBackgroundColor: ChartColor[3]
                        }
                      ]
                    },
                    options: {
                      legend: false,
                      scales: {
                        xAxes: [{
                          gridLines: {
                            display: false,
                            color: '#fff',
                          },
                          ticks: {
                            autoSkip: true,
                            autoSkipPadding: 45,
                            maxRotation: 0,
                            maxTicksLimit: 10,
                            fontColor: '#212229'
                          }
                        }],
                        yAxes: [{
                          gridLines: {
                            color: '#eff2ff',
                            display: true
                          },
                          ticks: {
                            beginAtZero: true,
                            stepSize: 25,
                            max: 100,
                            fontColor: '#212229'
                          }
                        }]
                      },
                      legend: {
                        display: false
                      },
                      legendCallback: function (chart) {
                        var text = [];
                        text.push('<div class="chartjs-legend"><ul>');
                        for (var i = 0; i < chart.data.datasets.length; i++) {
                          console.log(chart.data.datasets[i]); // see what's inside the obj.
                          text.push('<li>');
                          text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
                          text.push(chart.data.datasets[i].label);
                          text.push('</li>');
                        }
                        text.push('</ul></div>');
                        return text.join("");
                      },
                    }
                  }

                  var ctx = document.getElementById('scatterChart').getContext('2d');
                  new Chart(ctx, options);
                  document.getElementById('scatter-chart-legend').innerHTML = barChart.generateLegend();
                }
              });
            </script>
            <!-- Custom js for this page-->
            <script src="../assets/js/demo_1/dashboard.js"></script>
            <!-- End custom js for this page-->
            <script src="../assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
        </body>
    </html>