<?php namespace Omnipay\OmniCapital\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
	public function isSuccessful()
	{
		return false;
	}

	public function isRedirect()
	{
		return true;
	}

	public function getRedirectUrl()
	{
		return $this->getRequest()->getEndpoint();
	}

	public function getRedirectMethod()
	{
		return 'POST';
	}

	public function getRedirectData()
	{
		$data = [
			'Identification[InstallationID]'    => $this->data['installationId'],
			'Identification[api_key]'           => $this->data['apiKey'],
			'Identification[RetailerUniqueRef]' => $this->data['transactionId'],
			'Goods[0][Description]'             => $this->data['description'],
			'Goods[0][Price]'                   => $this->data['amount'],
			'Finance[Code]'                     => $this->data['financeCode'],
			'Finance[Deposit]'                  => $this->data['amount'] / 10,
		];

		return $data;
	}
}
