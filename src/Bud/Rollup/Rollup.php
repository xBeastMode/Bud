<?php
namespace Bud\Rollup;
use Bud\Strain;
use pocketmine\item\Item;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\Player;
abstract class Rollup extends Item {
        /** @var Strain */
        public $strain = Null;

        /**
         * Bong constructor.
         *
         * @param int  $id
         * @param int  $meta
         * @param int  $count
         * @param string $name
         */
        public function __construct($id, $meta = 0, $count = 1, $name = "Unknown"){
                parent::__construct($id, $meta, $count, $name);
        }

        /**
         * @param Strain $strain
         */
        public function putStrain(Strain $strain){
                $namedTag = &$this->getNamedTag();
                $namedTag->offsetSet('strainName', new StringTag('strainName', $strain->getName()));
                $namedTag->offsetSet('grams', new IntTag('grams', $strain->getGrams()));
                $namedTag->offsetSet('THCPercentage', new IntTag('THCPercentage', $strain->getTHCPercentage()));
                $namedTag->offsetSet("effects", new ListTag('effects', []));
                foreach($strain->getEffects() as $name => $effect){
                        $namedTag->offsetGet('effects')->offsetSet($name, new StringTag($name, serialize($effect)));
                }
        }

        public function getStrain(){
                $namedTag = $this->getNamedTag();
                $strainName = $namedTag->offsetGet('strainName')->getValue();
                $grams = $namedTag->offsetGet('grams')->getValue();
                $THCPercentage = $namedTag->offsetGet('THCPercentage')->getValue();
                $strain = new Strain($strainName);
                $strain->setGrams($grams);
                $strain->setTHCPercentage($THCPercentage);
                foreach($namedTag->offsetGet('effects')->getValue() as $effect){
                        $strain->putEffect(unserialize($effect->getValue()));
                }
                $this->strain = $strain;
        }

        /**
         * @TODO: spawn smoke animation
         *
         * @param Player $player
         */
        public abstract function smoke(Player $player);

        /**
         * @return string
         */
        public abstract function getRollupName() : string;

        /**
         * @return string
         */
        public abstract function getMaterial() : string;
}