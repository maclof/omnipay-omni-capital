<?php namespace Omnipay\OmniCapital\Message;

class CompletePurchaseResponse extends PurchaseResponse
{
	public function isSuccessful()
	{
		if ($this->data['installationId'] !== $this->data['request']['InstallationID']) {
			return false;
		}
	
		return $this->data['request']['Status'] === 'ORDER FULFILLED';
	}

	public function isRedirect()
	{
		return false;
	}
}
