<?php
/**
 * Класс для отправки писем по email
 *
 * @author Bad Wolf
 * @date 11.09.2018 12:11
 */

class Mail
{

    /**
     * Список заголовков сообщения
     *
     * @var array
     */
    private $headers = ["MIME-Version: 1.0", "Content-type: text/html; charset=iso-8859-1"];


    /**
     * Список получаетелей сообщения
     *
     * @var array
     */
    private $to = [];


    /**
     * Тема сообщения
     *
     * @var string
     */
    private $subject = null;


    /**
     * Текст сообщения
     *
     * @var string
     */
    private $message = null;


    /**
     * Список дополнительных параметров сообщения
     *
     * @var array
     */
    private $params = [];


    /**
     * Добавление заголовка отправляемого сообщения
     *
     * @param $header
     * @return $this
     */
    public function appendHeader( $header )
    {
        $this->headers[] = strval( $header );
        return $this;
    }


    /**
     * Добавление адреса получателя
     *
     * @param $email - email адрес получателя
     * @return $this
     */
    public function appendAddressee( $email )
    {
        $this->to[] = strval( $email );
        return $this;
    }


    /**
     * Сеттер для свйоства subject
     *
     * @param $subject
     * @return $this
     */
    public function setSubject( $subject )
    {
        $this->subject = strval( $subject );
        return $this;
    }


    /**
     * Задание статического содержания (текста) сообщения
     * Сеттер для свойства message
     *
     * @param $message - текст сообщения
     * @return $this
     */
    public function setMessage( $message )
    {
        $this->message = strval( $message );
        return $this;
    }


    /**
     * Добавление динамического параметра сообщения аналогично методу addSimpleEntity
     * Сеттер для свойства params
     *
     * @param $name - название параметра
     * @param $value - значение
     * @return $this
     */
    public function appendParam( $name, $value )
    {
        $this->params[ strval( $name ) ] = $value;
        return $this;
    }


    /**
     * Задание содержания (текста) сообщения из XSL шаблона
     * Сеттер для свойства message
     *
     * @param $xslPath - путь к XSL-шаблону
     * @return $this
     */
    public function setMessageFromXsl( $xslPath )
    {
        $Message = Core::factory( "Core_Entity" )->xsl( $xslPath );

        //Задание параметров сообщения
        foreach ( $this->params as $name => $value )    $Message->addSimpleEntity( $name, $value );

        $this->message = $Message->show( false );

        return $this;
    }


    /**
     * Отправка сформированного сообщения
     *
     * @return bool - сообщение отправлено или нет
     */
    public function send()
    {
        if( count( $this->to ) === 0 )
            die( "Для отправки email сообщения необходимо указать хотя бы одного получателя" );

        if( $this->message === null || $this->message == "" )
            die( "Текст сообщения не может быть пустым" );

        //Группировка заголовков
        $headers = implode( "\r\n", $this->headers );

        //Группировка списка получателей
        $to = implode( ", ", $this->to );

        Core::notify( array(&$this), "beforeMailSend" );

        $status = mail( $to, $this->subject, $this->message, $headers );

        Core::notify( array(&$this), "afterMailSend" );

        return $status;
    }


}