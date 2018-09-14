<?php 


class Printer 
{	

	public function getValue($val) 
	{
		return $val;
	}

	public  function printTable($array) 
	{
	   	echo "<table cellpadding='5' cellspacing='0' border='1'><tr><td>a</td><td>b</td><td>c</td><td>s</td><td>f</td><td>flag</td></tr>";
		foreach ($array as $value) 
		{
			echo '<tr><td>' . $this->getValue($value['a']) . '</td><td>' . $this->getValue($value['b']) . '</td><td>' . $this->getValue($value['c']) . '</td><td>' . $this->getValue($value['s']) . '</td><td>' . $this->getValue($value['f']) . '</td><td>' . $this->getValue($value['flag']) . '</td></tr>';
		}
		echo '</table>';
	}
}
?>