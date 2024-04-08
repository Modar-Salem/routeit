//[Dashboard Javascript]

//Project:	Rhythm Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
	var options = {
          series: [64, 73, 48],
          chart: {
          height: 250,
          type: 'radialBar',
        },
		stroke: {
			lineCap: "round",
		  },
        plotOptions: {
          radialBar: {
            dataLabels: {
              name: {
                fontSize: '22px',
              },
              value: {
                fontSize: '16px',
              },
              total: {
                show: true,
                label: 'Total',
                formatter: function (w) {
                  // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                  return 145212
                }
              }
            }
          }
        },
		colors: ['#3246D3', '#ffa800', '#ee3158'],
        labels: ['New', 'Recovered', 'In Treatment'],
        };
	
        var chart = new ApexCharts(document.querySelector("#patient_overview"), options);
        chart.render();
	
	
	
	
		
	var options = {
          series: [{
          name: 'Income',
          data: [76, 85, 101, 98, 87, 105, 91]
        }, {
          name: 'Expense',
          data: [44, 55, 57, 56, 61, 58, 63]
        }],
          chart: {
          type: 'bar',
		  foreColor:"#bac0c7",
          height: 270,
			  toolbar: {
        		show: false,
			  }
        },
        plotOptions: {
          bar: {
			endingShape: 'rounded',
            horizontal: false,
            columnWidth: '50%',
          },
        },
        dataLabels: {
          enabled: false,
        },
		grid: {
			show: false,			
		},
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
		colors: ['#ee3158', '#3246D3'],
        xaxis: {
          categories: ['10 May', '11 May', '12 May', '13 May', '14 May', '15 May', '16 May'],
			
        },
        yaxis: {
          
        },
		 legend: {
      		show: true,
		 },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          },
			marker: {
			  show: false,
		  },
        }
        };

        var chart = new ApexCharts(document.querySelector("#recent_trend"), options);
        chart.render();
	
		
	// Slim scrolling
  
  
	  $('.inner-user-div3').slimScroll({
		height: '200px'
	  });
  
	
	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 0,
		responsiveClass: true,
		autoplay: true,
		dots: false,
		nav: true,
		responsive: {
		  0: {
			items: 1,
		  },
		  600: {
			items: 1,
		  },
		  1000: {
			items: 1,
		  }
		}
	  });
	
	
	var options = {
        series: [{
          name: 'Total',
          data: [4, 5, 7, 6, 1, 8, 3, 6, 2, 5]
        }],
        chart: {
          type: 'bar',
          height: 200,
          toolbar: {
            show: false
          }
        },
		colors:['#2444e8'],
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '20%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
		grid: {
			show: false,  
		},
        stroke: {
          show: false,
          width: 0,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'],
        },
		
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
          }
        
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " Appointment"
            }
          }
        }
      };

      var chart = new ApexCharts(document.querySelector("#appointment_overview"), options);
      chart.render();
	
	
	
	
	var options = {
          series: [
          {
            name: "New Patient",
			data: [28, 15, 30, 18, 35 , 13, 43]
          },
          {
            name: "Return Patient",            
            data: [10, 39, 20, 36, 15, 32, 17]
          }
        ],
          chart: {
          height: 200,
          type: 'line',
          toolbar: {
            show: false
          }
        },
        colors: ['#ee3158', '#1dbfc1'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth'
        },
		grid: {
			show: false,  
		},
        xaxis: {
          categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Set', 'Sun'],
        },
        legend: {
          show: true,
        },
		xaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
          }        
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
          }        
        },
        };

        var chart = new ApexCharts(document.querySelector("#patients_pace"), options);
        chart.render();
	
	
	
		var options = {
          series: [44, 55, 41, 17, 15, 25],
          chart: {
			  type: 'donut',
			  width: 250,
			},
			dataLabels: {
			enabled: false,
		  },
		colors: ['#3246D3', '#00D0FF', '#ee3158', '#ffa800', '#1dbfc1', '#e4e6ef'],
		legend: {
		  show: false,
		},
			
		  plotOptions: {
			  pie: {
				  donut: {
					size: '75%',
				  }
			  }
		  },
		labels: ["Cardiology", "Endocrinology", "Physicians", "Dermatology", "Orthopedics", "Immunology"],
        responsive: [{
          breakpoint: 1600,
          options: {
            chart: {
				width: 250,
            }
          }
        },{
          breakpoint: 500,
          options: {
            chart: {
				width: 200,
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart124"), options);
        chart.render();
	
}); // End of use strict
