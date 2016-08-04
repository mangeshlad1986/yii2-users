namespace app\modules\users-module;

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
	// initialize the module with the configuration loaded from config.php
    	\Yii::configure($this, require(__DIR__ . '/config.php'));

       // For commands
       if (Yii::$app instanceof \yii\console\Application) {
        $this->controllerNamespace = 'app\modules\users-module\commands';
       }
    }
}
