<?php require_once("tpl/header.php") ?>
<h2>add course</h2>

<h2>Liste des cours</h2>
<?php if(!empty($cours)): ?>
<table>
    <tr>
        <th>Id</th>
        <th>name</th>
        <th>at</th>
        <th>room</th>
        <th>prenom prof</th>
        <th>nom prof</th>
    </tr>
    <?php foreach($cours as $cour): ?>
    <tr>
        <td><?= $cour["id"] ?></td>
        <td><?= $cour["name"] ?></td>
        <td><?= $cour["at"] ?></td>
        <td><?= $cour["room"] ?></td>
        <td><?= $cour["prof_fistname"] ?></td>
        <td><?= $cour["prof_lastname"] ?></td>
        <td><a href="?page=addnote&id=<?= $cour["id"] ?>"><?= $cour["name"] ?></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<p>Y'a pas de cour</p>
<?php endif; ?>

<h2>Créer un cour</h2>
<?php if($error): ?>
<p><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label for="name">nom du coour</label>
    <input type="text" name="name" id="name" />
    <label for="at">date</label>
    <input type="text" name="at" id="at" />
    <label for="room">salle</label>
    <input type="text" name="room" id="room" />

    <label for="prof_fistname">Prénom du prof</label>
    <input type="text" name="prof_fistname" id="prof_fistname" />
    <label for="prof_lastname">Nom du prof</label>
    <input type="text" name="prof_lastname" id="prof_lastname" />

    <input type="submit" value="Créer un cour" />


</form>
<?php require_once("tpl/footer.php") ?>