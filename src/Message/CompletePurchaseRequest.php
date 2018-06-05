<?php namespace Omnipay\OmniCapital\Message;

use Omnipay\Common\Message\AbstractRequest;

class CompletePurchaseRequest extends PurchaseRequest
{
	public function getData()
	{
		$data = parent::getData();

		return array_merge($data, [
			'query' => $this->httpRequest->query->all(),
		]);
	}

	public function sendData($data)
	{
		return $this->response = new CompletePurchaseResponse($this, $data);
	}
}
