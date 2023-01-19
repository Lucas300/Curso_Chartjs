<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
        <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([  
        ['Cidade', 'população',{ role: 'annotation' }],
        
        <?php
            include 'conexao.php';
            $sql = "SELECT * FROM cidades";
            $buscar = mysqli_query($conexao, $sql);

            while($dados = mysqli_fetch_array($buscar)){
                $cidade = $dados['cidade'];
                $populacao = $dados['populacao'];
            ?>

        ['<?php  echo $cidade ?>', <?php echo $populacao?> , '#000'],
       
        <?php 
            }    //fechando o while
        ?>

         ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                   { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "style" },
                    2]);
            var options = {
                title: "População das Cidades",
                width: 600,
                height: 400, I
                bar: {groupWidth:"95%"},
                legend: { position: "right" },
               
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("graficoColuna"));
            chart.draw(view, options);
    </script>
    </head>
    <body>
    <div id="graficoColuna" style="width: 900px; height: 500px"></div>
    </body>
</html>