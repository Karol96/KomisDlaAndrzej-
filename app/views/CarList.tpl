{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}carList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="model" name="sf_model" value="{$searchForm->model}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}carNew">+ Nowa osoba</a>
</div>	

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>marka</th>
		<th>model</th>
		<th>rok</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $cars as $p}
{strip}
	<tr>
		<td>{$p["marka"]}</td>
		<td>{$p["model"]}</td>
		<td>{$p["rok"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}carEdit/{$p['id_cars']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}carDelete/{$p['id_cars']}">Usuń</a>
                        &nbsp;
                        <a class="button-small pure-button button-warning" href="{$conf->action_url}carShow/{$p['id_cars']}">Pokaz Wiecej</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
