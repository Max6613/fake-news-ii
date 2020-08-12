<?php
require_once 'PDOSetting.php';


class Setting
{
    private $_id;
    private $_name;
    private $_value;

    /**
     * Setting constructor.
     * @param $id
     * @param $name
     * @param $value
     */
    public function __construct(int $id,
                                string $name,
                                string $value)
    {
        $this->_id = $id;
        $this->_name = $name;
        $this->_value = $value;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->_name;
    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->_value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->_value = $value;

        $pdo_sett = new PDOSetting();
        $pdo_sett->SetSetting($this->_id, $value);
    }




}