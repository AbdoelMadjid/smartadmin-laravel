<?php

namespace Vreyz\Admin\Grid\Tools;

use Vreyz\Admin\Grid;

class CreateButton extends AbstractTool
{
    /**
     * @var Grid
     */
    protected $grid;

    /**
     * Create a new CreateButton instance.
     *
     * @param Grid $grid
     */
    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    /**
     * Render CreateButton.
     *
     * @return string
     */
    public function render()
    {
        if (!$this->grid->showCreateBtn()) {
            return '';
        }

        $new = trans('admin.new');
        if (strtolower(config('admin.themes.theme')) == 'adminlte') {
            return <<<EOT

<div class="btn-group pull-right grid-create-btn" style="margin-right: 10px">
    <a href="{$this->grid->getCreateUrl()}" class="btn btn-sm btn-success" title="{$new}">
        <i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;{$new}</span>
    </a>
</div>

EOT;
        } else {
            return <<<EOT
            <div class="btn-group grid-create-btn" style="margin-right: 10px">
                <a href="{$this->grid->getCreateUrl()}" class="btn btn-sm btn-success" title="{$new}">
                    <i class="fas fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;{$new}</span>
                </a>
            </div>
EOT;
        }
    }
}
