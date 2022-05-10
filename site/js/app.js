window.addEventListener("load",function(){
    const btnAddNewSkill = this.document.querySelector(".add-new-skill");
    const containerSkill = this.document.querySelector(".container-skill");

    const btnAddTecnicalSkill = this.document.querySelector(".add-new-tecnical-skill");
    const tecnicalSkillContainer = this.document.querySelector(".container-tecnical-skill");

    const btnAddNewProject = this.document.querySelector(".add-new-project");
    const containerProjectsList = this.document.querySelector(".container-projects-list");

    const btnAddNewDegree = this.document.querySelector(".add-new-degree");
    const containerDegree = this.document.querySelector(".container-degree");

    const btnAddNewLinks = this.document.querySelector(".add-new-link");
    const containerLinks = this.document.querySelector(".container-links");

    let totalSkillInputAdded = 0;
    const maxSkillInputAccept = 8;

    btnAddNewSkill.addEventListener("click",function(){
        if(totalSkillInputAdded<maxSkillInputAccept){
            totalSkillInputAdded++;
            containerSkill.insertAdjacentHTML("beforeend",`
                <div class="inputs-container">
                    <button class="remove-item remove-skill" title="remover">&times;</button>
                    <input type="text" name="skills[]" class="form-control" placeholder="degite uma skill...">
                </div>
            `);
        }else{
            swal("só é permitido adicionar no maximo 8 skills diferentes");
        }
    });

    btnAddTecnicalSkill.addEventListener("click",function(){
        tecnicalSkillContainer.insertAdjacentHTML("beforeend",`
            <div class="inputs-container">
                <button class="remove-item remove-tec" title="remover">&times;</button>
                <input type="text" name="tecnologias[]" class="form-control" placeholder="Tecnologia..." required>
                <input type="number" min="1" max="5" name="niveis[]" class="form-control" placeholder="Nível..." required>
                <input type="text" name="versoes[]" class="form-control" placeholder="Versão..." required>
            </div>
        `);
    });

    btnAddNewProject.addEventListener("click",function(){
        containerProjectsList.insertAdjacentHTML("beforeend",`
            <div class="project-desc-container">
                <div class="row">
                    <div class="form-group">
                        <label>Nome Projecto</label>
                        <input type="text" name="nomesProjecto[]" class="form-control" required>
                        <div class="form-validation"></div>
                    </div>
                    <div class="form-group grow-1">
                        <label>Periodo de desenvolvimento</label>
                        <input type="text" name="datasProjectos[]" class="form-control" required>
                        <div class="form-validation"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Contexto</label>
                    <textarea name="contextosProjectos[]" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <button class="remove-project" title="remover">remover projecto</button>
            </div>
        `);
    });

    btnAddNewDegree.addEventListener("click",function(){
        containerDegree.insertAdjacentHTML("beforeend",`
            <div class="inputs-container">
                <button class="remove-item remove-degree" title="remover">&times;</button>
                <input type="text" name="formacoes[]" class="form-control" placeholder="degite uma formção...">
            </div>
        `);
    });

    btnAddNewLinks.addEventListener("click",function(){
        containerLinks.insertAdjacentHTML("beforeend",`
            <div class="inputs-container">
                <button class="remove-item remove-degree" title="remover">&times;</button>
                <input type="text" name="links[]" class="form-control" placeholder="degite um link...">
            </div>
        `);
    });

    containerSkill.addEventListener("click",function(e){
        let elementClicked = e.target;
        if(elementClicked.classList.contains("remove-skill")){
            let parentElement = elementClicked.parentElement;
            parentElement.remove();
            totalSkillInputAdded--;
        }
    });

    tecnicalSkillContainer.addEventListener("click",function(e){
        let elementClicked = e.target;
        if(elementClicked.classList.contains("remove-tec")){
            let parentElement = elementClicked.parentElement;
            parentElement.remove();
        }
    });

    containerProjectsList.addEventListener("click",function(e){
        let elementClicked = e.target;
        if(elementClicked.classList.contains("remove-project")){
            let parentElement = elementClicked.parentElement;
            parentElement.remove();
        }
    });

    containerDegree.addEventListener("click",function(e){
        let elementClicked = e.target;
        if(elementClicked.classList.contains("remove-degree")){
            let parentElement = elementClicked.parentElement;
            parentElement.remove();
        }
    });

    containerLinks.addEventListener("click",function(e){
        let elementClicked = e.target;
        if(elementClicked.classList.contains("remove-degree")){
            let parentElement = elementClicked.parentElement;
            parentElement.remove();
        }
    });
});