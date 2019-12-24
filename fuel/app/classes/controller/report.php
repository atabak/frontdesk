<?php
class Controller_Report extends Controller_Authenticate{

	public function action_index()
	{
		$data['report'] = Model_Report::find('all');
		$this->template->title = "Report";
		$this->template->content = View::forge('report/index', $data);
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('report');

		if ( ! $data['report'] = Model_Report::find($id))
		{
			Session::set_flash('error', 'Could not find report #'.$id);
			Response::redirect('report');
		}

		$this->template->title = "Report";
		$this->template->content = View::forge('report/view', $data);
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Report::validate('create');

			if ($val->run())
			{
				$report = Model_Report::forge(array(
					'name' => Input::post('name'),
					'slug' => Input::post('slug'),
					'type' => Input::post('type'),
					'activated' => Input::post('activated'),
				));

				try {
					if ($report and $report->save())
					{
						Session::set_flash('success', 'Added report #'.$report->name.'.');
						Response::redirect('report');
					}
					else
					{
						Session::set_flash('error', 'Could not save report.');
					}
				}
				catch (\Fuel\Core\Database_Exception $e) {
					Session::set_flash('error', $e->getMessage());
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Report";
		$this->template->content = View::forge('report/create');
	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('report');

		if ( ! $report = Model_Report::find($id))
		{
			Session::set_flash('error', 'Could not find report #'.$id);
			Response::redirect('report');
		}

		$val = Model_Report::validate('edit');

		if ($val->run())
		{
			$report->name = Input::post('name');
			$report->slug = Input::post('slug');
			$report->type = Input::post('type');
			$report->activated = Input::post('activated');

			if ($report->save())
			{
				Session::set_flash('success', 'Updated report #' . $id);

				Response::redirect('report');
			}

			else
			{
				Session::set_flash('error', 'Could not update report #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$report->name = $val->validated('name');
				$report->slug = $val->validated('slug');
				$report->type = $val->validated('type');
				$report->activated = $val->validated('activated');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('report', $report, false);
		}

		$this->template->title = "Report";
		$this->template->content = View::forge('report/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('report');

		if ($report = Model_Report::find($id))
		{
			$report->delete();

			Session::set_flash('success', 'Deleted report #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete report #'.$id);
		}

		Response::redirect('report');

	}


}
