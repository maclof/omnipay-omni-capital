<?php namespace Omnipay\OmniCapital\Message;

class CompletePurchaseResponse extends PurchaseResponse
{
	public function isSuccessful()
	{
		if ($this->data['installationId'] !== $this->data['query']['InstallationID']) {
			return false;
		}
	
		return $this->data['query']['Status'] === 'ORDER FULFILLED';
	}
}
