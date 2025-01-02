<?php

interface DataFormat 
{
    public function encode($data);
    public function decode($data);
}

class JsonFormat implements DataFormat
{
    public function encode($data)
    {
        return json_encode($data);
    }

    public function decode($data)
    {
        return json_decode($data);
    }
}

class XmlFormat implements DataFormat
{
    public function encode($data)
    {
        return simplexml_load_string($data);
    }

    public function decode($data)
    {
        // Проверяет, является ли $data объектом SimpleXMLElement
        if ($data instanceof SimpleXMLElement) {
            // Возвращает XML в виде строки
            return $data->asXML();
        }
        throw new InvalidArgumentException("Provided data is not a SimpleXMLElement object.");
    }
}

$jsonFormat = new JsonFormat();

print_r($jsonFormat->encode("Hello, word"));
print_r($jsonFormat->decode('{"Hello" : "World"}'));

$xml = new XmlFormat();

print_r($xml->encode("<document>

    <cmd>login</cmd>

    <login>Richard</login>

</document>"));


print_r($xml->decode($xml->encode("<document>

<cmd>login</cmd>

<login>Richard</login>

</document>")));
