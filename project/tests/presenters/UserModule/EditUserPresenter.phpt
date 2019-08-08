<?php

namespace Test;

use JP\Tester\PresenterHelper;
use JP\Tester\RequestBuilder;
use Nette;
use Tester;
use Tester\Assert;

$container = require __DIR__ . '/../../bootstrap.php';


class EditUserPresenter extends Tester\TestCase
{
	private $container;
	private $presenterHelper;
	private $requestBuilder;


	function __construct(Nette\DI\Container $container)
	{
		$this->container = $container;
		$this->presenterHelper = new PresenterHelper($container);
		$this->requestBuilder = new RequestBuilder();
	}


	function setUp()
	{
	}


	function testEditValid() {
		$request = $this->requestBuilder->setAction('edit')->setParams(['id' => 2])->createRequest('User:EditUser');
		$presenter = $this->presenterHelper->createPresenter($request->getPresenterName());
		$response = $presenter->run($request);

		$html = $this->presenterHelper->textResponse($response);

		$dom = \Tester\DomQuery::fromHtml($html);
		Assert::true( $dom->has('#frm-userForm-surname') );
	}

	public function testEditInvalid(){
		$request = $this->requestBuilder->setAction('edit')->setParams(['id' => 0])->createRequest('User:EditUser');
		$presenter = $this->presenterHelper->createPresenter($request->getPresenterName());
		Assert::exception(function () use ($presenter, $request){
			$response = $presenter->run($request);
		}, Nette\Application\BadRequestException::class);
	}

}


$test = new EditUserPresenter($container);
$test->run();