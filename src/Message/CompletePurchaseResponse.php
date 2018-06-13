<?php namespace Omnipay\OmniCapital\Message;

class CompletePurchaseResponse extends PurchaseResponse
{
	public function isSuccessful()
	{
		if ($this->data['installationId'] !== $this->data['request']['InstallationID']) {
			return false;
		}
	
		if ($this->data['request']['Status'] === 'ORDER FULFILLED') {
			return true;
		} elseif ($this->data['request']['Status'] === 'CREDIT CHECK DECLINED') {
			return false;
		}
	}

	public function isRedirect()
	{
		return false;
	}
}
