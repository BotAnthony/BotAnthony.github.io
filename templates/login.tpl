
{*}
{foreach $messages as $msg}
<p>{$msg}</p>
{/foreach}
{*}

<form action="login" method="post">
    <p><label>Email</label><input type="email" name="email" value="{$email|default:''}"></p>
    <p><label>Mot de passe</label><input type="password" name="passe"></p>
    <p><input type="submit"></p>
</form>