<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      use Aws\DynamoDb\DynamoDbClient;

      $email = $_POST["email"];
      $password = $_POST["password"];

      $client = DynamoDbClient::factory(array(
        'profile' => 'default',
        'region' => 'us-east-1'
      ));

      $result = $client->putItem(array(
        'TableName' => 'User_Sign_In',
        'Item' => array(
          'email'    => array('S' => $email),
          'password' => array('S' => $password)
        )
      ));

      $user = $client->getItem(array(
        'ConsistentRead' => true,
        'TableName' => 'errors',
        'Key' => array(
          'email' => array('S' => $email)
        )
      ));

      echo "Welcome" . $user['Item']['email']['S'];
     ?>
  </body>
</html>
