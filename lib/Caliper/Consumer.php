<?php
abstract class Caliper_Consumer {

  protected $type = "Consumer";

  protected $options;
  protected $apiKey;

  /**
   * Store apiKey and options as part of this consumer
   * @param string $apiKey
   * @param array  $options
   */
  public function __construct($apiKey, $options = array()) {
    $this->apiKey = $apiKey;
    $this->options = $options;
  }

  /**
   * Describe an entity 
   * @return boolean            whether the track call succeeded
   */
  abstract public function describe($caliperEntity);

  /**
   * Send learning events
   * @return boolean                   whether the measure call succeeded
   */
  abstract public function measure($caliperEvent);

  /**
   * Check whether debug mode is enabled
   * @return boolean
   */
  protected function debug() {
    return isset($this->options["debug"]) ? $this->options["debug"] : false;
  }

  /**
   * Check whether we should connect to the API using SSL. This is enabled by
   * default with connections which make batching requests. For connections
   * which can save on round-trip times, we disable it.
   * @return boolean
   */
  protected function ssl() {
    return isset($this->options["ssl"]) ? $this->options["ssl"] : false;
  }

  /**
   * On an error, try and call the error handler, if debugging output to
   * error_log as well.
   * @param  string $code
   * @param  string $msg
   */
  protected function handleError($code, $msg) {

    if (isset($this->options['error_handler'])) {
      $handler = $this->options['error_handler'];
      $handler($code, $msg);
    }

    if ($this->debug()) {
      error_log("[Caliper][" . $this->type . "] " . $msg);
    }
  }
}
