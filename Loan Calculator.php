<html>
<head>
<title>Loan Calculator</title>
</head>
<body>
<form name="m" method="POST">
<h3>Calculate your instalment</h2>
<table>
<tr>
<td>Loan Type</td>
<td>
<select name="type">
<option>Personal</option>
<option>Car</option>
<option>Home</option>
<option>Business</option>
</select>
</td>
</tr>
<tr>
<td>Loan Capital</td><td>
<input type="text" name="capital"></td>
</tr>
<tr>
<td>Time in years</td>
<td>
<select name="year">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
</select>
</td>
</tr>
<tr>
<td>Interest</td>
<td>
<select name="interest">
<option>1.00</option>
<option>1.25</option>
<option>1.50</option>
<option>1.75</option>
<option>2.00</option>
<option>2.25</option>
<option>2.50</option>
<option>2.75</option>
<option>3.00</option>
<option>3.25</option>
<option>3.50</option>
<option>3.75</option>
<option>4.00</option>
<option>4.25</option>
<option>4.50</option>
<option>4.75</option>
<option>5.00</option>
</select>
</td>
</tr>
<tr>
<td>Instalments</td>
<td>
<select name="instalments">
<option>Fixed</option>
<option>Annuity</option>
</select>
</td>
</tr>
</table>
<br>
<input type="submit" value="Calculate">
</form>
</body>
</html>

<?php
if($_POST)
{
$type=$_POST['type'];
$capital=$_POST['capital'];
$interest=$_POST['interest'];
$year=$_POST['year'];
$instalments=$_POST['instalments'];

print"Loan Type $type<br>";
print"Capital $capital<br>";
print"Interest $interest<br>";
print"Instalments $instalments<br>";
print"years $year<br>";

$months=$year*12;

if(strcmp($instalments,"Fixed")==0)
{
$fixedPayment=$capital/$months;
$interestRateForMonth=$interest/12;

for($i=0;$i<$months;$i++)
{
$interestForMonth=$capital/100*$interestRateForMonth;
$capital=$capital-$fixedPayment;
$paymentForMonth=$fixedPayment+$interestForMonth;

$month=$i+1;
printf("$month payment is %.2f<br>",$paymentForMonth);
}
}

else
{
$interest=$interest/100;
$result=$interest/12*pow(1+$interest/12,$months)/(pow(1+$interest/12,$months)-1)*$capital;
printf("Monthly pay is %.2f",$result);
}
}
?>




















