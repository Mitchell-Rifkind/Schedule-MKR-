<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      require '/Applications/XAMPP/xamppfiles/htdocs/Schedule-MKR-/vendor/autoload.php';
      use Aws\DynamoDb\DynamoDbClient;
      use Aws\DynamoDb\Marshaler;

      $email = $_POST["email"];
      $password = $_POST["password"];

      $client = DynamoDbClient::factory(array(
        'version' => 'latest',
        'profile' => 'default',
        'region'  => 'us-east-1'
      ));

      $result = $client->putItem(array(
        'TableName' => 'User_Sign_In',
        'Item' => array(
          'email'    => array('S' => $email),
          'password' => array('S' => $password)
        )
      ));

      $result = $client->getItem(array(
        'ConsistentRead' => true,
        'TableName' => 'User_Sign_In',
        'Key'       => array(
          'email'   => array('S' => $email)
        )
      ));

      echo "Welcome " . $result['Item']['email']['S'];

      echo "\nInfo added successfully";
     ?>
  </body>
</html>
