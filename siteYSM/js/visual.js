var v1 = [], v2 = [], v3 = [];
if((localStorage.getItem('cid'))[4] == '-') {
    v1 = [
      ['Country', 'Views'],
      ['India', 2831],
      ['United States', 12]
        ];
    v2 = [
          ['Year', 'Views'],
          ['2017',  2397],
          ['2018',  3124],
          ['2019',  3817],
          ['2020',  1611],
          ['2021',  65]
        ];
    v3 = [
          ['Year', 'Subscribers'],
          ['2017', 100 ],            // RGB value
          ['2018', 92],            // English color name
          ['2019', 117 ],
          ['2020', -14 ],
          ['2021', -1]
        ];
    
}
else {
   v1 = [
      ['Country', 'Views'],
      ['India', 1295],
      ['United States', 12],
      ['France', 4]
        ];
    v2 = [
          ['Year', 'Views'],
          ['2017',  1427],
          ['2018',  2156],
          ['2019',  1269],
          ['2020',  823],
          ['2021',  18]
        ];
    v3 = [
          ['Year', 'Subscribers'],
          ['2017', 90 ],            // RGB value
          ['2018', 20],            // English color name
          ['2019', 11 ],
          ['2020', 9 ],
          ['2021', 0]
        ];
}


/** geographical watch data */

google.charts.load('current', {
    'packages':['geochart'],
    // Note: you will need to get a mapsApiKey for your project.
    // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
    'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
  });
  google.charts.setOnLoadCallback(drawRegionsMap);

  function drawRegionsMap() {
    var data = google.visualization.arrayToDataTable(v1);

    var options = {};

    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

    chart.draw(data, options);
  }


/** daily views */

google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
        var data2 = google.visualization.arrayToDataTable(v2);

        var options = {
          title: 'Yearly Views',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_div'));
        chart.draw(data2, options);
      }




  /** daily subscribers */

  google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data3 = google.visualization.arrayToDataTable(v3);

        var options = {
          title: 'Yearly Subscribers'
        };

        var chart3 = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart3.draw(data3, options);
      }