<?php

namespace Anax\Controller;

?>
<h3>Här kan du test och se om en IP är IPv4, IPv6 eller ingen of dem</h3>

<div class="div-ip">
<div class="ip-flex">
<form class="ip-form" method="post">
<select name="option">
  <option name="Normal" value="Normal">Normal format</option>
  <option name="JSON" value="JSON">JSON format</option>
</select>
    <input class="input-id" type="text" name="ip_adress" placeholder="Skriv en IP">
    <input type="submit" name="check" value="Check">
</form>
<h1></h1>
<?php
$gett = $this->di->get("request");
if ($gett->getPost("option") == "Normal") {?>
    <p>IP: <?= htmlspecialchars($ip) ?></p>
    <p>Format: <?= htmlspecialchars($valid) ?></p>
    <p>Domain: <?= htmlspecialchars($host) ?></p>
    <?php
} elseif ($gett->getPost("option") == "JSON") {
    $arr = array('IP Adress' => $ip, 'Format' => $valid, 'Domain' => $host);
    ?>
    <pre><?= htmlspecialchars(json_encode($arr, JSON_PRETTY_PRINT)) ?></pre>
    
    <?php
}
?>
<h1></h1>


</div>
<div class="ip-flex">


<table class="ip-table">
<tr>
<th colspan="3">REST-variant</th>
</tr>
  <tr>
    <th>IPv4</th>
     <td> <a href="./JSON?ip=129.144.50.56">129.144.50.56</a></td>
<td>    <a href="./JSON?ip=1.1.1.1">  1.1.1.1</a></td>
  </tr>
  <tr>
    <th>IPv6</th>  
   <td> <a href="./JSON?ip=2620:119:35::35">  2620:119:35::35</a></td>
    <td>  <a href="./JSON?ip=2620:119:53::53">2620:119:53::53</a></td>
  </tr>  
  <tr>
    <th>Ogiltig IPv4/6</th>
     <td> <a href="./JSON?ip=1.1.1.1.1"> 1.1.1.1.1</a></td>
      <td><a href="./JSON?ip=1::1:1:1:1::1"> 1::1:1:1:1::1</a></td>
  </tr>
</table>
<h3>JSON APIet</h3>
<p>Man kan använda JSON APIet genom att skriva "/JSON?ip=" efter "/htdocs" i adress baren. Där kan man skriva en IP och får resultat i JSON format.</p>

</div>
</div>

