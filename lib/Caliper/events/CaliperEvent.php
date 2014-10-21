<?php

/**
 *  author: Prashant Nayak
 *  ©2013 IMS Global Learning Consortium, Inc.  All Rights Reserved.
 *  For license information contact, info@imsglobal.org
 */
class CaliperEvent implements JsonSerializable {

    private $context;
    private $type;
    private $actor;
    private $action;
    private $object;
    private $target;
    private $startedAt;
    private $endedAt = 0;
    private $edApp;
    private $lisOrganization;
    private $generated;
    private $duration;

    /*
    private $agent;
    private $activityContext;
    private $learningContext;
     */


    /**
     * Create a new CaliperEvent
     */
    public function __construct() {
    }


    /*
     *
     */
    public function __destruct() {
    }

    /**
     *
     * @see JsonSerializable::jsonSerialize()
     * to implement jsonLD
     */
    public function jsonSerialize() {

        return ['@context' => $this->getContext(),
            '@type' => $this->getType(),
            'edApp' => $this->getEdApp(),
            'group' => $this->getLisOrganization(),
            'actor' => $this->getActor(),
            'action' => $this->getAction(),
            'object' => $this->getObject(),
            'target' => $this->getTarget(),
            'generated' => $this->getGenerated(),
            'startedAtTime' => $this->getStartedAt(),
            'endedAtTime' => $this->getEndedAt(),
            'duration' => $this->getDuration()
        ];
    }

    /**
     * @return mixed
     */
    public function getContext() {
        return $this->context;
    }

    /**
     * @param mixed $context
     */
    public function setContext($context) {
        $this->context = $context;
    }

    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type) {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getEdApp() {
        return $this->edApp;
    }

    /**
     * @param mixed $edApp
     */
    public function setEdApp($edApp) {
        $this->edApp = $edApp;
    }

    /**
     * @return mixed
     */
    public function getLisOrganization() {
        return $this->lisOrganization;
    }

    /**
     * @param mixed $lisOrganization
     */
    public function setLisOrganization($lisOrganization) {
        $this->lisOrganization = $lisOrganization;
    }

    /**
     * @return mixed
     */
    public function getActor() {
        return $this->actor;
    }

    /**
     * @param mixed $actor
     */
    public function setActor($actor) {
        $this->actor = $actor;
    }

    /**
     * @return mixed
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action) {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param mixed $object
     */
    public function setObject($object) {
        $this->object = $object;
    }

    /**
     *
     */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param mixed $target
     */
    public function setTarget($target) {
        $this->target = $target;
    }

    /**
     * @return the generated
     */
    public function  getGenerated() {
        return $this->generated;
    }

    /**
     * @param generated
     *            the generated to set
     */
    public function  setGenerated($generated) {
        $this->generated = $generated;
    }

    /**
     * @return mixed
     */
    public function getStartedAt() {
        return $this->startedAt;
    }

    /**
     * @param mixed $startedAtTime
     */
    public function setStartedAt($startedAt) {
        $this->startedAt = $startedAt;
    }

    /**
     * @return mixed
     */
    public function getEndedAt() {
        return $this->endedAt;
    }

    /**
     * @param mixed $startedAtTime
     */
    public function setEndedAt($EndedAt) {
        $this->endedAt = $EndedAt;
    }

    /**
     * @return mixed
     */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration) {
        $this->duration = $duration;
    }
}