<?php namespace HomeAutomation\Http\Controllers;
/**
 * PhilipsHueController.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    25/01/15
 */

use HomeAutomation\Modules\PhilipsHue\Lights;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PhilipsHueController extends Controller {

    /**
     * @var Lights
     */
    protected $lights;

    /**
     * Create a new controller instance using Philips Hue Lights
     *
     * @param Lights $lights
     */
    public function __construct(Lights $lights) {
        $this->lights = $lights;
    }

    /**
     * Get all lights and their properties
     *
     * @return \Phue\Light[]
     */
    public function getLights() {
        return $this->lights->getLights();
    }

    /**
     * Turn off all the lights via group 0
     *
     * @return array
     */
    public function turnOffAllLights() {
        return $this->lights->turnOffAllLights();
    }

    /**
     * Adjust light by id and brightness
     *
     * @param $id
     * @param $brightness
     * @return array
     */
    public function adjustLight($id, $brightness) {
        return $this->lights->adjustLight($id, $brightness);
    }
}