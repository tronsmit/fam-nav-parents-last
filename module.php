<?php

/**
 *  Abstract module to replace a view
 */

declare(strict_types=1);

namespace MyCustomNamespace;

use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\View;

return new class extends AbstractModule implements ModuleCustomInterface {
    use ModuleCustomTrait;

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Family navigator - show parent families last';
    }

    /**
     * Bootstrap the module
     */
    public function boot(): void
    {
        // Register a namespace for our views.
        View::registerNamespace($this->name(), $this->resourcesFolder() . 'views/');

        // Replace an existing view with our own version.
        View::registerCustomView('::modules/family_nav/sidebar', $this->name() . '::sidebar-parents-last');
    }

    /**
     * Where does this module store its resources
     *
     * @return string
     */
    public function resourcesFolder(): string
    {
        return __DIR__ . '/resources/';
    }

};
