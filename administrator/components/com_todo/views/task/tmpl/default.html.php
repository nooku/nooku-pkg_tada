<?
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/joomlatools/joomlatools-todo for the canonical source repository
 */

defined('KOOWA') or die; ?>

<?= helper('behavior.validator'); ?>
<?= helper('behavior.ui'); ?>

<ktml:module position="toolbar">
    <ktml:toolbar type="actionbar" icon="task-add icon-pencil-2">
</ktml:module>

<!-- Overview -->
<div class="k-content-wrapper">

    <!-- The content -->
    <div class="k-content">

        <!-- Toolbar -->
        <div class="k-toolbar">
            <div class="koowa-toolbar">
                <ktml:toolbar type="actionbar" title="COM_TODO_SUBMENU_TASKS" icon="task icon-stack">
            </div>
        </div>

        <!-- Component -->
        <div class="k-component">

            <!-- Form -->
            <form class="k-form-layout -koowa-form" action="" method="post">

                <!-- Container -->
                <div class="k-container">

                    <!-- Main information -->
                    <div class="k-container__main">

                        <fieldset>
                            <div class="control-group">
                                <div class="controls">

                                    <input
                                        required
                                        class="form-control input-lg"
                                        id="todo_form_title"
                                        type="text"
                                        name="title"
                                        maxlength="255"
                                        value="<?= escape($task->title); ?>"
                                        placeholder="Enter title here"
                                    />

                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">

                                    <div class="input-group input-group-sm">
                                        <label for="todo_form_alias" class="input-group-addon">
                                            Alias
                                        </label>
                                        <input
                                            id="todo_form_alias"
                                            type="text"
                                            class="form-control"
                                            name="slug"
                                            maxlength="255"
                                            value="<?= escape($task->slug) ?>"
                                            placeholder="Will be created automatically"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <?= helper('editor.display', array(
                                        'name' => 'description',
                                        'value' => $task->description,
                                        'id'   => 'description',
                                        'width' => '100%',
                                        'height' => '341',
                                        'cols' => '100',
                                        'rows' => '20',
                                        'buttons' => array('pagebreak')
                                    )); ?>
                                </div>
                            </div>

                        </fieldset>

                    </div><!-- .k-container__main -->

                    <!-- Other information -->
                    <div class="k-container__sub">

                        <fieldset class="k-form-block">

                            <div class="k-form-block__header">
                                <?= translate('Publishing') ?>
                            </div>

                            <div class="k-form-block__content">
                                <div class="control-group">
                                    <div class="control-content">
                                        <label class="control-label">Status</label>
                                        <div class="controls">
                                            <?= helper('select.booleanlist', array(
                                                'name' => 'enabled',
                                                'selected' => $task->enabled,
                                                'true' => translate('Published'),
                                                'false' => translate('Unpublished')
                                            )); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                    </div><!-- .k-container__sub -->

                </div><!-- .k-container -->

            </form><!-- .k-form-layout -->

        </div><!-- .k-component -->

    </div><!-- .k-content -->

</div><!-- .k-content-wrapper -->
