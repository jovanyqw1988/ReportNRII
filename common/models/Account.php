<?php

namespace common\models;

use common\helper\Connection;use Yii;use yii\db\ActiveRecord;use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%account}}".
 *
 * @property string $account
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $pf_name
 * @property string $pf_desc
 * @property string $ins_code
 * @property string $client_id
 * @property string $client_secret
 * @property string $redirect_uri
 * @property string $state
 * @property integer $group
 * @property string $db_type
 * @property string $db_host
 * @property string $db_port
 * @property string $db_name
 * @property string $db_charset
 * @property string $db_user
 * @property string $db_password
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AccountGroup $group0
 * @property CustomsSupervision[] $customsSupervisions
 * @property Instrument[] $instruments
 * @property InstrumentConfig[] $instrumentConfigs
 * @property ServerEffect $serverEffect
 * @property ServiceRecord[] $serviceRecords
 */
class Account extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%account}}';
    }

    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return static::findOne(['account' => $id]);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        if (empty($token)) {
            return false;
        }
        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account', 'pf_name'], 'required'],
            [['pf_desc'], 'string'],
            [['group', 'created_at', 'updated_at'], 'integer'],
            [['account', 'auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'state'], 'string', 'max' => 255],
            [['pf_name', 'ins_code', 'client_id', 'client_secret', 'redirect_uri', 'db_name', 'db_charset', 'db_user', 'db_password'], 'string', 'max' => 45],
            [['db_type'], 'string', 'max' => 20],
            [['db_host'], 'string', 'max' => 30],
            [['db_port'], 'string', 'max' => 6],
            [['group'], 'exist', 'skipOnError' => true, 'targetClass' => AccountGroup::className(), 'targetAttribute' => ['group' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'account' => Yii::t('yii', 'ReportRNII平台的账户'),
            'auth_key' => Yii::t('yii', 'Auth Key'),
            'password_hash' => Yii::t('yii', 'ReportNRII平台的登录密码，使用Hash加密处理，32位'),
            'password_reset_token' => Yii::t('yii', 'Password Reset Token'),
            'pf_name' => Yii::t('yii', 'Pf Name'),
            'pf_desc' => Yii::t('yii', 'Pf Desc'),
            'ins_code' => Yii::t('yii', 'Ins Code'),
            'client_id' => Yii::t('yii', 'Client ID'),
            'client_secret' => Yii::t('yii', 'Client Secret'),
            'redirect_uri' => Yii::t('yii', 'Redirect Uri'),
            'state' => Yii::t('yii', 'State'),
            'group' => Yii::t('yii', '用户组，当此项为Null时，说明此用户为超级用户'),
            'db_type' => Yii::t('yii', '数据库类型'),
            'db_host' => Yii::t('yii', '连接地址'),
            'db_port' => Yii::t('yii', '端口号'),
            'db_name' => Yii::t('yii', '数据库全名'),
            'db_charset' => Yii::t('yii', '数据库连接参数，例：useUnicode=true&characterEncoding=gbk'),
            'db_user' => Yii::t('yii', '数据库连接用户名'),
            'db_password' => Yii::t('yii', '数据库连接密码'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(AccountGroup::className(), ['id' => 'group']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomsSupervisions()
    {
        return $this->hasMany(CustomsSupervision::className(), ['account' => 'account']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstruments()
    {
        return $this->hasMany(Instrument::className(), ['account' => 'account']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstrumentConfigs()
    {
        return $this->hasMany(InstrumentConfig::className(), ['account' => 'account']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServerEffect()
    {
        return $this->hasOne(ServerEffect::className(), ['account' => 'account']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceRecords()
    {
        return $this->hasMany(ServiceRecord::className(), ['account' => 'account']);
    }

    public function testDBConnection()
    {
        $conn = $this->getDBConnection();
        $e = $conn->open();
        if (empty($conn->pdo))
            return $e;
        $transaction = $conn->beginTransaction();
        $result = '';
        try {
            $conn->createCommand("CREATE TABLE IF NOT EXISTS `Test` (`id` INT(11) NOT NULL,`name` VARCHAR(45) NULL DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8")->execute();
            $conn->createCommand("INSERT INTO `Test` VALUES (1,:name) ON DUPLICATE KEY UPDATE `name` = :name")->bindValue(':name', '测试成功')->execute();
            $result = $conn->createCommand("SELECT `name` FROM `Test` WHERE `id` = 1")->queryOne()['name'];
            $conn->createCommand("DROP TABLE IF EXISTS `Test`")->execute();
            $transaction->commit();
        } catch (\PDOException $e) {
            $result .= $e->getMessage();
            if ($transaction)
                $transaction->rollBack();
        } finally {
            $conn->close();
        }
        return $result;
    }

    public function getDBConnection()
    {
        if (empty($dsn = $this->getDsn()))
            return null;
        $conn = new Connection();
        $conn->dsn = $dsn;
        $conn->username = $this->db_user;
        $conn->password = $this->db_password;
        $conn->charset = $this->db_charset;
        return $conn;
    }

    public function getDsn()
    {
        if (!$dbConfig = Yii::$app->params['Database_Type'][$this->db_type])
            return null;
        if (!$dsn = $dbConfig['dsn'])
            return null;
        return strtr($dsn, [
            '{host}' => $this->db_host,
            '{port}' => $this->db_port,
            '{dbname}' => $this->db_name,
        ]);
    }

    public function testQuery($id, $start, $limit, $index = 0)
    {
        $result = [];
        $conn = $this->getDBConnection();
        $e = $conn->open();
        if (empty($conn->pdo)) {
            return ["error" => $e];
        }
        $insConfig = InstrumentConfig::findOne(['account' => Yii::$app->user->id, 'type' => $id]);
        $transaction = $conn->beginTransaction();
        $query = [];
        try {
            $query = $conn->createCommand($insConfig->sqlFindPages($start, $limit))->queryAll();
            $transaction->commit();
        } catch (\PDOException $e) {
            return ["error" => $e];
        } finally {
            $conn->close();
        }
        return ['total' => count($query), 'data' => empty($query) ? [] : $query[$index], 'index' => $index, "sql" => [$insConfig->sqlFindPages($start, $limit)]];
    }

    public function testQueryAll($id, $index = 0)
    {
        $result = [];
        $conn = $this->getDBConnection();
        $e = $conn->open();
        if (empty($conn->pdo)) {
            return ["error" => $e];
        }
        $insConfig = InstrumentConfig::findOne(['account' => Yii::$app->user->id, 'type' => $id]);
        $transaction = $conn->beginTransaction();
        $query = [];
        try {
            $query = $conn->createCommand($insConfig->sqlFindAll())->queryAll();
            $transaction->commit();
        } catch (\PDOException $e) {
            return ["error" => $e];
        } finally {
            $conn->close();
        }
        return ['total' => count($query), 'data' => empty($query) ? [] : $query[$index], 'index' => $index, "sql" => [$insConfig->sqlFindAll()]];
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->account;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
