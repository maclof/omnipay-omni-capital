<?php namespace Omnipay\OmniCapital;

use Omnipay\Common\AbstractGateway;
use Omnipay\OmniCapital\Message\AuthorizeRequest;

class Gateway extends AbstractGateway
{
	public function getName()
	{
		return 'OmniCapital';
	}

	public function getDefaultParameters()
	{
		return [
			'installation_id' => '',
			'api_key'         => '',
			'finance_code'    => '',
		];
	}

	public function getInstallationId()
	{
		return $this->getParameter('installation_id');
	}

	public function setInstallationId($value)
	{
		return $this->setParameter('installation_id', $value);
	}

	public function getApiKey()
	{
		return $this->getParameter('api_key');
	}

	public function setApiKey($value)
	{
		return $this->setParameter('api_key', $value);
	}

	public function getFinanceCode()
	{
		return $this->getParameter('finance_code');
	}

	public function setFinanceCode($value)
	{
		return $this->setParameter('finance_code', $value);
	}

	public function purchase(array $parameters = [])
	{
		return $this->createRequest('Omnipay\OmniCapital\Message\PurchaseRequest', $parameters);
	}

	public function completePurchase(array $parameters = [])
	{
		return $this->createRequest('Omnipay\OmniCapital\Message\CompletePurchaseRequest', $parameters);
	}
}
