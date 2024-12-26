<?php

/**
 * @file
 * Addon file to display help block on Admin UI.
 */

if(!defined('e107_INIT'))
{
	exit;
}

e107::lan('fallingholidays', true, true);

/**
 * Class fallingholidays_help.
 */
class fallingholidays_help
{

	private $action;

	public function __construct()
	{
		$this->action = varset($_GET['action'], '');
		$this->renderHelpBlock();
	}

	public function renderHelpBlock()
	{
		switch($this->action)
		{
			default:
				$block = $this->getHelpBlockListPage();
				break;
		}

		if(!empty($block))
		{
			e107::getRender()->tablerender($block['title'], $block['body']);
		}
	}

	public function getHelpBlockListPage()
	{
		e107::js('footer', 'https://buttons.github.io/buttons.js');

		$content = '';

		$issue = array(
			'href="https://github.com/LaocheXe/Falling-Holidays-eXeSystem/issues"',
			'class="github-button"',
			'data-icon="octicon-issue-opened"',
			'data-style="mega"',
			'data-count-api="/repos/LaocheXe/Falling-Holidays-eXeSystem#open_issues_count"',
			'data-count-aria-label="# issues on GitHub"',
			'aria-label="Issue LaocheXe/Falling-Holidays-eXeSystem on GitHub"',
		);

		$star = array(
			'href="https://github.com/LaocheXe/Falling-Holidays-eXeSystem"',
			'class="github-button"',
			'data-icon="octicon-star"',
			'data-style="mega"',
			'data-count-href="/LaocheXe/Falling-Holidays-eXeSystem/stargazers"',
			'data-count-api="/repos/LaocheXe/Falling-Holidays-eXeSystem#stargazers_count"',
			'data-count-aria-label="# stargazers on GitHub"',
			'aria-label="Star LaocheXe/Falling-Holidays-eXeSystem on GitHub"',
		);

		$content .= '<p class="text-center">' . LAN_FHS_ADMIN_HELP_03 . '</p>';
		$content .= '<p class="text-center">';
		$content .= '<a ' . implode(" ", $issue) . '>' . LAN_FHS_ADMIN_HELP_04 . '</a>';
		$content .= '</p>';

		$content .= '<p class="text-center">' . LAN_FHS_ADMIN_HELP_02 . '</p>';
		$content .= '<p class="text-center">';
		$content .= '<a ' . implode(" ", $star) . '>' . LAN_FHS_ADMIN_HELP_05 . '</a>';
		$content .= '</p>';

		$block = array(
			'title' => LAN_FHS_ADMIN_HELP_01,
			'body'  => $content,
		);

		return $block;
	}

}


new fallingholidays_help();
