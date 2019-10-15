<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <title>Strings</title>
  </head>
  <body>
  <?php
  
$first = "the quick brown fox";
$second = " jumped over the lazy dog. ";
$third = $first;
$third .= $second;
 echo $third; 
  
  ?>
  <br /> <br />
  Lowercase: <?php echo strtolower($third); ?><br />
  <br />
  Uppercase: <?php echo strtoupper($third); ?><br />
  <br />
  Uppercase first: <?php echo ucfirst($third); ?><br />
  <br />
  uppercase words: <?php echo ucwords($third); ?><br />
  <br />
  
  length: <?php echo strlen($third); ?><br />
  
  trim: <?php echo "A" . trim(" B C D ") . "E"; ?><br />
  
  find: <?php echo strstr($third, "brown"); ?><br />
  
  Replace by string: <?php echo str_replace("quick", "super-fast", $third); ?><br />
  
<br />
repeat: <?php echo str_repeat($third, 2); ?><br />

make substring: <?php echo substr($third, 4, 5); ?><br />

find position: <?php echo strpos($third, "brown"); ?><br />

find character: <?php echo strchr($third, "z"); ?> <br />

  </body>
</html>
