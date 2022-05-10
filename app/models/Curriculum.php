<?php

namespace app\models;

use Spipu\Html2Pdf\Html2Pdf;

class Curriculum
{
    public string $nascimento;
    public string $endereco;
    public string $contacto;
    public string $fullname;
    public string $role;
    public string $resume;
    public ?array $skills;
    public ?array $formacoes;
    public ?array $links;

    private ?array $tecnologias;
    private ?array $niveis;
    private ?array $versoes;

    public ?array $competencias;

    private ?array $nomesProjecto;
    private ?array $datasProjectos;
    private ?array $contextosProjectos;

    public ?array $projectos;

    public array $errorsArr = [];

    public function __construct(array $postArr)
    {
        $this->nascimento = self::cleanInput($postArr["nascimento"]);
        $this->endereco = self::cleanInput($postArr["endereco"]);
        $this->contacto = self::cleanInput($postArr["contacto"]);
        $this->fullname = self::cleanInput($postArr["fullname"]);
        $this->role = self::cleanInput($postArr["role"]);
        $this->resume = self::cleanInput($postArr["resume"]);

        $this->skills = $postArr["skills"] ?? null;
        $this->formacoes = $postArr["formacoes"] ?? null;
        $this->links = $postArr["links"] ?? null;

        $this->tecnologias = $postArr["tecnologias"] ?? null;
        $this->niveis = $postArr["niveis"] ?? null;
        $this->versoes = $postArr["versoes"] ?? null;

        $this->nomesProjecto = $postArr["nomesProjecto"] ?? null;
        $this->datasProjectos = $postArr["datasProjectos"] ?? null;
        $this->contextosProjectos = $postArr["contextosProjectos"] ?? null;

        $this->validateValue();
    }

    public static function cleanInput($value)
    {
        return htmlspecialchars(stripslashes(trim($value ?? "")));
    }

    private function generateCompetencias()
    {
        foreach ($this->tecnologias as $key => $tecnologia) {
            $this->competencias[] = new Competencia($tecnologia, $this->niveis[$key], $this->versoes[$key]);
        }
    }

    private function generateProjectos()
    {
        foreach ($this->nomesProjecto as $key => $nomeProjecto) {
            $this->projectos[] = new Projecto($nomeProjecto, $this->datasProjectos[$key], $this->contextosProjectos[$key]);
        }
    }

    public function generatePDF()
    {
        $html2pdf = new Html2Pdf();

        extract(get_object_vars($this));
        ob_start();
        include_once __DIR__ . "/../views/curriculum.php";
        $html = ob_get_clean();

        $html2pdf->writeHTML($html);
        $html2pdf->output('curriculum.pdf');
    }

    private function validateValue()
    {
        if (!$this->nascimento) $this->errorsArr["nascimento"] = "campo obrigatorio";
        if (!$this->endereco) $this->errorsArr["endereco"] = "campo obrigatorio";
        if (!$this->contacto) $this->errorsArr["contacto"] = "campo obrigatorio";
        if (!$this->fullname) $this->errorsArr["fullname"] = "campo obrigatorio";
        if (!$this->role) $this->errorsArr["role"] = "campo obrigatorio";
        if (!$this->resume) $this->errorsArr["resume"] = "campo obrigatorio";

        if ($this->skills && !is_array($this->skills)) $this->errorsArr["skills"] = "Skills inválidos";
        if ($this->formacoes && !is_array($this->formacoes)) $this->errorsArr["formacoes"] = "Formações inválidos";
        if ($this->links && !is_array($this->links)) $this->errorsArr["links"] = "Links inválidos";

        if ($this->tecnologias && !is_array($this->tecnologias)) $this->errorsArr["competencias"] = "competencias inválidos";
        if ($this->niveis && !is_array($this->niveis)) $this->errorsArr["competencias"] = "competencias inválidos";
        if ($this->versoes && !is_array($this->versoes)) $this->errorsArr["competencias"] = "competencias inválidos";

        if ($this->tecnologias && $this->niveis && $this->versoes &&  !isset($this->errorsArr["competencias"])) {
            $countTecArr = count($this->tecnologias);
            $countNiveisArr = count($this->niveis);
            $countVersoesArr = count($this->versoes);

            if ($countTecArr != $countNiveisArr || $countTecArr != $countVersoesArr || $countNiveisArr != $countVersoesArr) {
                $this->errorsArr["competencias"] = "competencias inválidos";
            } else {
                $this->generateCompetencias();
            }
        }

        if ($this->nomesProjecto && !is_array($this->nomesProjecto)) $this->errorsArr["projectos"] = "Projectos inválidos";
        if ($this->datasProjectos && !is_array($this->datasProjectos)) $this->errorsArr["projectos"] = "Projectos inválidos";
        if ($this->contextosProjectos && !is_array($this->contextosProjectos)) $this->errorsArr["projectos"] = "Projectos inválidos";

        if ($this->nomesProjecto && $this->datasProjectos && $this->contextosProjectos &&  !isset($this->errorsArr["projectos"])) {
            $countNomeArr = count($this->nomesProjecto);
            $countDatasArr = count($this->datasProjectos);
            $countContextosArr = count($this->contextosProjectos);

            if ($countNomeArr != $countDatasArr || $countNomeArr != $countContextosArr || $countDatasArr != $countContextosArr) {
                $this->errorsArr["projectos"] = "Projectos inválidos";
            } else {
                $this->generateProjectos();
            }
        }
    }
}
