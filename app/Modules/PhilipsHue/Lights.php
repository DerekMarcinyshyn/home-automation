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
            array_push($lights, array(
                'id'            => $lightId,
                'name'          => $light->getName(),
                'brightness'    => $light->getBrightness(),
                'isOn'          => $light->isOn(),
                'class'         => $class
            ));
        }

        return $lights;
    }
}