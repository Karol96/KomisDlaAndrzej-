{extends file="main.tpl"}

{block name=top}



{/block}

{block name=bottom}



<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>marka</th>
		<th>model</th>
		<th>rok</th>
		
	</tr>
</thead>
<tbody>
	<tr>
		<td>{$car_info["marka"]}</td>
		<td>{$car_info["model"]}</td>
		<td>{$car_info["rok"]}</td>	
	</tr>
</tbody>
</table>

{/block}
