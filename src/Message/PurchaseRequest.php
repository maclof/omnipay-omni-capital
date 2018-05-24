<?php namespace Omnipay\OmniCapital\Message;

use Omnipay\Common\Message\AbstractRequest;

class PurchaseRequest extends AbstractRequest
{
	protected $liveEndpoint = 'https://omniport.omnicapital.co.uk/credit_app/Default.aspx';
	protected $testEndpoint = 'https://omniporttest.ocrf.co.uk/credit_app/Default.aspx';

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

	public function getData()
	{
		return [
			'installationId' => $this->getInstallationId(),
			'apiKey'         => $this->getApiKey(),
			'financeCode'    => $this->getFinanceCode(),
			'transactionId'  => $this->getTransactionId(),
			'amount'         => abs($this->getAmount()),
			'description'    => $this->getDescription(),
		];
	}

	public function sendData($data)
	{
		return $this->response = new PurchaseResponse($this, $data);
	}

	public function getEndpoint()
	{
		return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
	}
}
