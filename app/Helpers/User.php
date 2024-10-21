<?php

namespace App\Helpers;
use Auth;
use App\Position;
use Illuminate\Support\Facades\DB;

class User {

	public static function get_name($user_id)
	{
		$user = DB::table('users')->where('id', $user_id)->first();
		$name = $user->name;
		$name = explode(' ', trim($name));
		return (isset($user->name) ? $name[0] : '');
	}

	public static function get_username($user_id)
	{
		$user = DB::table('users')->where('id', $user_id)->first();

		return (isset($user->username) ? $user->username : '');
	}

	public static function rejected_jobfile($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['rejected_view'] == '1') ? 'block' : 'none';
	}

	public static function error_reporting($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['error_view'] == '1') ? 'block' : 'none';
	}

	public static function archives($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['archive_view'] == '1') ? 'block' : 'none';
	}

	public static function archives_edit($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['archive_edit'] == '1') ? 'block' : 'none';
	}

	public static function archive_delete($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['archive_delete'] == '1') ? 'block' : 'none';
	}

	public static function all_job($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['alljobfile_view'] == '1') ? 'block' : 'none';
	}

	public static function alljobfile_add($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['alljobfile_add'] == '1') ? 'block' : 'none';
	}

	public static function alljobfile_edit($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['alljobfile_edit'] == '1') ? 'block' : 'none';
	}

	public static function alljobfile_delete($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['alljobfile_delete'] == '1') ? 'block' : 'none';
	}

	public static function own_all_job($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['ownjobfile_view'] == '1') ? 'block' : 'none';
	}

	public static function ownjobfile_add($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['ownjobfile_add'] == '1') ? 'block' : 'none';
	}

	public static function ownjobfile_edit($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['ownjobfile_edit'] == '1') ? 'block' : 'none';
	}

	public static function ownjobfile_delete($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['ownjobfile_delete'] == '1') ? 'block' : 'none';
	}

	public static function campaign($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['campaignmeasure_view'] == '1') ? 'block' : 'none';
	}

	public static function campaignmeasure_add($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['campaignmeasure_add'] == '1') ? 'block' : 'none';
	}

	public static function campaignmeasure_delete($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['campaignmeasure_delete'] == '1') ? 'block' : 'none';
	}

	public static function staff($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['staff_view'] == '1') ? 'block' : 'none';
	}

	public static function staff_add($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['staff_add'] == '1') ? 'block' : 'none';
	}

	public static function staff_edit($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['staff_edit'] == '1') ? 'block' : 'none';
	}

	public static function staff_delete($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['staff_delete'] == '1') ? 'block' : 'none';
	}

	public static function sales($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return (isset($pos_opt['sales_view']) && $pos_opt['sales_view'] == '1') ? 'block' : 'none';
	}

	public static function sales_add($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['sales_add'] == '1') ? 'block' : 'none';
	}

	public static function sales_edit($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['sales_edit'] == '1') ? 'block' : 'none';
	}

	public static function sales_delete($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['sales_delete'] == '1') ? 'block' : 'none';
	}

	public static function report($position)
	{
		$pos = Position::where('name', $position)->first();
		$pos_opt = json_decode($pos->options, true);

		return ($pos_opt['report_view'] == '1') ? 'block' : 'none';
	}

}