<?php

/**
 * Created by PhpStorm.
 * User: jaume
 * Date: 10/03/17
 * Time: 9:22
 */
class mainController
{
    private $userSettings;

    /**
     * mainController constructor.
     */
    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            $this->userSettings = $this->getSettings();
            $this->userSettings['user'] = $_SESSION['user'];
            $this->userSettings['type'] = $_SESSION['type'];
            $this->userSettings['id'] = $_SESSION['id'];
        } else {
            $this->userSettings = $this->getSettings();
            $this->userSettings['user'] = 0;
            $this->userSettings['type'] = 0;
            $this->userSettings['id'] = 0;
        }

    }

    private function getSettings()
    {
        $array = json_decode(file_get_contents("files/settings.json"), true);
        $return = array_merge($array['protection'], $array['privileges']);
        $return['maxItems'] = $array['maxItems'];

        return $return;
    }

    /**
     * @return array
     */
    public function getUserSettings(): array
    {
        return $this->userSettings;
    }

    /**
     * @param array $userSettings
     */
    public function setUserSettings(array $userSettings)
    {
        $this->userSettings = $userSettings;
    }

    /**
     * @return mixed
     */

}