{*}
{foreach $messages as $msg}
<p>{$msg}</p>
{/foreach}
{*}
<form action="register" method="post">
    <p> <label>Nom</label><input type="text" name="nom" value="{$nom|default:''}"></p>
    <p><label>Email</label><input type="email" name="email" value="{$email|default:''}"></p>
    <p><label>Mot de passe</label><input type="password" name="passe"></p>
    <p><input type="submit"></p>
</form>