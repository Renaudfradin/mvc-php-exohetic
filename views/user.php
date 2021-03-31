<?php require_once("tpl/header.php"); ?>
<h1>Exemple MVC</h1>
<p>Mon contenu il est beau</p>

<h2>Liste des utilisateurs</h2>
<?php if(!empty($users)): ?>
<table>
    <tr>
        <th>Id</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Email</th>
    </tr>
    <?php foreach($users as $user): ?>
    <tr>
        <td><?= $user["id"] ?></td>
        <td><?= $user["firstname"] ?></td>
        <td><?= $user["lastname"] ?></td>
        <td><?= $user["email"] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<p>Y'a pas d'utilisateur</p>
<?php endif; ?>

<h2>Créer un utilisateur</h2>
<?php if($error): ?>
<p><?= $error ?></p>
<?php endif; ?>
<form method="POST">
    <label for="firstname">Prénom</label>
    <input type="text" name="firstname" id="firstname" />
    <label for="lastname">Nom</label>
    <input type="text" name="lastname" id="lastname" />
    <label for="email">Email</label>
    <input type="text" name="email" id="email" />
    <input type="submit" value="Créer utilisateur" />
</form>
<a href="/cour29/index.php/?page=addprof">add prof</a>
<?php require_once("tpl/footer.php"); ?>