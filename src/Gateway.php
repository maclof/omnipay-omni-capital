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
			'finance_product' => '',
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

	public function getFinanceProduct()
	{
		return $this->getParameter('finance_product');
	}

	public function setFinanceProduct($value)
	{
		return $this->setParameter('finance_product', $value);
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
