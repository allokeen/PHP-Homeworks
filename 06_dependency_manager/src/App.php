<?php

use Widget\Widget;
use Widget\Link;
use Widget\Button;

use Storage\SessionStorage;
use Storage\FileStorage;
use Storage\SQLiteStorage;
use Storage\MySQLStorage;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require '../vendor/predis/predis/autoload.php';
class App
{
    public function run() {

        ////////////////

        Predis\Autoloader::register();

        $client = new Predis\Client();
        $client->set('foo', 'bar');
        $value = $client->get('foo');

    /////////////////////////
    // create a log channel
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler(\Config\Directory::root()."/app.log", Logger::WARNING));

// add records to the log
        $log->warning('Foo');
        $log->error('Bar');


        $widgets = [
            new Link(1), new Link(2), new Link(3),
            new Button(1), new Button(2), new Button(3)
        ];

        $storageTypes = [new SessionStorage(), new FileStorage(), new SQLiteStorage(), new MySQLStorage(), new RedisStprage()];

        foreach ($storageTypes as $storage)
            foreach ($widgets as $widget)
                $storage->store($widget);


        foreach ($storageTypes as $storage) {
            echo get_class($storage);
            foreach ($storage->loadAll() as $widget)
                $this->render($widget);
            echo "<br/>";
        }
    }

    private function render(Widget $widget) {
        $widget->draw();
    }
}
