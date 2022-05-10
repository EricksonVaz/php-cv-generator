<?php

use app\Router;

?>
<h1 class="main-title">Gerador de Curriculum Vitae em PDF - Para Programadores</h1>
<form action="curriculum" class="form-generator" method="post">
    <div class="group-inputs">
        <div class="row">
            <div class="form-group">
                <label for="nascimento">Nascimento</label>
                <input type="date" name="nascimento" class="form-control" required>
                <div class="form-validation"><?= Router::getParrams("nascimento") ?></div>
            </div>
            <div class="form-group grow-1">
                <label for="endereco">Seu Endereço</label>
                <input type="text" name="endereco" class="form-control" required>
                <div class="form-validation"><?= Router::getParrams("endereco") ?></div>
            </div>
            <div class="form-group grow-1">
                <label for="contacto">Seu Contacto</label>
                <input type="text" name="contacto" class="form-control" required>
                <div class="form-validation"><?= Router::getParrams("contacto") ?></div>
            </div>
        </div>
    </div>
    <div class="group-inputs">
        <div class="row">
            <div class="form-group">
                <label for="fullname">Nome Completo</label>
                <input type="text" name="fullname" class="form-control" placeholder="degite seu nome..." required>
                <div class="form-validation"><?= Router::getParrams("fullname") ?></div>
            </div>
            <div class="form-group grow-1">
                <label for="role">Formação / Função / Especialidade</label>
                <input type="text" name="role" class="form-control" placeholder="qual a sua formação / especialidade..." required>
                <div class="form-validation"><?= Router::getParrams("role") ?></div>
            </div>
        </div>
        <div class="form-group">
            <label for="resume">Resumo Profissional</label>
            <textarea name="resume" class="form-control" cols="30" rows="10" required></textarea>
            <div class="form-validation"><?= Router::getParrams("resume") ?></div>
        </div>
    </div>
    <div class="group-inputs">
        <h2 class="form-sub-title">Skills</h2>
        <div class="form-validation"><?= Router::getParrams("skills") ?></div>
        <button type="button" class="btn-add-new add-new-skill">Adicionar Skill</button>
        <div class="row-cols container-skill">

        </div>
    </div>
    <div class="group-inputs tecnical-container">
        <h2 class="form-sub-title">Linguagens de Programação/Tecnologias/Frameworks</h2>
        <div class="form-validation"><?= Router::getParrams("competencias") ?></div>
        <button type="button" class="btn-add-new add-new-tecnical-skill">Adicionar Competência Técnica</button>
        <div class="legend-container">
            <span><b>1-Beginner</b> Conhecimentos teóricos, académicos, formação |</span>
            <span><b>2-Intermediate</b> Nível 1 + pequenos projectos e estágios |</span>
            <span><b>3-Advanced</b> Nível 1/2 + experiência em projecto |</span>
            <span><b>4-Professional</b> Nível 1/2/3 + vasta exp. professional em projecto |</span>
            <span><b>5-Expert</b></span>
        </div>
        <div class="row-cols container-tecnical-skill">

        </div>
    </div>
    <div class="group-inputs projects-container">
        <h2 class="form-sub-title">Projectos</h2>
        <div class="form-validation"><?= Router::getParrams("projectos") ?></div>
        <button type="button" class="btn-add-new add-new-project">Adicionar Projecto</button>
        <div class="container-projects-list">

        </div>
    </div>
    <div class="group-inputs">
        <h2 class="form-sub-title">Formações</h2>
        <div class="form-validation"><?= Router::getParrams("formacoes") ?></div>
        <button type="button" class="btn-add-new add-new-degree">Adicionar Formações</button>
        <div class="row-cols container-list-horizontal container-degree">

        </div>
    </div>
    <div class="group-inputs">
        <h2 class="form-sub-title">Links Uteis</h2>
        <div class="form-validation"><?= Router::getParrams("links") ?></div>
        <button type="button" class="btn-add-new add-new-link">Adicionar Um Link</button>
        <div class="row-cols container-list-horizontal container-links">

        </div>
    </div>
    <button type="submit" class="btn-submit">Gerar Curriculum PDF</button>
</form>
<footer class="main-footer" role="contentinfo">
    &copy; Erickson Vaz, 2022
</footer>