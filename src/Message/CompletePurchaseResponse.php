<?php namespace Omnipay\OmniCapital\Message;

class CompletePurchaseResponse extends PurchaseResponse
{
	public function isSuccessful()
	{
		if ($this->data['installationId'] !== $this->data['request']['InstallationID']) {
			return false;
		}

		switch ($this->data['request']['Status']) {
			case 'ORDER FULFILLED':
			case 'AWAITING FULFILMENT':
				return 'finance-paid';
				break;

			case 'APPROVED':
				return 'finance-accepted';
				break;

			case 'SIGN DOCUMENTS':
				return 'finance-pending';
				break;

			case 'CREDIT CHECK REFERRED':
				return 'finance-referred';
				break;

			case 'CREDIT CHECK DECLINED':
				return 'finance-declined';
				break;
		}
	}

	public function isRedirect()
	{
		return false;
	}
}
