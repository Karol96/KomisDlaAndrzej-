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
{foreach $cars as $p}
{strip}
	<tr>
		<td>{$p["marka"]}</td>
		<td>{$p["model"]}</td>
		<td>{$p["rok"]}</td>
		
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
