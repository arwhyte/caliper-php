<?php
require_once 'CaliperSensor.php';
require_once 'Caliper/entities/schemadotorg/Thing.php';
require_once 'util/TimestampUtil.php';

abstract class Entity implements JsonSerializable, Thing {
    /** @var string */
    protected $id;
    /** @var Type */
    public $type;
    /** @var string */
    public $name;
    /** @var string */
    private $description;
    /** @var string[] */
    private $extensions;
    /** @var DateTime */
    private $dateCreated;
    /** @var DateTime */
    private $dateModified;

    function __construct($id) {
        $this->setId($id);
    }

    public function jsonSerialize() {
        return [
            '@id' => $this->getId(),
            '@type' => $this->getType(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'extensions' => (object) $this->getExtensions(),
            'dateCreated' => TimestampUtil::formatTimeISO8601MillisUTC($this->getDateCreated()),
            'dateModified' => TimestampUtil::formatTimeISO8601MillisUTC($this->getDateModified()),
        ];
    }

    /** @return string id */
    public function getId() {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this|Entity
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /** @return Type type */
    public function getType() {
        return $this->type;
    }

    /**
     * @param Type $type
     * @return $this|Entity
     */
    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    /** @return string name */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this|Entity
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /** @return string description */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this|Entity
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /** @return string[] extensions */
    public function getExtensions() {
        return $this->extensions;
    }

    /**
     * @param string[] $extensions
     * @return $this|Entity
     */
    public function setExtensions($extensions) {
        $this->extensions = $extensions;
        return $this;
    }

    /** @return DateTime dateCreated */
    public function getDateCreated() {
        return $this->dateCreated;
    }

    /**
     * @param DateTime $dateCreated
     * @return $this|Entity
     */
    public function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /** @return DateTime dateModified */
    public function getDateModified() {
        return $this->dateModified;
    }

    /**
     * @param DateTime $dateModified
     * @return $this|Entity
     */
    public function setDateModified($dateModified) {
        $this->dateModified = $dateModified;
        return $this;
    }
}
