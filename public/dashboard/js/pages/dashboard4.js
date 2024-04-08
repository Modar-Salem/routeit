//[Dashboard Javascript]

//Project:	Rhythm Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
		
	$("#linechart4").sparkline([32,24,26,24,32,26,40,34,22,24,24,26,24,32,26,40,34,22,24], {
		type: 'line',
		width: '90%',
		height: '100',
		lineColor: '#1dbfc1',
		fillColor: '#ffffff',
		lineWidth: 2,
		minSpotColor: '#ee3158',
		maxSpotColor: '#ee3158',
	});
	$("#barchart4").sparkline([32,24,26,24,32,26,40,34,22,24,24,26,24,32,26,40,34,22,24], {
		type: 'bar',
		height: '100',
		width: '90%',
		barWidth: 6,
		barSpacing: 4,
		barColor: '#3246D3',
	});
	$("#linearea3").sparkline([32,24,26,24,32,26,40,34,22,24,24,26,24,32,26,40,34,22,24], {
		type: 'line',
		width: '90%',
		height: '100',
		lineColor: '#ffa800',
		fillColor: '#ffa800',
		lineWidth: 1,
	});
	
	 // ------------------------------
        // pole chart
        // ------------------------------
        // based on prepared DOM, initialize echarts instance
            var poleChart = echarts.init(document.getElementById('pole-chart'));
            // Data style
            var dataStyle = {
                normal: {
                    label: {show: false},
                    labelLine: {show: false}
                }
            };

            // Placeholder style
            var placeHolderStyle = {
                normal: {
                    color: 'rgba(0,0,0,0)',
                    label: {show: false},
                    labelLine: {show: false}
                },
                emphasis: {
                    color: 'rgba(0,0,0,0)'
                }
            };
            var option = {
                title: {
                    text: 'Patients In',
                    subtext: 'Daily Data',
                    x: 'center',
                    y: 'center',
                    itemGap: 10,
                    textStyle: {
                        color: 'rgba(30,144,255,0.8)',
                        fontSize: 19,
                        fontWeight: '500'
                    }
                },

                // Add tooltip
                tooltip: {
                    show: true,
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: document.getElementById('pole-chart').offsetWidth / 2,
                    y: 30,
                    x: '55%',
                    itemGap: 15,
                    data: ['ICU','OPD','Emergency']
                },

                // Add custom colors
                color: ['#1dbfc1', '#3246D3', '#ee3158'],
 
                // Add series
                series: [
                    {
                        name: '1',
                        type: 'pie',
                        clockWise: false,
                        radius: ['75%', '90%'],
                        itemStyle: dataStyle,
                        data: [
                            {
                                value: 60,
                                name: 'ICU'
                            },
                            {
                                value: 40,
                                name: 'invisible',
                                itemStyle: placeHolderStyle
                            }
                        ]
                    },

                    {
                        name: '2',
                        type:'pie',
                        clockWise: false,
                        radius: ['60%', '75%'],
                        itemStyle: dataStyle,
                        data: [
                            {
                                value: 30, 
                                name: 'OPD'
                            },
                            {
                                value: 70,
                                name: 'invisible',
                                itemStyle: placeHolderStyle
                            }
                        ]
                    },

                    {
                        name: '3',
                        type: 'pie',
                        clockWise: false,
                        radius: ['45%', '60%'],
                        itemStyle: dataStyle,
                        data: [
                            {
                                value: 10, 
                                name: 'Emergency'
                            },
                            {
                                value: 90,
                                name: 'invisible',
                                itemStyle: placeHolderStyle
                            }
                        ]
                    }
                ]
            };
        poleChart.setOption(option);
	
}); // End of use strict
