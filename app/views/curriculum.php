<h1><?= $fullname ?> - <span style="font-weight:normal;"><i><?= $role ?></i></span> </h1>

<div style="color: gray;">Nascimento: <?= $nascimento ?></div>
<div style="color: gray;">Endereço: <?= $endereco ?></div>
<div style="color: gray;">Telefone: <?= $contacto ?></div>

<h2>Resumo Profissional</h2>
<p>
    <?= $resume ?>
</p>
<?php if (!empty($skills)) { ?>
    <h2>Skills</h2>
    <ul>
        <?php foreach ($skills as $skill) { ?>
            <li><?= $skill ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<?php if (!empty($competencias)) { ?>
    <h2>Competências Técnicas</h2>
    <p style="font-size: 10px;"><b>1-Beginner </b> Conhecimentos teóricos, académicos, formação| <b>2 - Intermediate</b> Nível 1 + pequenos projectos e estágios| <b>3-Advanced</b> Nível 1/2 + experiência em projecto| <b>4 – Professional</b> Nível 1/2/3 + vasta exp. professional em projecto| <b>5 - Expert</b></p>
    <style>
        table,
        tr,
        th,
        td {
            border-bottom: 1px solid gainsboro;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            width: 25%;
            text-align: center;
        }

        table {
            display: block;
            width: 1000px;
        }
    </style>
    <table>
        <tr>
            <th>Tecnologia</th>
            <th>Nivel</th>
            <th>Versão</th>
        </tr>
        <?php foreach ($competencias as $competencia) { ?>
            <tr>
                <td><?= $competencia->tecnologia ?></td>
                <td><?= $competencia->nivel ?></td>
                <td><?= $competencia->versao ?></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>
<?php if (!empty($projectos)) { ?>
    <br>
    <br>
    <h2>Projectos</h2>

    <?php foreach ($projectos as $projecto) { ?>
        <div style="text-align: right ;"><i><b><?= $projecto->nome ?></b></i></div>
        <hr style="color: gray;">
        <div style="text-align: right ; color:gray;"><?= $projecto->data ?></div>
        <h3 style="color: gray;font-size:14px;">Contexto</h3>
        <p>
            <?= $projecto->contexto ?>
        </p>
    <?php } ?>
<?php } ?>
<?php if (!empty($formacoes)) { ?>
    <h2>Formação</h2>
    <ul>
        <?php foreach ($formacoes as $formacao) { ?>
            <li><?= $formacao ?></li>
        <?php } ?>
    </ul>
<?php } ?>
<?php if (!empty($links)) { ?>
    <h2>Links Uteis</h2>
    <ul>
        <?php foreach ($links as $link) { ?>
            <li><?= $link ?></li>
        <?php } ?>
    </ul>
<?php } ?>