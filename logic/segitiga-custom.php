<?php
echo "<br><br>Segitiga Diamond Bold 1 : <br>";
$num_char    = 29; 
$onehalf     = floor($num_char / 2);
$onehalf_var = $onehalf;
$char1       = '&nbsp;';
$char2       = '*';

echo '<div style="font:bold 16px courier new; line-height:10px">';
for ($row = 1; $row <= $num_char; $row++){
    for ($col = 1; $col <= $num_char; $col++){
        $char = $col > $onehalf_var && $col <= ($num_char - $onehalf_var) ? $char2 : $char1;
        echo $char; 
    }
    $row <= $onehalf ? $onehalf_var-- : $onehalf_var++; 
    echo '<br/>';
}
echo '</div>';
?>



<?php
echo "<br><br>Segitiga Diamond Bold 2 : <br>";
$num_char 	= 29;
$onehalf	= floor($num_char / 2);
$onehalf_var 	= $onehalf;
$onequarter 	= floor($num_char / 4);
$threequarters	= ceil($num_char * 3/4);
$char1 		= '-';
$char2 		= '*';

echo '<div style="font:bold 16px courier new; line-height:10px">';
for ($row = 1; $row <= $num_char; $row++)
{
	for ($col = 1; $col <= $num_char; $col++)
	{
		// Sama seperti kode sebelumnya
		$char =	$col > $onehalf_var && $col <= ($num_char-$onehalf_var) ? $char2 : $char1;
		
		// Menambahakan bujursangkar di tengah
		if ( 
			$col > $onequarter  
			&& $col <= $threequarters 
			&& $row > $onequarter 
			&& $row <= $threequarters 
		)
		{
			$char = '<span style="color:#CCC">'.$char.'</span>';
		}
		
		// Mengganti karakter dan warna keempat sisi bujursangkar 
		if (
			($col <= $onequarter && $row <= $onequarter)
			|| ($col > $threequarters && $row <= $onequarter)
			|| ($row > $threequarters && $col <= $onequarter)
			|| ($col > $threequarters && $row > $threequarters)
		)
		{
			$char = '<span style="color:#CCC">'.$char2.'</span>';
		}
			
		echo $char;	
	}
	
	// Sama seperti kode sebelumnya
	$row <= $onehalf ? $onehalf_var-- : $onehalf_var++;	
	echo '<br/>';
}
echo '</div>';
?>


<?php
echo "<br><br>Segitiga Diamond Bold 3 : <br>";
$patterns 		= 9;
$patterns_col 		= 3;
$cont_width 		= 279 * $patterns_col;
$num_char		= 29;
$char1			= '&nbsp;';
$char2			= '*';
$onehalf 		= floor($num_char / 2);
$onehalf_var		= $onehalf;
$onefourth		= floor($num_char / 4);
$threequarters		= ceil($num_char * 3/4);

echo '<div style="width:'.$cont_width.'px">';
for ($i = 1; $i <= $patterns; $i++)
{
	$onehalf_var 		= $onehalf;
	echo '<div style="float:left;font:bold 16px courier new; line-height:10px">';
	for ($row = 1; $row <= $num_char; $row++)
	{
		for ($col = 1; $col <= $num_char; $col++)
		{
			$char =	$col > $onehalf_var && $col <= ($num_char - $onehalf_var) ? $char2 : $char1;
			
			if ( 
				$col > $onefourth 
				&& $col <= $threequarters 
				&& $row > $onefourth 
				&& $row <= $threequarters
			)
			{
				$char = '<span style="color:#CCC">'.$char.'</span>';
			}
		
			if (
				($col <= $onefourth && $row <= $onefourth)
				|| ($col > $threequarters && $row <= $onefourth)
				|| ($row > $threequarters && $col <= $onefourth)
				|| ($col > $threequarters && $row > $threequarters)
			)
			{
				$char = '<span style="color:#A0A0A0;">'.$char2.'</span>';
			}
				
			echo $char;	
		}
		$row <= $onehalf ? $onehalf_var-- : $onehalf_var++;	
		echo '<br/>';
	}
	echo '</div>';
}
echo '</div>';
?>