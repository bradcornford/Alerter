<?php

namespace spec\Cornford\Alerter;

use Cornford\Alerter\Alert;
use Cornford\Alerter\AlertDisplay;
use PhpSpec\ObjectBehavior;

class AlertSpec extends ObjectBehavior
{
	function it_is_not_initializable()
	{
		$this->shouldHaveType('Cornford\Alerter\Alert');
		$this->shouldThrow('\PhpSpec\Exception\Example\ErrorException');
	}

	function it_can_be_created()
	{
		$this->beConstructedThrough('create', [null, null]);
		$this->shouldHaveType('Cornford\Alerter\Alert');
	}

	function it_throws_exception_when_created_without_type()
	{
		$this->beConstructedThrough('create', [Alert::TYPE_NONE, 'None']);
		$this->shouldThrow('Cornford\Alerter\Exceptions\AlertTypeException')->during('create', [null, 'Message']);
	}

	function it_throws_exception_when_created_without_content()
	{
		$this->beConstructedThrough('create', [Alert::TYPE_NONE, 'None']);
		$this->shouldThrow('Cornford\Alerter\Exceptions\AlertContentException')->during('create', [Alert::TYPE_ERROR, null]);
	}

	function it_can_return_type()
	{
		$this->beConstructedThrough('create', [Alert::TYPE_INFO, 'Info message']);
		$this->getType()->shouldEqual(Alert::TYPE_INFO);
	}

	function it_can_return_type_variable()
	{
		$this->beConstructedThrough('create', [Alert::TYPE_INFO, 'Info message']);
		$this->type->shouldEqual(Alert::TYPE_INFO);
	}

	function it_can_return_content()
	{
		$this->beConstructedThrough('create', [Alert::TYPE_ERROR, 'Error message']);
		$this->getContent()->shouldEqual('Error message');
	}

	function it_can_return_content_variable()
	{
		$this->beConstructedThrough('create', [Alert::TYPE_ERROR, 'Error message']);
		$this->content->shouldEqual('Error message');
	}

	function it_throws_exception_when_requesting_undefined_variable()
	{
		$this->beConstructedThrough('create', [Alert::TYPE_WARNING, 'Waring message']);
		$this->shouldThrow('\Cornford\Alerter\Exceptions\AlertVariableException')->during('__get', ['undefined']);
	}

	function it_can_be_created_as_a_type_error()
	{
		$this->beConstructedThrough('error', ['Error message']);
		$this->content->shouldEqual('Error message');
	}

	function it_can_be_created_as_a_type_info()
	{
		$this->beConstructedThrough('info', ['Info message']);
		$this->content->shouldEqual('Info message');
	}

	function it_can_be_created_as_a_type_warning()
	{
		$this->beConstructedThrough('warning', ['Warning message']);
		$this->content->shouldEqual('Warning message');
	}

	function it_can_be_created_as_a_type_success()
	{
		$this->beConstructedThrough('success', ['Success message']);
		$this->content->shouldEqual('Success message');
	}

	function it_can_be_created_as_a_type_none()
	{
		$this->beConstructedThrough('none', ['Message']);
		$this->content->shouldEqual('Message');
	}

	function it_throws_exception_when_displaying_with_invalid_view_path()
	{
		$this->beConstructedThrough('success', ['Success message']);
		$this->useViewPath('none directory');
		$this->shouldThrow('\Cornford\Alerter\Exceptions\AlertDisplayViewPathException')->during('display', []);
	}

	function it_throws_exception_when_displaying_with_invalid_view()
	{
		$this->beConstructedThrough('success', ['Success message']);
		$this->useView('none view');
		$this->shouldThrow('\Cornford\Alerter\Exceptions\AlertDisplayViewException')->during('display', []);
	}

	function it_can_be_displayed()
	{
		$this->beConstructedThrough('success', ['Success message']);
		$this->display()->shouldEqual('<p class="alert alert-success">Success message</p>');
	}

	function it_can_be_displayed_with_bootstrap_view()
	{
		$this->beConstructedThrough('info', ['Info message']);
		$this->useView(AlertDisplay::VIEW_BOOTSTRAP);
		$this->display()->shouldEqual('<div class="alert alert-info">Info message</div>');
	}
}
