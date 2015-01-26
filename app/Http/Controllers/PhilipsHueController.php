<?php namespace HomeAutomation\Http\Controllers;
/**
 * PhilipsHueController.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    25/01/15
 */

use HomeAutomation\Modules\PhilipsHue\Lights;

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
     * @return \Phue\Light[]
     */
    public function getLights() {
        return $this->lights->getLights();
    }

    public function turnOffAllLights() {
        return $this->lights->turnOffAllLights();
    }

}