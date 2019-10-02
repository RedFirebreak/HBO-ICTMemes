<?php
$getallenrij = array(9,1,2,7,7,3,0,7,15,1,-9);
$IndexVanKleinsteWaarde = $getallenrij[0];

echo "Opdracht 2: <br/>";
echo "de eerste waarde in de array is: ".$IndexVanKleinsteWaarde."<br/>";

echo "------------------------------------------------------------------------ <br/>";
echo "Opdracht 3: <br/>";
$i = 0;

Foreach($getallenrij as $value)
{
	echo "index " . $i . " is: " . $value . "<br>";
	$i++;
}

echo "----------------------------------------------------------------------- <br/>";

function my_min($array)
{
	$n = count($array);
	$min = $array[0];
	
	for ($i = 1; $i < $n; $i++)
	{
		if($min > $array[$i])
		{
			$min = $array[$i];
		}
	}
	return $min;
}

echo "----------------------------------------------------------------------- <br/>";

function my_max($array)
{
	$n = count($array);
	$max = $array[0];
	
	for ($i = 1; $i < $n; $i++)
	{
		if($max < $array[$i])
		{
			$max = $array[$i];
		}
	}
	return $max;
}
echo "----------------------------------------------------------------------- <br/>";

echo "de minimum waarde in deze array is: ".my_min($getallenrij)."<br/>";
echo "de maximum waarde in deze array is: ".my_max($getallenrij)."<br/>";

?>

7.	Het is niet zo chique als jouw functie echo statements bevat.
	In plaats daarvan zorg je ervoor dat de functie een return statement geeft.
	De return value van my_min is natuurlijk het kleinste getal in de opgegeven rij. 
	Herhaal bovenstaand voor my_max($array): de functie die gegeven een array daarbinnen de grootste waarde vindt.
