<?php
/**
 * Связь программы с курсом
 *
 * @author Bad Wolf
 * @date 13.09.2018 10:41
 */

class Program_Course_Assignment extends Core_Entity
{

    protected $tableRows = ["id", "program_id", "course_id"];

    /**
     * Уникальный идентификатор
     *
     * @var int
     */
    protected $id;


    /**
     * id программы
     *
     * @var int
     */
    protected $program_id = 0;


    /**
     * id курса
     *
     * @var int
     */
    protected $course_id = 0;


    public function getId()
    {
        return intval( $this->id );
    }


    public function getProgramId()
    {
        return intval( $this->program_id );
    }


    public function getCourseId()
    {
        return intval( $this->course_id );
    }


    public function setProgramId( $program_id )
    {
        $this->program_id = intval( $program_id );
        return $this;
    }


    public function setCourseId( $course_id )
    {
        $this->course_id = intval( $course_id );
        return $this;
    }

}