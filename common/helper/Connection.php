<?php
namespace common\helper;

use Yii;

class Connection extends \yii\db\Connection
{
    /**
     * Establishes a DB connection.
     * It does nothing if a DB connection has already been established.
     * @throws Exception if connection fails
     */
    public function open()
    {
        if ($this->pdo !== null) {
            return;
        }

        if (!empty($this->masters)) {
            $db = $this->openFromPool($this->masters, $this->masterConfig);
            if ($db !== null) {
                $this->pdo = $db->pdo;
                return;
            } else {
                $e = new InvalidConfigException('None of the master DB servers is available.');
                return $e->getMessage();
            }
        }

        if (empty($this->dsn)) {
            $e = new InvalidConfigException('Connection::dsn cannot be empty.');
            return $e->getMessage();

        }
        $token = 'Opening DB connection: ' . $this->dsn;
        try {
            Yii::info($token, __METHOD__);
            Yii::beginProfile($token, __METHOD__);
            $this->pdo = $this->createPdoInstance();
            $this->initConnection();
            Yii::endProfile($token, __METHOD__);
        } catch (\PDOException $e) {
            Yii::endProfile($token, __METHOD__);
            return $e->getMessage();
        }
    }


}