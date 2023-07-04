<?php
class EnvReader
{

    private $env = '../../app/.env';
    protected $dbHost = '';
    protected $dbUser = '';
    protected $dbname = '';
    protected $dbBaseURL = '';
    protected $dbPass = '';

    public function __construct() {
        $envContent = file_get_contents($this->env);
        $envVariables = array_filter(explode("\n", $envContent));
        foreach ($envVariables as $variable) {
            list($key, $value) = explode('=', $variable, 2);
            putenv("$key=$value");
        }

        $this->dbHost = trim(getenv('DB_HOST'));
        $this->dbUser = trim(getenv('DB_USER'));
        $this->dbname = trim(getenv('DB_NAME'));
        $this->dbBaseURL = trim(getenv('DB_BASE_URL'));
        $this->dbPass = trim(getenv('DB_PASS'));
    }

}
?>