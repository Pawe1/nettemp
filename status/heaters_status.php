<?php 
$dir="modules/gpio/";
$root=$_SERVER["DOCUMENT_ROOT"];
$db = new PDO("sqlite:$root/dbf/nettemp.db") or die ("cannot open database");
$sth = $db->prepare("SELECT * FROM heaters WHERE position !=0 ORDER BY position ASC");
$sth->execute();
$result = $sth->fetchAll();
$numRows = count($result);

//$sth2 = $db->prepare("SELECT * FROM sensors WHERE type = 'heaterst' ");
//$sth2->execute();
//$result = $sth2->fetchAll();



?>
<?php if ( $numRows > '0' ) { ?>
<div class="grid-item heat">
<div class="panel panel-default">
            <div class="panel-heading">WiFi Heaters</div>
<table class="table table-responsive table-hover table-condensed">

<thead>
<tr>
<th></th>
<th><small></small></th>
<th><small>Temp</small></th>
<th><small>Set</small></th>
<th><small>Mode</small></th>
<th><small>Status</small></th>
</tr>
</thead>

<tbody>
<?php
foreach ( $result as $a) {



?>
    <tr>
    <td><small>	<img type="image" src="media/ico/heat.png" /></small></td>
    <td><small><?php echo $a['name']; ?><small></td>
	<td><small><span class="label label-success"><?php echo $a['temp_actual']; ?></span></small></td>
	<td><small><span class="label label-info"> <?php echo $a['temp_set']; ?></span></small></td>
    <td><small><span class="label label-warning"> <?php echo $a['work_mode']; ?></span></small></td>
	
	<td><small><span
		<?php if ($a['status'] == 'OFF')  {
			echo 'class="label label-danger"';
		}
		else {
			
		echo 'class="label label-success"';	
		}?>
		>
		<?php echo $a['status']; ?>
		</span>
		
	
	</td></small>
	

    
    </tr>
<?php
}

?>
</tbody>
</table>
</div>
</div>
<?php }  ?>
