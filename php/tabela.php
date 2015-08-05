
<?php


include "/broker.php";

$b = new Broker();

$b->open();

$result = $b->returnAllContacts();
?>

<table border="3" class="tabela table table-striped table-bordered table-condensed" width="100%" align="center" id="ta">
<tr align="center">
        <th  width="100px">Title</th>
        <th  width="100px">Description</th>
        <th  width="100px">Release year</th>
        <th  width="100px">Name</th>
        <th  width="100px">Rental duration</th>
        <th  width="100px">Rental rate</th>
        <th  width="100px">Length</th>
		<th  width="100px">Rating</th>
        
    </tr>
<?php
foreach ($filmovi as $film) {
    
    ?>
        <tr>
            <td><?php echo $film->title; ?></td>
            <td><?php echo $film->description; ?></td>
            <td><?php echo $film->release_year; ?></td>
            <td><?php echo $film->name; ?></td>
            <td><?php echo $film->rental_duration; ?></td>
            <td><?php echo $film->rental_rate; ?></td>
			<td><?php echo $film->length; ?></td>
            <td><?php echo $film->rating; ?></td>
            
        </tr>
    <?php
}
?>
</table>

