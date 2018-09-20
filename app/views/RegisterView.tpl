{extends file="main.tpl"}

{block name=top}
<form action="{$conf->action_url}register" method="post"  class="pure-form pure-form-aligned bottom-margin">
	<legend>Rejestrowanie do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login"/>
		</div>
        <div class="pure-control-group">
			<label for="id_password">password: </label>
			<input id="id_password" type="password" name="password" /><br />
		</div>
                    <div class="pure-control-group">
			<label for="id_email">email: </label>
			<input id="id_email" type="text" name="email"/>
		</div>
		<div class="pure-controls">
			<input type="submit" value=rejestuj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>



{/block}

