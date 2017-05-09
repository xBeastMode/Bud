<?php
namespace Bud;
use Bud\Bong\Apple;
use Bud\Bong\Pipe;
use Bud\Bong\Tube;
use Bud\Bong\WaterBottle;
use Bud\Rollup\Blunt;
use Bud\Rollup\Joint;
use Bud\Rollup\Spliff;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Bud extends PluginBase{
        public function onEnable(){
                Item::$list[Item::APPLE] = Apple::CLASS;
                Item::$list[Item::BOWL]  = Pipe::CLASS;
                Item::$list[373]         = Tube::CLASS;
                Item::$list[374]         = WaterBottle::CLASS;
                Item::$list[Item::STICK] = Blunt::CLASS;
                Item::$list[Item::BONE]  = Joint::CLASS;
                Item::$list[Item::BONE]  = Spliff::CLASS;

                $this->getLogger()->info(TextFormat::BOLD . TextFormat::RED . 'Ready to get stoned?');
        }
}