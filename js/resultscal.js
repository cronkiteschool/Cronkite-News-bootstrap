
var pchoices = new Array();
var pvotes = new Array();
var schoices = new Array();
var svotes = new Array();
var prop206 = new Array();
var prop206v = new Array();
var prop205 = new Array();
var prop205v = new Array();

var request = new XMLHttpRequest();
request.open("GET", "https://cronkitenews.azpbs.org/Results.xml", false);
request.send();
var xml = request.responseXML;
var contest = xml.getElementsByTagName("contest");
//console.log(contest.length);
for(var i = 0; i < contest.length; i++) {
    
    var contest_name = new Array();
    var clname = "";
    clname = contest[i].getAttribute("contestLongName");
      var ck = contest[i].getAttribute("key");
    // console.log(clname);
    if (clname == "President of the United States")
        {
           var ppr = contest[i].getAttribute("precinctsReportingPercent");
           var prezcand = contest[i].getElementsByTagName("choice");
           for(var j=0; j<prezcand.length; j++)
               {
                  // console.log(prezcand[j].getAttribute("choiceName"));
                   pchoices.push(prezcand[j].getAttribute("choiceName"));
                   var votes = prezcand[j].getElementsByTagName("jurisdiction");
                   //console.log(votes);     
                   pvotes.push(votes[0].getAttribute("votes"));
               }
        }
   // console.log(clname);
     if (clname == "U.S. Senator")
        {
           var spr = contest[i].getAttribute("precinctsReportingPercent");
           var prezcand = contest[i].getElementsByTagName("choice");
           for(var j=0; j<prezcand.length; j++)
               {
                  // console.log(prezcand[j].getAttribute("choiceName"));
                   schoices.push(prezcand[j].getAttribute("choiceName"));
                   var votes = prezcand[j].getElementsByTagName("jurisdiction");
                   //console.log(votes);     
                   svotes.push(votes[0].getAttribute("votes"));
               }
                   
        }
     if (ck == 667)
        {
           
           var p206pr = contest[i].getAttribute("precinctsReportingPercent");      
           var prezcand = contest[i].getElementsByTagName("choice");
           for(var j=0; j<prezcand.length; j++)
               {
                  // console.log(prezcand[j].getAttribute("choiceName"));
                   prop206.push(prezcand[j].getAttribute("choiceName"));
                   var votes = prezcand[j].getElementsByTagName("jurisdiction");
                   //console.log(votes);     
                   prop206v.push(votes[0].getAttribute("votes"));
               }
                   
        }
      if (ck == 668)
        {
           
           var p205pr = contest[i].getAttribute("precinctsReportingPercent");      
           var prezcand = contest[i].getElementsByTagName("choice");
           for(var j=0; j<prezcand.length; j++)
               {
                  // console.log(prezcand[j].getAttribute("choiceName"));
                   prop205.push(prezcand[j].getAttribute("choiceName"));
                   var votes = prezcand[j].getElementsByTagName("jurisdiction");
                   //console.log(votes);     
                   prop205v.push(votes[0].getAttribute("votes"));
               }
                   
        }
  
        
}
    
//console.log(pchoices);
//console.log(pvotes);
//console.log(schoices);
//console.log(svotes);
//console.log(prop206);
//console.log(prop206v);
//console.log(p206pr);
//console.log(p205pr, prop205, prop205v);

//document.getElementById("fc").innerHTML += st;    
var totalpVotes = 0;
var totalsVotes = 0;
var total205Votes = 0;
var total206Votes = 0;
//    var vc = 300;
 //   var sc = 500;
for(var i=0; i<pvotes.length; i++)
    {
        
        totalpVotes += parseInt(pvotes[i]);
    }

    
for(var i=0; i<pvotes.length; i++)
    {
        pvotes[i] = pvotes[i]/totalpVotes;
        pvotes[i] = pvotes[i] * 100;
        pvotes[i] = Math.round(pvotes[i]*100)/100;
    }
         

for(var i=0; i<svotes.length; i++)
    {
        
        totalsVotes += parseInt(svotes[i]); 
     
    }

    
for(var i=0; i<svotes.length; i++)
    {
        svotes[i] = svotes[i]/totalsVotes;
        svotes[i] = svotes[i] * 100;
        svotes[i] = Math.round(svotes[i]*100)/100;
        
    }

for(var i=0; i<prop205v.length; i++)
    {
        
        total205Votes += parseInt(prop205v[i]); 
     
    }
