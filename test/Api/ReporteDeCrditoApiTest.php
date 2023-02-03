<?php

namespace RcClientPhp\Client;

use \RcClientPhp\Client\Configuration;
use \RcClientPhp\Client\ApiException;
use \RcClientPhp\Client\ObjectSerializer;

class ReporteDeCrditoApiTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $config = new \RcClientPhp\Client\Configuration();
        $config->setHost('the_url');
        $password = getenv('KEY_PASSWORD');
        $this->signer = new \RcClientPhp\Client\Interceptor\KeyHandler(null, null, $password);
        $events = new \RcClientPhp\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = \GuzzleHttp\HandlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));
        $handler->push($events->verify_signature_header('x-signature'));
        $client = new \GuzzleHttp\Client(['handler' => $handler]);
        $this->apiInstance = new \RcClientPhp\Client\Api\ReporteDeCrditoApi($client, $config);
        $this->x_api_key = "your_api_key";
        $this->username = "your_username";
        $this->password = "your_password";
    }

    public function testGetReporte()
    {
    
        $request = new \RcClientPhp\Client\Model\PersonaPeticion();
        $request->setPrimerNombre("XXXX");
        $request->setApellidoPaterno("XXXX");
        $request->setApellidoMaterno("XXXXX");
        $request->setFechaNacimiento("yyyy-mm-dd");
        $request->setRfc("XXXXXX");
        $request->setNacionalidad("XX");
        $dom = new \RcClientPhp\Client\Model\DomicilioPeticion();
        $dom->setDireccion("XXXXXX");
        $dom->setColoniaPoblacion("XXXXXX");
        $dom->setDelegacionMunicipio("XXXXX");
        $dom->setCiudad("XXXXXXXX");
        $dom->setEstado("XXX");
        $dom->setCP("XXXXX");
        $dom->setFechaResidencia("yyyy-mm-dd");
        $dom->setNumeroTelefono("XXXXXXX");
        $dom->setTipoDomicilio("X");
        $dom->setTipoAsentamiento("XX");

        $request->setDomicilio($dom);

        try {
            $result = $this->apiInstance->getReporte($this->x_api_key, $this->username, $this->password, $request);
            $this->assertTrue($result->getFolioConsulta()!==null);
            echo "testGetReporte finished\n";
            return $result->getFolioConsulta();
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }

}
