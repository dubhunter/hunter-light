<?php

use Talon\Http\Response\Json as JsonResponse;

class V1LightController extends V1ApiController {

	public function get() {
		try {
			return JsonResponse::ok(array(
				'color' => $this->getColor(),
				'days' => $this->getDays(),
				'temp' => $this->getTemp() ? intval(round($this->getTemp())) : null,
				'time' => time(),
				'offset' => date('Z'),
			));
		} catch (Exception $e) {
			return JsonResponse::error(array(
				'error' => $e->getMessage(),
			));
		}
	}

}
