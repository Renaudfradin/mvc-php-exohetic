<?php require_once("tpl/header.php") ?>

<?php if(!empty($getcour)): ?>
<h2>COUR : <?= $getcour["name"] ?> </h2>
<table>
    <tr>
        <th>Id</th>
        <th>name</th>
        <th>at</th>
        <th>room</th>
        <th>prenom prof</th>
        <th>nom prof</th>
    </tr>
    <tr>
        <td><?= $getcour["id"] ?></td>
        <td><?= $getcour["name"] ?></td>
        <td><?= $getcour["at"] ?></td>
        <td><?= $getcour["room"] ?></td>
        <td><?= $getcour["prof_fistname"] ?></td>
        <td><?= $getcour["prof_lastname"] ?></td>
    </tr>
</table>
<?php endif; ?>


<h2>add note</h2>

<?php if(!empty($coms)): ?>
<table>
    <tr>
        <th>Id</th>
        <th>cour</th>
        <th>mark1</th>
        <th>mark2</th>
        <th>mark3</th>
        <th>mark4</th>
        <th>comments</th>
    </tr>
    <?php foreach($coms as $com): ?>
    <tr>
        <td><?= $com["id"] ?></td>
        <td><?= $com["subject_id"] ?></td>
        <td><?= $com["mark1"] ?></td>
        <td><?= $com["mark2"] ?></td>
        <td><?= $com["mark3"] ?></td>
        <td><?= $com["mark4"] ?></td>
        <td><?= $com["comments"]?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<p>Y'a pas de com</p>
<?php endif; ?>


<h2>Créer un com</h2>
<?php if($error): ?>
<p><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label for="idcourse">nom du com</label>
    <select name="idcourse" id="idcourse">
        <option value="#" name="" id="idcourse">--choisir un cour--</option>
        <?php foreach($idcours as $idcour): ?>
        <option value="<?= $idcour["id"]?>" name="" id="idcourse"><?= $idcour["name"]?></option>
        <?php endforeach; ?>
    </select>

    <label for="mark1">mark1</label>
    <input type="text" name="mark1" id="mark1" />
    <label for="mark2">mark2</label>
    <input type="text" name="mark2" id="mark2" />
    <label for="mark3">mark3</label>
    <input type="text" name="mark3" id="mark3" />
    <label for="mark4">mark4</label>
    <input type="text" name="mark4" id="mark4" />
    <label for="comments">comments</label>
    <input type="text" name="comments" id="comments" />


    <input type="submit" value="Créer un comm" />
</form>
<?php require_once("tpl/footer.php") ?>