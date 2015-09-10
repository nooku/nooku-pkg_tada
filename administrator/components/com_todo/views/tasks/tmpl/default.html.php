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


<?= helper('bootstrap.load', array('javascript' => true)); ?>
<?= helper('behavior.koowa'); ?>


<?php // START @TODO: These files / markup should be loaded at root component level so we don't have to add them on each view ?>
<ktml:script src="assets://js/admin.js" />
<?php // END ?>


<?php // For testing purposes only ?>
<?php // JFactory::getApplication()->enqueueMessage('Message'); ?>
<?php // End test ?>


<!-- Overview -->
<div class="k-overview">

    <!-- Form -->
    <form id="k-offcanvas-container" action="" method="get" class="k-content-wrapper -koowa-grid">

        <!-- Sidebar -->
        <div id="k-sidebar" class="k-sidebar">

            <!-- Navigation -->
            <div class="k-sidebar__navigation">
                <ktml:toolbar type="menubar">
            </div>

            <!-- Filters -->
            <div class="k-sidebar__item">
                <div class="k-sidebar__content">
                    <ul class="k-list">
                        <li class="<?= is_null(parameters()->created_by) && parameters()->sort != 'sort' && parameters()->direction != 'desc' ? 'active' : ''; ?>">
                            <a href="<?= route('created_by=&sort=&direction=') ?>">
                                <span class="k-icon-list"></span>
                                All tasks
                            </a>
                        </li>
                        <li class="<?= parameters()->created_by ? 'active' : ''; ?>">
                            <a href="<?= route('created_by='.object('user')->getId().'&sort=&direction=') ?>">
                                <span class="k-icon-person"></span>
                                My tasks
                            </a>
                        </li>
                        <li class="<?= parameters()->sort == 'last_modified_on' && parameters()->direction == 'desc' ? 'active' : ''; ?>">
                            <a href="<?= route('sort=last_modified_on&direction=desc&created_by=') ?>">
                                <span class="k-icon-clock"></span>
                                Recently edited
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div><!-- .k-sidebar -->

        <!-- Content -->
        <div class="k-content">

            <!-- Toolbar -->
            <div class="k-toolbar">
                <div class="koowa-toolbar">
                    <!-- Sidebar toggle button -->
                    <button id="k-toggle-button" class="off-canvas-menu-toggle" type="button">
                        <span class="bar1"></span>
                        <span class="bar2"></span>
                        <span class="bar3"></span>
                    </button>
                    <!-- Buttons -->
                    <ktml:toolbar type="actionbar" icon="task icon-stack">
                </div>
            </div><!-- .k-toolbar -->

            <!-- Component -->
            <div class="k-component">

                <!-- Scopebar -->
                <div class="k-scopebar">
                    
                    <!-- Filters -->
                    <div class="k-scopebar__item k-scopebar__item--fluid">
                        
                        <!-- Filter -->
                        <div class="select2-wrapper select2--link-style select2--filter">
                            <select name="enabled" id="select2-filter" data-placeholder="Status" onchange="this.form.submit()">
                                <option selected>--Status--</option>
                                <option value="1"<?= parameters()->enabled === 1 ? ' selected' : ''; ?>>Published</option>
                                <option value="0"<?= parameters()->enabled === 0 ? ' selected' : ''; ?>>Unpublished</option>
                            </select>
                        </div>

                        <!-- Search toggle button -->
                        <button type="button" class="toggle-search"><span class="k-icon-magnifying-glass"></span><span class="visually-hidden">Search</span></button>

                    </div>

                    <!-- Search -->
                    <div class="k-scopebar__item k-scopebar__search">
                        <?= helper('grid.search', array('submit_on_clear' => true)) ?>
                    </div>
                    
                </div><!-- .k-scopebar -->

                <!-- Table -->
                <div class="k-table-container">
                    <div class="k-table">
                        <table class="table--fixed footable">
                            <thead>
                                <tr>
                                    <th width="1">
                                        <?= helper('grid.checkall')?>
                                    </th>
                                    <th data-toggle="true">
                                        <?= helper('grid.sort', array('column' => 'title', 'title' => 'Title')); ?>
                                    </th>
                                    <th width="5%" data-hide="phone,tablet">
                                        <?= helper('grid.sort', array('column' => 'enabled', 'title' => 'Status')); ?>
                                    </th>
                                    <th width="5%" data-hide="phone,tablet">
                                        <?= helper('grid.sort', array('column' => 'created_by', 'title' => 'Owner')); ?>
                                    </th>
                                    <th width="5%" data-hide="phone,tablet">
                                        <?= helper('grid.sort', array('column' => 'last_modified_on', 'title' => 'Last modified')); ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <? foreach ($tasks as $task): ?>
                                <tr>
                                    <td>
                                        <?= helper('grid.checkbox', array('entity' => $task)) ?>
                                    </td>
                                    <td>
                                        <a href="<?= route('view=task&id='.$task->id); ?>">
                                            <?= escape($task->title); ?></a>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('grid.publish', array('entity' => $task, 'clickable' => true)) ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= escape($task->getAuthor()->getName()); ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('date.format', array('date' => $task->last_modified_on)); ?>
                                    </td>
                                </tr>
                            <? endforeach; ?>
                            <? if (!count($tasks)) : ?>
                                <tr>
                                    <td colspan="9">
                                        <?= translate('No tasks found.') ?>
                                    </td>
                                </tr>
                            <? endif; ?>
                            </tbody>
                        </table>

                    </div><!-- .k-table -->

                    <? if (count($tasks)): ?>
                    <div class="k-table-pagination">
                        <?= helper('paginator.pagination') ?>
                    </div><!-- .k-table-pagination -->
                    <? endif; ?>

                </div><!-- .k-table-container -->

            </div><!-- .k-component -->

        </div><!-- k-content -->

    </form><!-- .k-content-wrapper -->

</div><!-- .k-overview -->