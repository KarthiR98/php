<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
echo "Hello Worldd!";
?> 
<?php
$brokers = "my-cluster-kafka-bootstrap.karthir.svc:9092"; // Kafka bootstrap server and port
$topic = "my-topic"; // Kafka topic

$config = new RdKafka\Conf();
$config->set('bootstrap.servers', $brokers);

$producer = new RdKafka\Producer($config);
$producer->addBrokers($brokers);

$topic = $producer->newTopic($topic);

$message = "Hello, Kafka!";
$topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);

echo "Message sent to Kafka: $message\n";
?>
</body>
</html>
