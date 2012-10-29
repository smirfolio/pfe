 <?php  
 $this -> Html -> script('/js/jqwidgets/jqxchart.js', array('inline' => false));
$this -> Html -> script('/js/jqwidgets/jqxtooltip.js', array('inline' => false));
  ?>
 
  <?php $statparc= $this->requestAction('/Reclamations/etatparcsite/1');  ?>
  
  <?php  $this -> Html -> scriptStart(array('inline' => false)); ?>
  
   $(document).ready(function () {
            // prepare chart data as an array
            var source = <?php echo json_encode($statparc)  ?>
          
            console.log(source);
            // prepare jqxChart settings
            var settings = {
                title: "Etat du parc roulant",
                description: "Taux de pannes - Taux Disponibles",
                enableAnimations: true,
                showLegend: true,
                legendLayout: { left: 285, top: 100, width: 100, height: 50, flow: 'vertical' },
                padding: { left: 1, top: 5, right: 0, bottom: 10 },
                titlePadding: { left: 0, top: 0, right: 0, bottom: 2 },
                source: source,
                colorScheme: 'scheme03',
                seriesGroups:
                    [
                        {
                            type: 'pie',
                            showLabels: true,
                            series:
                                [
                                    { 
                                        dataField: 'valeur',
                                        displayText: 'Label',
                                        labelRadius: 65,
                                        initialAngle: 15,
                                        radius: 80,
                                        centerOffset: 0,
                                        formatSettings: { sufix: '%', decimalPlaces: 1 }
                                    }
                                ]
                        }
                    ]
            };
            // setup the chart
            $('#jqxChart').jqxChart(settings);
        });
        
  
  <?php   $this -> Html -> scriptEnd(); ?>
 <div>
                        <?php echo __('Etat du parc Roulant') ?></div>
                    <div>
                       
                       
                     
        <div id='jqxChart' style="width: 400px; height: 220px; position: relative; left: -30px;
            top: 5px;">
      
    </div>
                       
                       
                       </div>