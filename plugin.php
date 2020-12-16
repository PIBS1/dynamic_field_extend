<?php
namespace Amuz\XePlugin\DynamicFieldExtend;

use Route;
use Xpressengine\Plugin\AbstractPlugin;
use Xpressengine\Config\ConfigEntity;

class Plugin extends AbstractPlugin
{
    /**
     * 이 메소드는 활성화(activate) 된 플러그인이 부트될 때 항상 실행됩니다.
     *
     * @return void
     */
    public function boot()
    {
        // implement code

        $this->route();
    }

    protected function route()
    {
        Route::settings(self::getId(), function () {
            Route::get('/', ['as' => 'manage.dynamic_field_extend.index', 'uses' => 'ManagerController@index']);
            Route::post('/', ['as' => 'manage.dynamic_field_extend.updateConfig', 'uses' => 'ManagerController@updateConfig']);
            //Route::get('/pointLog', ['as' => 'manage.dynamic_field_extendextend.point_log', 'uses' => 'ManagerController@pointLog']);
        }, ['namespace' => 'Amuz\XePlugin\DynamicFieldExtend\Controller']);
    }

    /**
     * 플러그인이 활성화될 때 실행할 코드를 여기에 작성한다.
     *
     * @param string|null $installedVersion 현재 XpressEngine에 설치된 플러그인의 버전정보
     *
     * @return void
     */
    public function activate($installedVersion = null)
    {
        // implement code
    }

    /**
     * 플러그인을 설치한다. 플러그인이 설치될 때 실행할 코드를 여기에 작성한다
     *
     * @return void
     */
    public function install()
    {
        // implement code

        //xe_config설정값
        $configManager = app('xe.config');
        $config = $configManager->get('dynamic_field_extend');

        if ($config === null) {
            $config = new ConfigEntity();

            $config->set('hash_tag', 1);
            $config->set('media_library', 1);
            $config->set('color_picker', 1);
            $config->set('edittable', 1);
            $config->set('category_load', 1);
            $config->set('category_input', 1);
            $configManager->add('dynamic_field_extend', $config->getPureAll());
        }
    }

    /**
     * 해당 플러그인이 설치된 상태라면 true, 설치되어있지 않다면 false를 반환한다.
     * 이 메소드를 구현하지 않았다면 기본적으로 설치된 상태(true)를 반환한다.
     *
     * @return boolean 플러그인의 설치 유무
     */
    public function checkInstalled()
    {
        // implement code

        return parent::checkInstalled();
    }

    /**
     * 플러그인을 업데이트한다.
     *
     * @return void
     */
    public function update()
    {
        // implement code
    }

    /**
     * 해당 플러그인이 최신 상태로 업데이트가 된 상태라면 true, 업데이트가 필요한 상태라면 false를 반환함.
     * 이 메소드를 구현하지 않았다면 기본적으로 최신업데이트 상태임(true)을 반환함.
     *
     * @return boolean 플러그인의 설치 유무,
     */
    public function checkUpdated()
    {
        // implement code

        return parent::checkUpdated();
    }

    public function getSettingsURI()
    {
        return route('manage.dynamic_field_extend.index');
        //return "";
    }
}
