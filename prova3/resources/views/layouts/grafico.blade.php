@extends("layouts.app")

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

@section("content") 
      <div class="container">
            <div class="col-sm-12"><!-- Container principal-->

            
              <div class="page-header">
                <CENTER><h1>Listagem da Quantidade de Disciplinas que os Professores Ministram</h1></CENTER>        
               </div>

              <div class="card" style="background: #D3D3D3">              
                  <div id="chartDiv" style="height: 500px;"></div>
              </div>
              <br><br><br><br><br>

              <div class="page-header">
                <CENTER><h1>Listagem da Quantidade de Professores que Ministra as Disciplinas</h1></CENTER>        
              </div>
              <div class="card" style="background: #D3D3D3">
                <div id="chartDiv2" style="height: 500px;"></div>
              </div>
            </div>
      </div>

<script>
            //Grafico 1
            var chart = AmCharts.makeChart( "chartDiv", {
              "type": "serial",
              "theme": "light",
              "dataProvider": [ {!!$grafico!!} ],//Usa uma chaves e dois exclamações para ler o php dentro do javascript
              "valueAxes": [ {
                "gridColor": "#FFFFFF",
                "gridAlpha": 1.0,
                "dashLength": 0
              } ],
              "gridAboveGraphs": true,
              "startDuration": 1,
              "graphs": [ {
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "qtd"
              } ],
              "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
              },
              "categoryField": "professor",
              "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20
              },
              "export": {
                "enabled": true
              }

            } );

            //grafico 2
            var chart = AmCharts.makeChart( "chartDiv2", {
              "type": "serial",
              "theme": "light",
              "dataProvider": [ {!!$grafico2!!} ],//Usa uma chaves e dois exclamações para ler o php dentro do javascript
              "valueAxes": [ {
                "gridColor": "#FFFFFF",
                "gridAlpha": 1.0,
                "dashLength": 0
              } ],
              "gridAboveGraphs": true,
              "startDuration": 1,
              "graphs": [ {
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "qtd"
              } ],
              "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
              },
              "categoryField": "disciplina",
              "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20
              },
              "export": {
                "enabled": true
              }

            } );

	</script>

@stop