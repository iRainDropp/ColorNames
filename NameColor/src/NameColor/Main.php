<?php

namespace NameColor;

use NameColor\pmforms\element\Toggle;
use NameColor\pmforms\CustomForm;
use NameColor\pmforms\CustomFormResponse;
use NameColor\pmforms\MenuForm;
use NameColor\pmforms\MenuOption;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener
{
    private $default = [];
    private $italic = [];
    private $bold = [];
    private $darkRed = [];
    private $red = [];
    private $gold = [];
    private $yellow = [];
    private $darkgreen = [];
    private $green = [];
    private $aqua = [];
    private $darkaqua = [];
    private $darkblue = [];
    private $blue = [];
    private $lightpurple = [];
    private $darkpurple = [];
    private $gray = [];
    private $darkgray = [];
    private $black = [];

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "Plugin Enabled!");
    }

    public function onDisable()
    {
        $this->getLogger()->info(TextFormat::RED . "Plugin Disabled!");
    }

    public function onJoin(PlayerJoinEvent $event){
        $this->default[$event->getPlayer()->getName()] = true;
        $this->italic[$event->getPlayer()->getName()] = false;
        $this->bold[$event->getPlayer()->getName()] = false;
        $this->darkRed[$event->getPlayer()->getName()] = false;
        $this->red[$event->getPlayer()->getName()] = false;
        $this->gold[$event->getPlayer()->getName()] = false;
        $this->yellow[$event->getPlayer()->getName()] = false;
        $this->darkgreen[$event->getPlayer()->getName()] = false;
        $this->green[$event->getPlayer()->getName()] = false;
        $this->aqua[$event->getPlayer()->getName()] = false;
        $this->darkaqua[$event->getPlayer()->getName()] = false;
        $this->darkblue[$event->getPlayer()->getName()] = false;
        $this->blue[$event->getPlayer()->getName()] = false;
        $this->lightpurple[$event->getPlayer()->getName()] = false;
        $this->darkpurple[$event->getPlayer()->getName()] = false;
        $this->gray[$event->getPlayer()->getName()] = false;
        $this->darkgray[$event->getPlayer()->getName()] = false;
        $this->black[$event->getPlayer()->getName()] = false;
    }

    public function getForm(){
        $form = new MenuForm(TextFormat::RED . "Chat Colors", "Select the color you want your name to be in chat and in your display name from the menu below.", [
            new MenuOption("Default"),
            new MenuOption(TextFormat::DARK_RED . "Dark Red"),
            new MenuOption(TextFormat::RED . "Red"),
            new MenuOption(TextFormat::GOLD . "Gold"),
            new MenuOption(TextFormat::YELLOW . "Yellow"),
            new MenuOption(TextFormat::DARK_GREEN . "Dark Green"),
            new MenuOption(TextFormat::GREEN . "Green"),
            new MenuOption(TextFormat::AQUA . "Aqua"),
            new MenuOption(TextFormat::DARK_AQUA . "Dark Aqua"),
            new MenuOption(TextFormat::DARK_BLUE . "Dark Blue"),
            new MenuOption(TextFormat::BLUE . "Blue"),
            new MenuOption(TextFormat::LIGHT_PURPLE . "Light Purple"),
            new MenuOption(TextFormat::DARK_PURPLE . "Dark Purple"),
            new MenuOption(TextFormat::GRAY . "Gray"),
            new MenuOption(TextFormat::DARK_GRAY . "Dark Gray"),
            new MenuOption(TextFormat::BLACK . "Black"),
        ],  function(Player $player, int $data): void{
                $form = $this->getColorForm($data);
                $player->sendForm($form);
        });
        return $form;
    }

    public function getColorForm(int $data){
        $form = new CustomForm(TextFormat::RED . "Chat Formats", [
            new Toggle("Italic", TextFormat::ITALIC . "Italic"),
            new Toggle("Bold", TextFormat::BOLD . "Bold"),
        ], function(Player $player, CustomFormResponse $response) use($data): void{
            $italic = $response->getBool("Italic");
            $bold = $response->getBool("Bold");
            if($italic == true){
                $this->italic[$player->getName()] = true;
            }
            if($bold == true){
                $this->bold[$player->getName()] = true;
            }
            if($data == 0){
                $this->default[$player->getName()] = true;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Reset Chat Color back to Default.");
            }
            if($data == 1){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = true;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Dark Red.");
            }
            if($data == 2){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = true;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Red.");
            }
            if($data == 3){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = true;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Gold.");
            }
            if($data == 4){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = true;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Yellow.");
            }
            if($data == 5){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = true;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Dark Green.");
            }
            if($data == 6){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = true;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Green.");
            }
            if($data == 7){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = true;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Aqua.");
            }
            if($data == 8){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = true;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Dark Aqua.");
            }
            if($data == 9){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = true;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Dark Blue.");
            }
            if($data == 10){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = true;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Blue.");
            }
            if($data == 11){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = true;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Light Purple.");
            }
            if($data == 12){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = true;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Dark Purple.");
            }
            if($data == 13){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = true;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Gray.");
            }
            if($data == 14){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = true;
                $this->black[$player->getName()] = false;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Dark Gray.");
            }
            if($data == 15){
                $this->default[$player->getName()] = false;
                $this->darkRed[$player->getName()] = false;
                $this->red[$player->getName()] = false;
                $this->gold[$player->getName()] = false;
                $this->yellow[$player->getName()] = false;
                $this->darkgreen[$player->getName()] = false;
                $this->green[$player->getName()] = false;
                $this->aqua[$player->getName()] = false;
                $this->darkaqua[$player->getName()] = false;
                $this->darkblue[$player->getName()] = false;
                $this->blue[$player->getName()] = false;
                $this->lightpurple[$player->getName()] = false;
                $this->darkpurple[$player->getName()] = false;
                $this->gray[$player->getName()] = false;
                $this->darkgray[$player->getName()] = false;
                $this->black[$player->getName()] = true;
                $player->sendMessage(TextFormat::GREEN . "Updated Chat Color to Black.");
            }
        });
        return $form;
    }

    public function onCommand(CommandSender $sender, Command $command, string $alias, array $args): bool
    {
        switch ($command->getName()) {
            case "color":
                if($sender instanceof Player){
                    $sender->sendForm($this->getForm());
                }
        }
        return true;
    }

    public function onChat(PlayerChatEvent $event)
    {
        if($this->default[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§f" . $event->getPlayer()->getName() . "§r");
        }
        if($this->darkRed[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§4" . $event->getPlayer()->getName() . "§r");
        }
        if($this->red[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§c" . $event->getPlayer()->getName() . "§r");
        }
        if($this->gold[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§6" . $event->getPlayer()->getName() . "§r");
        }
        if($this->yellow[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§e" . $event->getPlayer()->getName() . "§r");
        }
        if($this->darkgreen[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§2" . $event->getPlayer()->getName() . "§r");
        }
        if($this->green[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§a" . $event->getPlayer()->getName() . "§r");
        }
        if($this->aqua[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§b" . $event->getPlayer()->getName() . "§r");
        }
        if($this->darkaqua[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§3" . $event->getPlayer()->getName() . "§r");
        }
        if($this->darkblue[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§1" . $event->getPlayer()->getName() . "§r");
        }
        if($this->blue[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§9" . $event->getPlayer()->getName() . "§r");
        }
        if($this->lightpurple[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§d" . $event->getPlayer()->getName() . "§r");
        }
        if($this->darkpurple[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§5" . $event->getPlayer()->getName() . "§r");
        }
        if($this->gray[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§7" . $event->getPlayer()->getName() . "§r");
        }
        if($this->darkgray[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§8" . $event->getPlayer()->getName() . "§r");
        }
        if($this->black[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§0" . $event->getPlayer()->getName() . "§r");
        }
        if($this->italic[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§o" . $event->getPlayer()->getDisplayName() . "§r");
        }
        if($this->bold[$event->getPlayer()->getName()] === true){
            $event->getPlayer()->setDisplayName("§l" . $event->getPlayer()->getDisplayName() . "§r");
        }
        return true;
    }
}