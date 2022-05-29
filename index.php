<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tävlingen!</title>

    <style>
body {

  margin: 5% 40%;

}
        </style>

</head>
<body>

<?php 
$name = "";
$resultatText = "";
$antalRattSvarText =""; 
$antalRattSvar = 0;
$nameErr = $answerErr = "";

$svar1 = ""; 
$svar2 = "";
$svar3 = ""; 

$resultatText = "Results:";



if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    if (empty($_POST["name"])) {
        $nameErr = "<br>* Name is required";
      } 
      else 
      {
    $name = test_input($_POST["name"]);
      }



       if (empty($_POST["fråga1"]) ||  empty($_POST["fråga2"]) ||  empty($_POST["fråga3"])) {
        $answerErr = "<br>* Please answer all the questions above!";
      } 
      else 
      {
        $svar1 = $_POST["fråga1"];
        $svar2 = $_POST["fråga2"];
        $svar3 = $_POST["fråga3"];
        
      }


    
    
    if ($svar1 == "d") { $antalRattSvar += 1;}
    if ($svar2 == "d") { $antalRattSvar += 1;}
    if ($svar3 == "d") { $antalRattSvar += 1;}

    

    $antalRattSvarText = "Right answers: " . $antalRattSvar;
}


//A function that remmoves white spaces, backslashes, and special HTML characters:
  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }



?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
Name: <input type="text" name="name" value="<?php if (!empty($name)) {echo $name;} ?>"> 
 
<br><br>
<h2>The questions:</h2>
How many "Ninja Turtles" are there? <br>
<input type="radio" name="fråga1"  <?php if (isset($svar1) && $svar1=="a") echo "checked";?> value ="a">120
<br>
<input type="radio" name="fråga1" <?php if (isset($svar1) && $svar1=="b") echo "checked";?> value ="b">2
<br>
<input type="radio" name="fråga1" <?php if (isset($svar1) && $svar1=="c") echo "checked";?> value ="c">3
<br>
<input type="radio" name="fråga1" <?php if (isset($svar1) && $svar1=="d") echo "checked";?>  value ="d">4
<br>
<br>

How many wheels a unicycle has? <br>
<input type="radio" name="fråga2" <?php if (isset($svar2) && $svar2=="a") echo "checked";?> value ="a">6
<br>
<input type="radio" name="fråga2" <?php if (isset($svar2) && $svar2=="d") echo "checked";?> value ="d">1
<br>
<input type="radio" name="fråga2" <?php if (isset($svar2) && $svar2=="c") echo "checked";?> value ="c">3
<br>
<input type="radio" name="fråga2" <?php if (isset($svar2) && $svar2=="b") echo "checked";?> value ="b">4
<br>
<br>


What does CSS stands for? <br>
<input type="radio" name="fråga3" <?php if (isset($svar3) && $svar3=="d") echo "checked";?>  value ="d">Cascading Style Sheets
<br>
<input type="radio" name="fråga3"  <?php if (isset($svar3) && $svar3=="a") echo "checked";?> value ="a">The Columbian Surfer League
<br>
<input type="radio" name="fråga3" <?php if (isset($svar3) && $svar3=="c") echo "checked";?> value ="c">The Swedish Hockey League
<br>
<input type="radio" name="fråga3"  <?php if (isset($svar3) && $svar3=="b") echo "checked";?> value ="b">Chrome, Silver and Led
<br>
<br>



<input type="submit" name="submit" value="submit" >

</form>

<p style="color: red;">
<?php
//echo "<br>";
echo $nameErr;
echo $answerErr;
?>
</p>

<p style="font-size: 25px; text-align: center; " >
<?php
if (!empty($name) && !empty($svar1) && !empty($svar2) && !empty($svar3))
{
echo $resultatText . "<br>";
echo "Name: " . $name . "<br>";
echo $antalRattSvarText . "<br>";
}
?>
</p>

</body>
</html>