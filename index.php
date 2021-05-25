<?php
/*
  Author: Tiago A C Pereira
  Project: 
*/
  require_once 'SelectorGame.php';
  $sg = new SelectorGame(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Gerador de números</title>
</head>
<body>

<!-- As a heading -->
<nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mx-auto h1">Gerador de Números Aleatórios</span>
</nav>  
  <div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
			<div class="row">

					<div class="col-md-4 col-xs-4">
						<div class="form-group">
							<label for="game">Jogo</label>
							<select class="form-select" aria-label="Default select example" id="game" name="game">
								<option selected>Selecione o jogo</option>
								<?php foreach($sg->games as $key => $game){ ?> 
								<option value=<?php echo $key ?>><?php echo $game ?></option>
								<?php } ?>
							</select>  
						</div>
					</div>

					<div class="col-md-4 col-xs-4">
						<div class="form-group">
							<label for="scorer">Quant. Números</label>
							<input type="text" class="form-control" id="scorer" name="scorer" placeholder="Opcional">
						</div>
					</div> 

					<div class="col-md-4 col-xs-4">
						<div class="form-group">
							<label for="ticket">Quant. Cartela</label>
							<input type="text" class="form-control" id="ticket" name="ticket">
						</div>
					</div>
					<br>
					<br>
					<br>
					<button class="btn btn-primary" id="submit">Gerar</button>		
					<hr>
					<div class="panel panel-default">
						<div class="panel-body" id="output">
							
						</div>
					</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
	 </div>
</body>
</html>
<script>
	$("#submit").click(function(){
		var game=$("#game").val();
		var ticket=$("#ticket").val();
		var scorer=$("#scorer").val();
		$.post("Game.php",
		{ 
		game:game,
		scorer:scorer,
		ticket:ticket   
		},function(data){
			$("#output").html(data);
		});
	});
</script>