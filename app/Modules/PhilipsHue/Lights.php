<?php namespace HomeAutomation\Modules\PhilipsHue;
/**
 * Lights.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    25/01/15
 */

use Phue\Client;

class Lights {

    const IP = '192.168.1.197';
    const USER = 'newdeveloper';

    /**
     * @var Client
     */
    protected $client;

    /**
     * Create a Philips Hue Lights Instance
     */
    public function __construct() {
        $this->client = new Client(self::IP, self::USER);
    }

    /**
     * @return \Phue\Light[]
     */
    public function getLights() {
        $lights = array();
        foreach ($this->client->getLights() as $lightId => $light) {
            $light->isOn() ? $class = 'light-on' : $class = 'light-off';
            $light->isOn() ? $brightness = $light->getBrightness() : $brightness = 0;
            array_push($lights, array(
                'id'            => $lightId,
                'name'          => $light->getName(),
                'brightness'    => $brightness,
                'isOn'          => $light->isOn(),
                'class'         => $class
            ));
        }

        return $lights;
    }

    /**
     * Turn off all lights using GetGroupById(0)
     *
     * @return array
     */
    public function turnOffAllLights() {
        try {
            $group = $this->client->sendCommand(new \Phue\Command\GetGroupById(0));
            $group->setOn(false);

            return array('command' => true);
        } catch (\Exception $e) {

            return array('command' => $e->getMessage());
        }
    }

    /**
     * Adjust individual light
     *
     * @param $id
     * @param $brightness
     * @return array
     */
    public function adjustLight($id, $brightness) {
        try {
            $light = $this->client->sendCommand(new \Phue\Command\GetLightById($id));
            $command = new \Phue\Command\SetLightState($light);
            $command->brightness($brightness);
            $this->client->sendCommand($command);

            return array('command' => true);
        } catch (\Exception $e) {
            dd($e);
            return array('command' => $e->getMessage());
        }
    }
}
