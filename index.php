<html>
    <head>
        <title>php</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="jquery.js"></script>
        <?php
           $connect = new PDO("mysql:host=localhost;dbname=brasil", "root", "");
           $connect->exec('SET CHARACTER SET utf8');
        ?>
    </head>
    <body>
        <select name="estados" id="estados">
            <?php
               $select = $connect->prepare("SELECT * FROM estados ORDER BY nome ASC");
               $select->execute();
               $fetchAll = $select->fetchAll();
               foreach($fetchAll as $estados)
               {
                 echo '<option value="' .$estados['id']. '">' .$estados['nome'].'</option>';
               }
         ?>
        </select>
        <select name="" id="cidades" style="display:none"></select>
    </body>
</html>
<script>
    $("#estados").on("change",function() {
       var idEstados = $("#estados").val();
       $.ajax({
           url: 'cidades.php',
           type: 'POST',
           data:{id:idEstados},
           beforeSend: function() {
             $("#cidades").css({'display': 'block'});
             $("#cidades").html("carregando");
           },
           success: function(data)
           {
             $("#cidades").css({'display': 'block'});
             $("#cidades").html(data);
           },
           error: function(data)
           {
             $("#cidades").css({'display': 'block'});
             $("#cidades").html("Houve um erro ao carregar");
           }

       });
    });
</script>