<?php

abstract class Player
{
    protected $_name;
    protected $_level = 1;
    protected $_health = 100;
    protected $_armor = 50;
    protected $_weapon;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function sayMyName()
    {
        echo $this->_name;
    }

    abstract public function attack(Player $player);
    abstract public function lootWeapon(Weapon $weapon);

}

class Hunter extends Player
{
    private $_dexterity;
    private $_energy;
    private $_damage;

    public function __construct($name)
    {
        //die('die');
        parent::__construct($name);
        $this->_dexterity = 2;
        $this->_energy = 100;
        $this->_damage = $this->_dexterity * (1.2 + ($this->_level*0.5) + (1/$this->_energy)*2);
    }

    public function getEnergy()
    {
        return $this->_energy;
    }

    public function attack(Player $player) // $player = new Player ou new Hunter
    {
        $playerLife = $player->_health;
        $playerLife -= $this->_damage;
    }

}

class Warrior
{
    private $_dexterity;
    private $_energy;
    private $_damage;

    public function __construct($name)
    {
        parent::__construct($name);
        $this->_dexterity = 2;
        $this->_energy = 100;
        $this->_damage = $this->_dexterity * (1.2 + ($this->_level*0.5) + (1/$this->_energy)*2);
    }

//    public function attack(Player $player) // Si on passe autre chose qu'un player, on est exit
//    {
//        $playerLife = get_class($player)->$this->life;
//        $playerLife = $playerLife - $this->_damage;
//    }

}

class Wizard
{
    private $_magicPower;
    private $_mana;
    private $_damage;

    public function __construct($name)
    {
        parent::__construct($name);
        $this->_magicPower = 2;
        $this->_mana = 'hello';
        $this->_damage = $this->_magicPower * (1.8 + ($this->_level * 0.5) + (1/$this->_mana) * 0.5);
    }

    public function getMana()
    {
        return $this->_mana;
    }

//    public function attack(Player $player) // $player = new Player ou new Hunter
//    {
//        $playerLife = $player->$this->life;
//        $playerLife = $playerLife - $this->$_damage;
//    }
}