for(var i=0; i<prop205v.length; i++)
    {
        prop205v[i] = prop205v[i]/total205Votes;
        prop205v[i] = prop205v[i] * 100;
        prop205v[i] = Math.round(prop205v[i]*100)/100;
        
    }

for(var i=0; i<prop206v.length; i++)
    {
        
        total206Votes += parseInt(prop206v[i]); 
     
    }

for(var i=0; i<prop206v.length; i++)
    {
        prop206v[i] = prop206v[i]/total206Votes;
        prop206v[i] = prop206v[i] * 100;
        prop206v[i] = Math.round(prop206v[i]*100)/100;
        
    }

console.log(schoices);
         console.log(svotes);
//console.log(pvotes);
var pr = '30%';
    
$(function () {
    $('#g1-container').highcharts({
        colors: ['#232066','#E91D0E','#FFCC00','rgb(0,169,92)'],
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Arizona Presidential Results'
        },
        subtitle: {
            text: 'Precincts reported: ' + ppr + '%'
        },
        xAxis: {
            categories: ["CLINTON, HILLARY","TRUMP, DONALD J.", "JOHNSON, GARY" , "STEIN, JILL"],
            title: {
                text: null
            }
        },
         exporting: { enabled: false },
        yAxis: {
            min: 0,
            max: 100,
            gridLineColor: 'transparent',
            title: {
                text: 'Voter Percentage',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: '%'
        },
        plotOptions: {
            bar: {
                colorByPoint: true,
                dataLabels: {
                    enabled: true,
                    format: '{y}%'
                }
            }
        },
        legend: {
           enabled: false
        },
        credits: {
            enabled: false
        },
        series: [{
            name: ' ',
            data: [pvotes[3], pvotes[19], pvotes[10], pvotes[16]]
        }]
    });
});
        
$(function () {
    $('#g2-container').highcharts({
        colors: ['#232066','#E91D0E'],
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Arizona U.S. Senate Results'
        },
        subtitle: {
            text: 'Precincts reported: ' + spr + '%'
        },
        xAxis: {
            categories: ["KIRKPATRICK, ANN", "MCCAIN, JOHN"],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            max: 100,
            gridLineColor: 'transparent',
            title: {
                text: 'Voter Percentage',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: '%'
        },
         exporting: { enabled: false },
        plotOptions: {
            bar: {
                colorByPoint: true,
                dataLabels: {
                    enabled: true,
                    format: '{y}%'
                }
            }
        },
        legend: {
           enabled: false
        },
        credits: {
            enabled: false
        },
        series: [{
            name: ' ',
            data: [svotes[5], svotes[7]]
        }]
    });
});

$(function () {
    $('#g3-container').highcharts({
        colors: ['#008000','#FF0000'],
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        credits: {
      enabled: false
            },
        title: {
            text: 'Arizona Prop 205<br>Recreational Marijuana<br><p style="font-size:12px">Precincts reported: ' + p205pr + '%</p>',
            align: 'center',
            verticalAlign: 'middle',
            y: 80
        },
        tooltip: {
            pointFormat: '<b>{point.percentage:.1f}%</b>'
        },
         exporting: { enabled: false },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: 30,
                    style: {
                        fontWeight: 'bold',
                        color: 'black',
                        fontSize: '14px'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: 'AZ Prop 205',
            innerSize: '50%',
            data: [
                ['YES:  ' + prop205v[1] + '%',  prop205v[1]],
                ['NO:  ' + prop205v[0] + '%',  prop205v[0]],
                
                {
                    name: 'Proprietary or Undetectable',
                    y: 0.2,
                    dataLabels: {
                        enabled: false
                    }
                }
            ]
        }]
    });
});

$(function () {
    $('#g4-container').highcharts({
         colors: ['#008000','#FF0000'],
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'Arizona Prop 206<br>Minimum Wage<br><p style="font-size:12px">Precincts reported:' + p206pr + '%</p>',
            align: 'center',
            verticalAlign: 'middle',
            y: 80
        },
        tooltip: {
            pointFormat: '<b>{point.percentage:.1f}%</b>'
        },
        exporting: { enabled: false },
        credits: {
      enabled: false
            },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: 30,
                    style: {
                        fontWeight: 'bold',
                        color: 'black',
                        fontSize: '14px'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: 'AZ Prop 206',
            innerSize: '50%',
            data: [
                ['YES:  ' + prop206v[1] + '%', prop206v[1]],
                ['NO:  ' + prop206v[0] + '%', prop206v[0]],
                {
                    name: 'Proprietary or Undetectable',
                    y: 0.2,
                    dataLabels: {
                        enabled: false
                    }
                }
            ]
        }]
    });
});

    