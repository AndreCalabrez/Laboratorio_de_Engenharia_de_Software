<?php
//bonus630
	function con()
	{
		try
		{
			return new PDO("mysql:dbname=sistema_corte;host=localhost","root","");
		}
		catch(PDOException $erro)
		{
			return $erro;
		}
	}

	function geraJsonEstados()
	{
		$query = con()->query("Select siglaUf, estado from uf order by estado",PDO::FETCH_ASSOC);
		$estados = $query->fetchAll();
		$stringJson = "{\"Estados\":[";
		for($i=0;$i<count($estados);$i++)
		{
			$stringJson .= "{\"id\":\"".$estados[$i]["siglaUf"]."\",\"nome\":\"".utf8_decode($estados[$i]["estado"])."\"}";
			if($i<count($estados)-1)
				$stringJson .= ",";
		}
		$stringJson .= "]}";
		return $stringJson;
	}
	function geraJsonCidades($estadosId)
	{

		$query = con()->query("Select codCidade, cidade from cidade where siglaUF = '$estadosId' order by cidade");
		$cidades = $query->fetchAll();
		$stringJson = "{\"Cidades\":[";
		for($i=0;$i<count($cidades);$i++)
		{
			$stringJson .= "{\"id\":\"".$cidades[$i]["codCidade"]."\",\"nome\":\"".utf8_encode($cidades[$i]["cidade"])."\"}";
			if($i<count($cidades)-1)
				$stringJson .= ",";
		}
		$stringJson .= "]}";
		return $stringJson;
	}



	header('Content-Type: application/json');
    if(isset($_GET["id"])) {
        echo geraJsonCidades($_GET["id"]);
    }
	else {
        echo geraJsonEstados();
    }
?>
