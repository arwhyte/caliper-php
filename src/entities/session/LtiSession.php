<?php
namespace IMSGlobal\Caliper\entities\session;

use IMSGlobal\Caliper\entities;

class LtiSession extends Session {
    /** @var mixed */
    private $launchParameters = null;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::LTI_SESSION));
    }

    public function jsonSerialize() {
        return $this->removeChildEntitySameContexts(array_merge(parent::jsonSerialize(), [
            'launchParameters' => $this->getLaunchParameters(),
        ]));
    }

    /** @return mixed */
    public function getLaunchParameters() {
        return $this->launchParameters;
    }

    /**
     * @param mixed $launchParameters
     * @return LtiSession
     */
    public function setLaunchParameters($launchParameters) {
        $this->launchParameters = $launchParameters;
        return $this;
    }

}