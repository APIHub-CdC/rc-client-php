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
        $x_full_report = false;

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
            $result = $this->apiInstance->getReporte($this->x_api_key, $this->username, $this->password, $request, $x_full_report);
            $this->assertTrue($result->getFolioConsulta()!==null);
            echo "testGetReporte finished\n";
            return $result->getFolioConsulta();
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * @depends testGetReporte
     */
    public function testGetConsultas($folioConsulta)
    {
        try {
            $result = $this->apiInstance->getConsultas($folioConsulta, $this->x_api_key, $this->username, $this->password);
            $this->assertTrue($result->getConsultas()!==null);
            echo "testGetConsultas finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
        
    }
    
    /**
     * @depends testGetReporte
     */
    public function testGetCreditos($folioConsulta)
    {
        try {
            $result = $this->apiInstance->getCreditos($folioConsulta, $this->x_api_key, $this->username, $this->password);
            $this->assertTrue($result->getCreditos()!==null);
            echo "testGetCreditos finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }
    
    /**
     * @depends testGetReporte
     */
    public function testGetDomicilios($folioConsulta)
    {
        try {
            $result = $this->apiInstance->getDomicilios($folioConsulta, $this->x_api_key, $this->username, $this->password);
            $this->assertTrue($result->getDomicilios()!==null);
            echo "testGetDomicilios finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }
    
    /**
     * @depends testGetReporte
     */
    public function testGetEmpleos($folioConsulta)
    {
        try {
            $result = $this->apiInstance->getEmpleos($folioConsulta, $this->x_api_key, $this->username, $this->password);
            $this->assertTrue($result->getEmpleos()!==null);
            echo "testGetEmpleos finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * @depends testGetReporte
     */
    public function testGetMensajes($folioConsulta)
    {
        try {
            $result = $this->apiInstance->getMensajes($folioConsulta, $this->x_api_key, $this->username, $this->password);
            $this->assertTrue($result->getMensajes()!==null);
            echo "testGetMensajes finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }
}
