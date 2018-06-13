<?php namespace Omnipay\OmniCapital\Message;

class CompletePurchaseRequest extends PurchaseRequest
{
	public function getData()
	{
		$data = parent::getData();

		return array_merge($data, [
			'request' => $this->httpRequest->request->all(),
		]);
	}

	public function sendData($data)
	{
		return $this->response = new CompletePurchaseResponse($this, $data);
	}
}
