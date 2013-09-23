<?php

namespace Tarea\ListadoBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Tarea\ListadoBundle\Entity\TareaRepository")
 * @ORM\Table(name="tarea")
 */
class Tarea {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    protected $descripcion;

    /**
     * @ORM\Column(type="date")
     */
    protected $fechaRealizar;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $estado;
    
    /**
   * @ORM\Column(type="string",columnDefinition="ENUM('baja', 'media','alta')", nullable=false)
   */
    protected $prioridad;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Tarea
     */
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Tarea
     */
    public function setEstado($estado) {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado() {
        return $this->estado;
    }

    /**
     * Set fechaRealizar
     *
     * @param \Date $fechaRealizar
     * @return Tarea
     */
    public function setFechaRealizar($fechaRealizar) {
        $this->fechaRealizar = $fechaRealizar;

        return $this;
    }

    /**
     * Get fechaRealizar
     *
     * @return \Date
     */
    public function getFechaRealizar() {
        return $this->fechaRealizar;
    }

    //añade validacion html5 
    //usamos mensajes ya creados. poriamos usar los nuestros
    public static function loadValidatorMetadata(ClassMetadata $metadata) {
        $metadata->addPropertyConstraint('descripcion', new Assert\NotBlank(array(
            'message' => 'This value should not be blank.'
        )));
        $metadata->addPropertyConstraint('descripcion', new Assert\MinLength(12,array(
            'message' => 'This value is too short. It should have {{ limit }} character or more.'
        )));
        $metadata->addPropertyConstraint('fechaRealizar', new Assert\Date(array(
            'message' => 'This value is not a valid date.'
        )));
    }


    /**
     * Set prioridad
     *
     * @param string $prioridad
     * @return Tarea
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;
    
        return $this;
    }

    /**
     * Get prioridad
     *
     * @return string 
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }
}