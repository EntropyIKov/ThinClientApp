<?php 
	$platforms = getPlatformsByMasterId($_SESSION['master_id'], $conn);
?>
<div class='table-platforms'>
	<p class='table-name'><b>Your platforms</b></p>
	<table class='ta-table'>
		<!-- <tr>
			<th>Platform's name</th>
			<th>Secret key</th>
		</tr> -->
		<?php
		if(empty($platforms)){
			echo "<tr class='ta-row'><td class='ta-cell-empty' colspan='2'>You doesn't have any platforms</td></tr>";
		} else {
			foreach ($platforms as $platform) {
				echo "
				<tr class='ta-row'>
					<td id='platform-$platform[0]' class='ta-cell'>$platform[1]</td>
					<td class='ta-cell ta-btn-cell ta-btn-delete'><button class='btn-cell'>Delete</button></td>
				</tr>";
			}
		} 
		?>
		<tr class='ta-create-row'>
			<td class='ta-cell'><input id='new-platform-input' class='ta-input-borderless' type="text" placeholder="Enter domain..."></td>
			<td class='ta-cell ta-btn-cell ta-btn-create'><button id='new-platform-btn' class='btn-cell'>Create</button></td>
		</tr>
	</table>
</div>