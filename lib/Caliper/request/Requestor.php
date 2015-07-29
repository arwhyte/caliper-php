<?php
require_once 'Caliper/util/JsonUtil.php';

abstract class Requestor {
    /**
     * @param Sensor $sensor
     * @param DateTime $sendTime
     * @param Entity|Event|Entity[]|Event[] $data

     * @return Envelope
     */
    public function createEnvelope(Sensor $sensor, DateTime $sendTime, $data) {
        return (new Envelope())
            ->setSensorId($sensor)
            ->getSendTime($sendTime)
            ->setData($data);
    }

    /**
     * Provided for parity with the caliper-java API, this is a synonym for
     * serializeData()
     *
     * @deprecated Use serializeData() instead
     *
     * @param Envelope $envelope
     * @param Options $options
     * @return string
     */
    public function serializeEnvelope(Envelope $envelope, Options $options) {
        return $this->serializeData($envelope, $options);
    }

    /**
     * @param object $data
     * @param $include
     * @return string
     */
    public function serializeData($data, Options $options) {
        $dataForEncoding = $data;

        if ($options->getJsonInclude()->getValue() !== JsonInclude::ALWAYS) {
            $dataForEncoding = JsonUtil::preserialize($dataForEncoding, $options);
        }

        return json_encode($dataForEncoding, $options->getJsonEncodeOptions());
    }
}